<?php

namespace App\Http\Requests\Auth;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class StudentLoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array{
      return [
        'mobile' => [
            'required',
            function ($attribute, $value, $fail) {
                if (filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    // Valid email, no issue
                    return;
                }

                if (preg_match('/^[6-9][0-9]{9}$/', $value)) {
                    // Valid mobile number, no issue
                    return;
                }

                // Check if it's numeric but not a valid mobile pattern
                if (is_numeric($value)) {
                    if (!preg_match('/^[0-9]{10}$/', $value)) {
                        $fail('The mobile number must be exactly 10 digits.');
                    } elseif (!preg_match('/^[6-9]/', $value)) {
                        $fail('Invalid mobile number. It must start with 6-9.');
                    } else {
                        $fail('Invalid mobile number format.');
                    }
                } else {
                    $fail('The input must be a valid email address or mobile number.');
                }
            },
        ],
        'admission_no' => ['required', 'string'],
        'school_id' => ['required', 'string'],
    ];
}


    /**
     * Attempt to authenticate the request's credentials.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
       public function authenticate(): void
{
    $this->ensureIsNotRateLimited();

    $loginInput = $this->mobile;
    $isEmail = filter_var($loginInput, FILTER_VALIDATE_EMAIL);

    $query = \App\Models\Student::where('admission_no', $this->admission_no)
        ->where('school_id', $this->school_id);

    if ($isEmail) {
        $query->where('email', $loginInput);
    } else {
        $query->where('mobile', $loginInput);
    }

    $student = $query->first();

    if (! $student) {
        RateLimiter::hit($this->throttleKey());

        throw ValidationException::withMessages([
            'admission_no' => "The entered credentials don’t match. Please try again.",
        ]);
    }
    $student->last_login_at = now()->setTimezone('Asia/Kolkata');
    $student->save();
    Auth::guard('student')->login($student, $this->boolean('remember'));

    RateLimiter::clear($this->throttleKey());
}



    /**
     * Ensure the login request is not rate limited.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
                'admission_no' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the rate limiting throttle key for the request.
     */
    public function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->string('admission_no')).'|'.$this->ip());
    }
}
