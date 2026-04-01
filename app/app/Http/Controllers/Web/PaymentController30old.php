<?php
namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use Carbon\Carbon;
use Razorpay\Api\Api;

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
        return view('web.booking_confirmation',compact('student'));
    }

}
