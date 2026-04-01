<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use App\Mail\SchoolRegistrationMail;
use App\Models\SchoolDetails;
use App\Models\Headofschool;
use App\Models\Otp;
use App\Models\SparkCordinator;
use DB;

class SendMailSmsController extends Controller
{
    // public function sendMail($id){
    //     try {
    //         $data = DB::table('school_registration as a')
    //         ->leftJoin('school_details as b', 'a.id', '=', 'b.registration_id')
    //         ->leftJoin('head_of_school as c', 'a.id', '=', 'c.registration_id')
    //         ->leftJoin('spark_coordinator as d', 'a.id', '=', 'd.registration_id')
    //         ->leftJoin('enrollment_details as e', 'a.id', '=', 'e.registration_id')
    //         ->leftJoin('generate_url as f', 'a.id', '=', 'f.registration_id')
    //         ->select(
    //             'a.id',
    //             'a.mobileno',
    //             'a.school_id',
    //             'c.email as head_email',
    //             'c.mobile as head_mobile',
    //             'd.email as coordinator_email',
    //             'd.mobile as coordinator_mobile'
    //         )->where('a.id',$id)
    //         ->orderBy('a.id', 'DESC')
    //         ->groupBy('a.id')
    //         ->first();
    //         $password   = '12345678';
    //         $school_url = 'https://sparkolympiads.com/app/school-login/';

    //         if ($data && filter_var($data->mobileno, FILTER_VALIDATE_EMAIL)){
    //             if(!empty($data->head_email) && !empty($data->coordinator_email)){
    //                 Mail::to($email)->cc([$data->head_email,$data->coordinator_email])->send(new SchoolRegistrationMail(
    //                     $school_url,$data->school_id,$password
    //                 ));
    //             }else if(!empty($data->head_email)){
    //                 Mail::to($email)->cc([$data->head_email])->send(new SchoolRegistrationMail(
    //                     $school_url,$data->school_id,$password
    //                 ));
    //             }else if(!empty($data->coordinator_email)){
    //                 Mail::to($email)->cc([$data->coordinator_email])->send(new SchoolRegistrationMail(
    //                     $school_url,$data->school_id,$password
    //                 ));
    //             }
    //             if(!empty($data->head_mobile) && !empty($data->coordinator_mobile)){
    //                 $head_mobile        = '91'.$data->head_mobile;
    //                 $coordinator_mobile = '91'.$data->coordinator_mobile;
    //                 sendConratulationSms($head_mobile,$data->school_id,$password);
    //                 sendConratulationSms($coordinator_mobile,$data->school_id,$password);

    //             }else if(!empty($data->head_mobile)){
    //                 $head_mobile        = '91'.$data->head_mobile;
    //                 sendConratulationSms($head_mobile,$data->school_id,$password);

    //             }else if(!empty($data->coordinator_mobile)){
    //                 $coordinator_mobile = '91'.$data->coordinator_mobile;
    //                 sendConratulationSms($coordinator_mobile,$data->school_id,$password);
    //             }
    //             return response()->json(['status' => 200, 'message' => 'Email and sms sent successfully']);
    //         }else{
    //             $mobile = '91'.$data->mobileno;
    //             if(!empty($mobile) && !empty($data->head_mobile) && !empty($data->coordinator_mobile)){
    //                 sendConratulationSms($mobile,$data->school_id,$password);

    //                 $head_mobile        = '91'.$data->head_mobile;
    //                 $coordinator_mobile = '91'.$data->coordinator_mobile;
    //                 sendConratulationSms($head_mobile,$data->school_id,$password);
    //                 sendConratulationSms($coordinator_mobile,$data->school_id,$password);
    //             }else if(!empty($mobile) && !empty($data->head_mobile)){
    //                 $head_mobile        = '91'.$data->head_mobile;
    //                 sendConratulationSms($head_mobile,$data->school_id,$password);
    //                 sendConratulationSms($mobile,$data->school_id,$password);
    //             }else if(!empty($mobile) && !empty($data->coordinator_mobile)){
    //                 $coordinator_mobile = '91'.$data->coordinator_mobile;
    //                 sendConratulationSms($coordinator_mobile,$data->school_id,$password);
    //                 sendConratulationSms($mobile,$data->school_id,$password);
    //             }
    //             if(!empty($data->head_email) && !empty($data->coordinator_email)){
    //                 $email = $data->head_email;
    //                 Mail::to($email)->cc([$data->coordinator_email])->send(new SchoolRegistrationMail(
    //                     $school_url,$data->school_id,$password
    //                 ));
    //             }else if(!empty($data->coordinator_email)){
    //                 $email = $data->coordinator_email;
    //                 Mail::to($email)->send(new SchoolRegistrationMail(
    //                     $school_url,$data->school_id,$password
    //                 ));
    //             }
    //             return response()->json(['status' => 200, 'message' => 'SMS and mail sent successfully']);
    //         }
    //     } catch (\Exception $exception) {
    //         return response()->json(['status' => 500, 'message' => 'Something went wrong.']);
    //     }
    // }
    public function sendMail($id)
    {
        try {
            $data = DB::table('school_registration as a')
                ->leftJoin('school_details as b', 'a.id', '=', 'b.registration_id')
                ->leftJoin('head_of_school as c', 'a.id', '=', 'c.registration_id')
                ->leftJoin('spark_coordinator as d', 'a.id', '=', 'd.registration_id')
                ->leftJoin('enrollment_details as e', 'a.id', '=', 'e.registration_id')
                ->leftJoin('generate_url as f', 'a.id', '=', 'f.registration_id')
                ->select(
                    'a.id',
                    'a.mobileno',
                    'a.school_id',
                    'c.email as head_email',
                    'c.mobile as head_mobile',
                    'd.email as coordinator_email',
                    'd.mobile as coordinator_mobile'
                )
                ->where('a.id', $id)
                ->orderBy('a.id', 'DESC')
                ->groupBy('a.id')
                ->first();
            if (!$data) {
                return response()->json(['status' => 404, 'message' => 'Record not found']);
            }
            $password = '12345678';
            $school_url = 'https://sparkolympiads.com/app/school-login/';
            $sentEmail = false;
            $smsMobiles = [];

            if (!empty($data->head_mobile)) {
                $smsMobiles[] = '91' . $data->head_mobile;
            }
            if (!empty($data->coordinator_mobile)) {
                $smsMobiles[] = '91' . $data->coordinator_mobile;
            }
            if ($data->mobileno && filter_var($data->mobileno, FILTER_VALIDATE_EMAIL)){
                $primaryEmail = $data->mobileno ?? $data->head_email ?? null;
            }else{
                if (!empty($data->mobileno) && strlen($data->mobileno) >= 10) {
                    $smsMobiles[] = '91' . $data->mobileno;
                }
                $primaryEmail = $data->head_email ?? $data->coordinator_email ?? null;
            }
            foreach (array_unique($smsMobiles) as $mobile) {
                sendConratulationSms($mobile, $data->school_id, $password);
            }
            $ccEmails = [];

            if (!empty($data->head_email) && $data->head_email !== $primaryEmail) {
                $ccEmails[] = $data->head_email;
            }
            if (!empty($data->coordinator_email) && $data->coordinator_email !== $primaryEmail) {
                $ccEmails[] = $data->coordinator_email;
            }
            if (!empty($primaryEmail)) {
                Mail::to($primaryEmail)->cc($ccEmails)->send(new SchoolRegistrationMail(
                    $school_url,
                    $data->school_id,
                    $password
                ));
                $sentEmail = true;
            }
            return response()->json([
                'status' => 200,
                'message' => ($sentEmail ? 'Email and SMS' : 'SMS') . ' sent successfully'
            ]);

        } catch (\Exception $exception) {
            \Log::error('sendMail error: ' . $exception->getMessage());
            return response()->json(['status' => 500, 'message' => 'Something went wrong.']);
        }
    }

}
