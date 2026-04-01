<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\BoardController;
use App\Http\Controllers\Admin\DesignationCOntroller;
use App\Http\Controllers\Admin\TitleController;
use App\Http\Controllers\Admin\ClassController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Admin\ManageSchoolController;
use App\Http\Controllers\Admin\ExamSheduleController;
use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Admin\MapController;
use App\Http\Controllers\Admin\EmailSettingController;
use App\Http\Controllers\Web\CommonController;
use App\Http\Controllers\Web\OtpVerifyController;
use App\Http\Controllers\Web\RegistrationController;
use App\Http\Controllers\Web\SchoolDetailsController;
use App\Http\Controllers\Web\HeadofSchoolController;
use App\Http\Controllers\Web\SparkCordinatorController;
use App\Http\Controllers\Web\SchollenrolmentController;
use App\Http\Controllers\Web\GenrateController;
use App\Http\Controllers\School\SchoolLoignController;
use App\Http\Controllers\School\DashboardController;
use App\Http\Controllers\School\SchoolProfileController;
use App\Http\Controllers\School\ShareLinkController;
use App\Http\Controllers\School\StundetVerificationController;
use App\Http\Controllers\School\TechnicalAssesmentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\StudentController;
use App\Http\Controllers\Web\StudentDashboardController;
use App\Http\Controllers\Web\StudentloginController;
use App\Http\Controllers\School\SchoolChangePassewordController;
use App\Http\Controllers\School\SchoolBankController;
use App\Http\Controllers\DeleteController;
use App\Http\Controllers\WebsiteController;

Route::get('/', function () {
    return view('admin/auth-signin');
});

Route::get('register-your-school', function () {
    return view('web.home');
});

// Route::get('/dashboard', function () {
//     return view('admin.dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('print-pdf/{schoolid}', [App\Http\Controllers\PdfController::class, 'school_reprot'])->name('print-pdf');

Route::get('exam-report/{admno}', [StundetVerificationController::class, 'student_result'])->name('exam-report');
Route::get('/image/download/{filename}', [StundetVerificationController::class, 'certifcate_download'])->name('image.download');
Route::get('/bulk-image/download/{filename}', [StundetVerificationController::class, 'bulkcertifcate_download'])->name('bulk.image.download');

Route::post('student-store-login', [StudentloginController::class, 'store']);

Route::post('student-logout', [StudentloginController::class, 'destroy'])->name('student.logout'); 
Route::middleware('check-student-login')->group(function () {
Route::get('/student-dashboard',[StudentDashboardController::class,'index'])->name('student.dashboard');
});
  






Route::middleware('check-login')->group(function () {
    
 Route::get('/school-dashboard',[DashboardController::class,'dashboard'])->name('school.dashboard');
 Route::get('/school-profile',[SchoolProfileController::class,'index'])->name('school.profile');
 Route::get('/school-share-link',[ShareLinkController::class,'index'])->name('school.share.link');
 Route::post('/store-school-share-link',[ShareLinkController::class,'store'])->name('store.school.share.link');
 Route::get('/student-verification',[StundetVerificationController::class,'index'])->name('student.verification');
 Route::get('/student-report',[StundetVerificationController::class,'studentindex'])->name('student.result.report');
 Route::get('/technical-assesment',[TechnicalAssesmentController::class,'index'])->name('technical.assesment');

Route::post('/start-assesment',[TechnicalAssesmentController::class,'go']);
Route::post('/text-assesment',[TechnicalAssesmentController::class,'text']);
Route::post('/store-assesment',[TechnicalAssesmentController::class,'savedata']);
Route::post('/check-system',[TechnicalAssesmentController::class,'checkSystem']);
Route::get('download-system-report',[TechnicalAssesmentController::class,'download_system_report']); 

 Route::post('/lab/checkbox/save', [App\Http\Controllers\LabCheckboxController::class, 'store'])
    ->name('lab.checkbox.save');
Route::post('logo-upload', [SchoolProfileController::class, 'upload_image'])->name('image.upload');  
Route::get('student-delete/{id}', [StundetVerificationController::class, 'destroy'])->name('student.delete');  
Route::put('/first/login/password/update', [SchoolChangePassewordController::class, 'update_password_after_login'])->name('first.password.update');
Route::get('school-change-password-reset', [SchoolChangePassewordController::class, 'create']);
Route::post('/student/check-verification', [StundetVerificationController::class, 'check_student_verification'])->name('student.check-verification');


 

Route::post('/students/updatevefifyStatus', [StundetVerificationController::class, 'updatevefifyStatus'])->name('students.updatevefifyStatus');

Route::post('/students/update-fee-status', [StundetVerificationController::class, 'updateFeeStatus'])->name('students.updateFeeStatus');
Route::post('/students/upload', [StundetVerificationController::class, 'upload'])->name('students.upload');
Route::get('/students/download-report', [StundetVerificationController::class, 'downloadReport'])->name('students.download-report');

Route::get('/dashboard-send-otp', [OtpVerifyController::class, 'send_from_dashboard']);
Route::post('/dashboard-verify-otp', [OtpVerifyController::class, 'verify_otp_from_dashboard']);
//Route::post('/dashboar-verify-otp', [OtpVerifyController::class, 'verify']);
Route::get('download-browser',[DashboardController::class,'downloads_browsers']);
Route::get('global-mentors/{val}',[DashboardController::class,'global_mentors']);
Route::get('test-prep-resources',[DashboardController::class,'test_prep_resorces']);
Route::get('test-duration',[DashboardController::class,'test_duration']);
Route::get('total-questions',[DashboardController::class,'total_questions']);
Route::get('english',[DashboardController::class,'english']);
Route::get('mathematics',[DashboardController::class,'mathematics']);
Route::get('evs',[DashboardController::class,'evs']);
Route::get('india-awareness',[DashboardController::class,'india_awareness']);
Route::get('faq',[DashboardController::class,'faq']);
Route::get('suppoort',[DashboardController::class,'support']);
Route::get('system-info',[DashboardController::class,'system_info']);
Route::get('process',[DashboardController::class,'process']);
Route::get('Letter-to-Parent',[DashboardController::class,'lp']);
Route::get('Poster-for-Bulletin-Board',[DashboardController::class,'pfb']);
Route::get('Competency-Architecture',[DashboardController::class,'ca']);
Route::get('Award-and-Accolades',[DashboardController::class,'award']);
Route::get('Spark-bank-details',[DashboardController::class,'bank_details']);
Route::get('Spark-bank-generete-invoice',[DashboardController::class,'genrateinvoice']);
Route::resource('school-bank-invoice', SchoolBankController::class);
route::get('view_notification/{id}',[DashboardController::class,'view_notification'])->name('view.notification');  



});

Route::get('school-password-recovery', [SchoolChangePassewordController::class, 'password_recovery'])->name('school.password.recovery');
Route::post('/school-forget-password/send-otp', [SchoolChangePassewordController::class, 'sendOtp'])->name('school.forget.send.otp');
Route::post('/school-forget-password/resend-otp', [SchoolChangePassewordController::class, 'resendOtp'])->name('school.forget.resend.otp');
Route::post('/school-forget-password/verify-otp', [SchoolChangePassewordController::class, 'verifyOtp'])->name('school.forget.verify.otp');
Route::post('/school-forget-reset-password', [SchoolChangePassewordController::class, 'update_password_after_login'])->name('school.forget.reset.password');



// Route::get('technical-assemetn',[SchoolProfileController::class,'index'])->name('school.profile');

//Route::prefix('school')->name('school.')->middleware(['auth:school', 'check.school.status'])->group(function () {
    //Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
   // Route::get('/profile', [SchoolProfileController::class, 'index'])->name('profile');
//});

 

Route::middleware('auth')->group(function () {

    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    //Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    //Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
 
    Route::get('dashboard',[AdminDashboard::class,'index'])->name('dashboard');
    Route::resource('designation', DesignationCOntroller::class);
    Route::resource('board', BoardController::class);
    Route::resource('title', TitleController::class);
    Route::resource('class', ClassController::class);
    Route::resource('subject', SubjectController::class);
    Route::resource('email-settings', EmailSettingController::class);
    Route::resource('fee-discount', DiscountController::class);
    Route::get('mange-school',[ManageSchoolController::class,'index'])->name('manage.school');
    Route::get('send-mail/{id}',[App\Http\Controllers\Web\SendMailSmsController::class,'sendMail']);
    
    Route::get('mange-view/{id}',[ManageSchoolController::class,'view'])->name('manage.school.view');
    Route::get('delete-profile/{id}',[ManageSchoolController::class,'deleteProfile']);
    Route::get('exam-date',[ExamSheduleController::class,'index'])->name('exam.date');
    Route::get('create-exam-date',[ExamSheduleController::class,'create'])->name('create.exam.date');
    Route::post('store-exam-date',[ExamSheduleController::class,'store'])->name('store.exam.date');
    Route::get('edit-exam-date/{id}',[ExamSheduleController::class,'edit'])->name('edit.exam.date');
    Route::post('update-exam-date/{id}',[ExamSheduleController::class,'update'])->name('update.exam.date');
    Route::get('manage/school/preview/{id}', [ManageSchoolController::class, 'preview'])->name('manage.school.preview');
    Route::get('registered-data',[ManageSchoolController::class,'index2'])->name('registered.data');
    Route::get('manage-school-paymets',[ManageSchoolController::class,'index3'])->name('manage.school-paymets');
    Route::get('cancel-invoice/{id}',[ManageSchoolController::class,'cancel_invoice'])->name('cancel.invoce');  
    Route::get('manage-student-lists',[ManageSchoolController::class,'student'])->name('manage.student.lists');
    Route::get('student-login-lists',[ManageSchoolController::class,'student_loginlist'])->name('student.login.lists');
    Route::get('student-transaction-lists',[ManageSchoolController::class,'student_transactionlist'])->name('student.transaction.lists');
    Route::get('student-registration-count',[ManageSchoolController::class,'student_registration_count'])->name('student.registration.counts');
    Route::get('manage-users',[ManageSchoolController::class,'manage_users'])->name('manage.users.lists');
    Route::get('manage-technical-assesment-list',[ManageSchoolController::class,'manage_technicalassesmets'])->name('manage.technical.lists');
 Route::get('technical-assesment-details/{id}', [ManageSchoolController::class, 'manage_technicalassesmets_list'])->name('manage.technical.details');



  




    Route::get('view-submitted-school-bank-details/{id}',[ManageSchoolController::class,'bank_details']);
    Route::post('/payment/update-status', [ManageSchoolController::class,'updateStatus'])->name('payment.updateStatus');
    Route::get('lead-list', [LeadsController::class,'index'])->name('lead.list');

    Route::post('/admin-students-updatevefifyStatus',[ManageSchoolController::class, 'adminupdatevefifyStatus'])->name('admin.student.fee.verify');

    Route::post('active-razorpay', [ManageSchoolController::class,'active_razorpay'])->name('active.razorpay');
    Route::get('/get-schools-by-slot/{examSlotId}', [ManageSchoolController::class, 'getSchoolsBySlot'])->name('get.schools.by.slot');
    Route::post('school-password-change-by-admin', [ManageSchoolController::class, 'school_change_password_byadmin']);

    Route::view('/delete-form', 'delete-form');
});



Route::get('invoice/{id}',[ManageSchoolController::class,'view_invoice'])->name('view-manage.school-paymets');
Route::get('school-report/{schoolid}',[SchoolDetailsController::class,'school_reprot'])->name('view-school-report');

 


Route::middleware('auth')->prefix('manage')->name('manage-map.')->group(function () {
    Route::get('map-subject-lists', [MapController::class, 'index'])->name('index');
    Route::get('map-subject-create', [MapController::class, 'create'])->name('create');
    Route::post('add-subject-store', [MapController::class, 'store'])->name('store');
    Route::get('edit-subject/{id}', [MapController::class, 'edit'])->name('edit');
    Route::put('update-subject/{id}', [MapController::class, 'update'])->name('update');
});



Route::get('school-login', [SchoolLoignController::class, 'index'])->name('school-login'); 
Route::post('school-login', [SchoolLoignController::class, 'store']); 
Route::post('school-logout', [SchoolLoignController::class, 'destroy'])->name('school.logout'); 

// Route::get('/school-login/{code}', [SchoolLoignController::class, 'index'])->name('school-login');
// Route::get('/school-login/{code}/{codex}', [SchoolLoignController::class, 'student'])->name('school-login');


// Route::get('/student-form', [StudentController::class, 'create'])->name('students.create');
// Route::post('/store-student-form', [StudentController::class, 'store'])->name('students.store');
// Route::get('register-successfully', [StudentController::class, 'register_successfully'])->name('register.successfully'); 


Route::post('register-store', [RegistrationController::class, 'store'])->name('register.store');
Route::post('/otp-verify', [OtpVerifyController::class, 'verifyOtp'])->name('otp.verify');
Route::post('/resend-otp', [RegistrationController::class, 'store'])->name('otp.resend'); 
Route::post('/school/save', [SchoolDetailsController::class, 'store'])->name('school.store');
 
Route::post('save-head-of-school', [HeadofSchoolController::class, 'store'])->name('save.head.of.school');
Route::post('save-spark-cordinator', [SparkCordinatorController::class, 'store'])->name('save.spark.cordinator'); 
Route::post('school-enroll-save', [SchollenrolmentController::class, 'store'])->name('school_enroll.save');
Route::post('school-enroll-savelabs', [ManageSchoolController::class, 'savelabs'])->name('school_enroll.savelabs');
Route::post('school-enroll-edit/{id}', [SchollenrolmentController::class, 'edit'])->name('school_enroll.edit');


Route::get('school-create-exam-date', [CommonController::class, 'exam_date_selection'])->name('school.create.date');
Route::post('save-school-create-exam-date', [CommonController::class, 'exam_date_selection_save'])->name('save.school.create.date');

Route::post('thank-you', [GenrateController::class, 'store'])->name('finel.save'); 

 

Route::get('/get-subject/{state_id}', [CommonController::class, 'Getsubject']);
Route::get('/schools/autocomplete', [SchoolDetailsController::class, 'autocomplete'])->name('schools.autocomplete');
Route::get('/schools/get-school', [SchoolDetailsController::class, 'getSchool']);

Route::get('preview', [CommonController::class, 'preview']);


Route::get('school-registration', [CommonController::class, 'index1'])->name('index1.create'); 
Route::get('verify-otp',[CommonController::class, 'index2'])->name('otp.verify.form'); 
Route::get('school-create', [CommonController::class, 'index3'])->name('school.create');
Route::get('head-of-school-info', [CommonController::class, 'index4'])->name('head.of.school');
Route::get('spark-cordinator', [CommonController::class, 'index5'])->name('spark.cordinator');
Route::get('school-enroll', [CommonController::class, 'index6'])->name('school_enroll.create');
Route::get('/get-districts/{state_id}', [CommonController::class, 'getDistricts']);
Route::get('/get-cities/{district_id}', [CommonController::class, 'getCities']);

Route::post('send-otp-mobile', [CommonController::class, 'sendOtpMobile']);
Route::post('verify-otp-mobile', [CommonController::class, 'verifyOtpMobile']);

Route::post('send-otp-email', [CommonController::class, 'sendOtpEmail']);
Route::post('verify-otp-email', [CommonController::class, 'verifyOtpEmail']);
Route::get('get-subject/{state_id}', [CommonController::class, 'Getsubject']);

Route::get('school-login/{code}', [SchoolLoignController::class, 'index'])->name('school.login.code');
//Route::get('school-login/{code}/{codex}', [SchoolLoignController::class, 'student'])->name('school.login.codex');
Route::get('school-list-login', [SchoolLoignController::class, 'school_list_login']);
Route::get('/school-list', [SchoolLoignController::class, 'school_list_login'])->name('school.list');

Route::get('student-form', [StudentController::class, 'create'])->name('students.create');

Route::get('student-payment/{id}', [StudentController::class, 'payment'])->name('students.payment.page');
Route::post('save-student-payment/{id}', [StudentController::class, 'save_payment'])->name('save.payment');

Route::post('store-student-form', [StudentController::class, 'store'])->name('students.store');
Route::get('register-successfully', [StudentController::class, 'register_successfully'])->name('register.successfully');
Route::get('Operating-System-and-Browser-Requirements', [CommonController::class, 'computer_requirement']);
Route::get('Memory-and-Network-Requirements', [CommonController::class, 'computer_requirement1']); 
Route::post('/otp/resend', [CommonController::class, 'resend'])->name('otp.resend');
Route::get('check-verified-data', [CommonController::class, 'CheckVerifiedData']);
Route::get('check-verified-any-one', [CommonController::class, 'CheckVerifiedAnyOne']);
Route::get('get-price', [CommonController::class, 'getPrice']);


 
  

Route::post('/check-record', [DeleteController::class, 'check'])->name('check.record');
Route::delete('/delete-record', [DeleteController::class, 'destroy'])->name('delete.record');

Route::get('student-registration', [CommonController::class, 'student_registration']);
Route::post('api/post-stystem-data', [ProfileController::class, 'stystemData']);

Route::get('api/meeting', [App\Http\Controllers\MeetingConroller::class, 'index']);

Route::post('payment/create-order', [App\Http\Controllers\Web\PaymentController::class, 'createOrder']);
Route::post('payment/success', [App\Http\Controllers\Web\PaymentController::class, 'paymentSuccess']);
Route::post('payment/failure', [App\Http\Controllers\Web\PaymentController::class, 'paymentFailure']);
Route::get('booking-confirmation/{id}', [App\Http\Controllers\Web\PaymentController::class, 'bookingConfirmation']);

Route::get('/admin-to-school-login/{id}', function ($id) {
    $user = \App\Models\SchoolRegistration::findOrFail($id);
    if (empty($user->school_id)) {
        abort(403, 'Dashboard is not ready');die;
    }
    session([
        'original_guard' => 'admin',
        'original_admin_id' => Auth::guard('web')->id(),
    ]);
    Auth::guard('school')->login($user);
    // if(Auth::guard('school')->login($user)){
          return redirect('school-dashboard?type=admin');
     //} else{
       //  return redirect()->back()->with('error', 'Something went wrong');
   //  }
})->middleware('auth');




//////////----------------------Anup route for website ------------///////////
//////////----------------------Anup route for website ------------///////////


Route::get('home', [WebsiteController::class, 'index']);
Route::get('global-mentors',[WebsiteController::class,'gmentors']);
Route::get('mentors/{val}',[WebsiteController::class,'mentors']);
Route::post('websitesendcontactmail', [CommonController::class, 'send_website_mail'])->withoutMiddleware(['csrf']);



//////////----------------------Anup route for website ------------///////////
//////////----------------------Anup route for website ------------///////////
















require __DIR__.'/auth.php';
