<?php
namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use Carbon\Carbon;
use Razorpay\Api\Api;
use Illuminate\Support\Facades\Mail;
class PaymentController extends Controller
{
    public function createOrder(Request $request)
    {
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
        $order = $api->order->create([
            'receipt'   => uniqid(),
            'amount'    => $request->total_price * 100,
            'currency'  => 'INR',
        ]);
        return response()->json([
            'order_id'  => $order->id,
            'amount'    => $order->amount,
        ]);
    }

    public function paymentSuccess(Request $request)
    {
        $studentId = $request->form['student_id'] ?? null;
        if (!$studentId) {
            return response()->json([
                'success' => false,
                'message' => 'Student ID missing'
            ], 400);
        }
        $student = Student::find($studentId);
        if (!$student) {
            return response()->json([
                'success' => false,
                'message' => 'Student not found'
            ], 404);
        }
        $student->update([
            'razorpay_payment_id' => $request->razorpay_payment_id,
            'razorpay_order_id'   => $request->order_id,
            'amount'              => $request->form['total_price'] ?? 0,
            'status'              => 'success',
            'fee_status'        => 1,
        ]);
        return response()->json([
            'success' => true,
            'student_id' => $studentId
        ]);
    }

    public function paymentFailure(Request $request)
    {
        $studentId = $request->form['student_id'] ?? null;
        if (!$studentId) {
            return response()->json(['success' => false, 'message' => 'Student ID missing']);
        }
        $student = Student::find($studentId);
        // $name=$student->full_name.' '.$student->middle_name.' '.$student->last_name;   
        // $email = $student->email; 
        // $data['name'] = $name; 
        // $data['status'] ="REJECTED"; 
        // admin_fee_rejected($name,$student->mobile);

        if (!$student) {
            return response()->json([
                'success' => false,
                'message' => 'Student not found'
            ], 404);
        }
        $student->update([
            'razorpay_payment_id' => $request->razorpay_payment_id,
            'razorpay_order_id'   => $request->order_id,
            'amount'              => $request->form['total_price'] ?? 0,
            'status'              => 'failed',
        ]);
        return response()->json(['status' => 'stored']);
    }
    public function bookingConfirmation($id)
    {
        $student = Student::where('id',$id)->first();
        $name=$student->full_name.' '.$student->middle_name.' '.$student->last_name;      
        $email = $student->email; 
        $data['name'] =$name; 
        $data['status'] ="VERIFIED";
        $subject="Spark Olympiad Payment Update (".$student->admission_no.")";
        admin_fee_verify($name,"91".$student->mobile);
        Mail::send('email_template.admin_payment_verification', $data, function($message) use ($email, $subject) {
            $message->from(env('MAIL_FROM_ADDRESS'),env('MAIL_FROM_NAME'));
            $message->to($email);
            $message->subject($subject); 
        });
        return view('web.booking_confirmation',compact('student'));
    }

}
