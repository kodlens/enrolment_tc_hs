<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;


use App\Models\User;
use App\Models\Category;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Auth::routes([
    'login' => 'false'
]);

Route::get('/load-user', function(){
    if(Auth::check()){
        return Auth::user();
    }
});




Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);

Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout']);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/sign-up', [App\Http\Controllers\SignUpController::class, 'index']);
Route::post('/sign-up', [App\Http\Controllers\SignUpController::class, 'store']);

Route::get('/get-user/{id}', [App\Http\Controllers\OpenUserController::class, 'getUser']);



//ADDRESS
Route::get('/load-provinces', [App\Http\Controllers\AddressController::class, 'loadProvinces']);
Route::get('/load-cities', [App\Http\Controllers\AddressController::class, 'loadCities']);
Route::get('/load-barangays', [App\Http\Controllers\AddressController::class, 'loadBarangays']);



// -----------------------ADMINSITRATOR-------------------------------------------

Route::get('/admin-home', [App\Http\Controllers\Administrator\AdminHomeController::class, 'index']);


Route::resource('/accounts', App\Http\Controllers\Administrator\AccountController::class);
Route::get('/get-accounts', [App\Http\Controllers\Administrator\AccountController::class, 'getAccounts']);


Route::resource('/designations', App\Http\Controllers\Administrator\DesignationController::class);
Route::get('/get-designations', [App\Http\Controllers\Administrator\DesignationController::class, 'getDesignations']);




Route::get('/manage-patient', [App\Http\Controllers\Administrator\ManagePatientController::class, 'index']);

// -----------------------ADMINSITRATOR-------------------------------------------



//open links
Route::get('/load-open-nationalities', [App\Http\Controllers\OpenController::class, 'loadNationalities']);
Route::get('/load-open-religions', [App\Http\Controllers\OpenController::class, 'loadReligions']);


Route::get('/get-browse-patient', [App\Http\Controllers\Nurse\AdmissionController::class, 'browsePatient']);



// -----------------------NURSE-------------------------------------------

Route::resource('/admission', App\Http\Controllers\Nurse\AdmissionController::class);

Route::resource('/patient-profile', App\Http\Controllers\Nurse\PatientProfileController::class,);
Route::resource('/patient-admission', App\Http\Controllers\Nurse\PatientAdmissionController::class,);



//patient admission, si nurse ang mag input ug save
Route::post('/patient-admission-store', [App\Http\Controllers\Nurse\PatientAdmissionController::class, 'store']);
Route::delete('/doctor-patient-delete-nurse-patient/{id}', [App\Http\Controllers\Nurse\NursePatientController::class, 'destroy']);



Route::resource('/nurse-home', App\Http\Controllers\Nurse\NurseHomeController::class);

Route::resource('/nurse-patient', App\Http\Controllers\Nurse\NursePatientController::class);
Route::get('/get-nurse-patients',[App\Http\Controllers\Nurse\NursePatientController::class, 'getNursePatients']);


Route::get('/nurse-cared/{admissionId}/{patientId}',
    [App\Http\Controllers\Nurse\NurseCaredController::class, 'index']);
Route::post('/nurse-cared-submit',
    [App\Http\Controllers\Nurse\NurseCaredController::class, 'store']);
Route::get('/get-nurse-cared/{admissionId}/{patientId}',
    [App\Http\Controllers\Nurse\NurseCaredController::class, 'getCared']);


//notes
Route::get('/nurse-notes/{admissionId}/{patientId}', [App\Http\Controllers\Nurse\NurseNoteController::class, 'index']);
Route::post('/nurse-notes-submit', [App\Http\Controllers\Nurse\NurseNoteController::class, 'store']);
Route::get('/get-nurse-notes/{admissionId}/{patientId}', [App\Http\Controllers\Nurse\NurseNoteController::class, 'getNurseNotes']);
Route::get('/get-doctor-orders-for-patient/{admissionId}/{patientId}', [App\Http\Controllers\Nurse\NurseNoteController::class, 'getDoctorOrderForPatient']);



//medication
Route::get('/nurse-patient-medications/{admissionId}/{patientId}', [App\Http\Controllers\Nurse\NursePatientMedicationController::class, 'index']);
Route::post('/nurse-patient-medication-submit', [App\Http\Controllers\Nurse\NursePatientMedicationController::class, 'store']);
Route::get('/get-patient-medications/{admissionId}/{patientId}', [App\Http\Controllers\Nurse\NursePatientMedicationController::class, 'getPatientMedications']);


Route::get('/nurse-patient-diagnoses/{id}',[App\Http\Controllers\Nurse\NursePatientDiagnoseController::class, 'index']);
Route::get('/get-nurse-patient-diagnoses/{id}',[App\Http\Controllers\Nurse\NursePatientDiagnoseController::class, 'getPatientDiagnoses']);

Route::post('/nurse-patient-submit-diagnose',[App\Http\Controllers\Nurse\NursePatientDiagnoseController::class, 'store']);


Route::get('/nurse-patient-diagnose-doctor-orders/{id}',[App\Http\Controllers\Nurse\NursePatientDiagnoseDoctorOrderController::class, 'index']);
Route::get('/get-nurse-patient-diagnose-doctor-orders/{id}',[App\Http\Controllers\Nurse\NursePatientDiagnoseDoctorOrderController::class, 'getDoctorOrders']);
Route::post('/nurse-patient-diagnose-doctor-orders-detail-update/{id}',[App\Http\Controllers\Nurse\NursePatientDiagnoseDoctorOrderController::class, 'updateOrderDetail']);


// -----------------------NURSE-------------------------------------------








// -----------------------DOCTOR-------------------------------------------
Route::resource('/doctor-home', App\Http\Controllers\Doctor\DoctorHomeController::class);

Route::resource('/doctor-patients', App\Http\Controllers\Doctor\DoctorPatientController::class);
Route::get('/get-doctor-patients', [App\Http\Controllers\Doctor\DoctorPatientController::class, 'getDoctorPatients']);

Route::get('/doctor-patient-diagnose/{admissionId}/{patientId}', [App\Http\Controllers\Doctor\DoctorPatientDiagnoseController::class, 'index']);
Route::post('/doctor-patient-diagnose', [App\Http\Controllers\Doctor\DoctorPatientDiagnoseController::class, 'store']);
Route::get('/get-patient-diagnose-by-admission-and-patient/{admissionId}/{patientId}', [App\Http\Controllers\Doctor\DoctorPatientDiagnoseController::class, 'getDiagnose']);

Route::get('/doctor-patient-history/{admissionId}/{patientId}', [App\Http\Controllers\Doctor\DoctorPatientHistory::class, 'index']);
Route::post('/doctor-patient-history', [App\Http\Controllers\Doctor\DoctorPatientHistory::class, 'store']);
Route::get('/get-patient-history-by-admission-and-patient/{admissionId}/{patientId}', [App\Http\Controllers\Doctor\DoctorPatientHistory::class, 'getHistory']);

Route::get('/doctor-patient-system-review/{admissionId}/{patientId}', [App\Http\Controllers\Doctor\DoctorPatientSystemReviewController::class, 'index']);
Route::post('/doctor-patient-system-review', [App\Http\Controllers\Doctor\DoctorPatientSystemReviewController::class, 'store']);
Route::get('/get-patient-system-review-by-admission-and-patient/{admissionId}/{patientId}', [App\Http\Controllers\Doctor\DoctorPatientSystemReviewController::class, 'getSystemReview']);


Route::get('/doctor-patient-physical-exam/{admissionId}/{patientId}', [App\Http\Controllers\Doctor\DoctorPatientPhysicalExamController::class, 'index']);
Route::post('/doctor-patient-physical-exam', [App\Http\Controllers\Doctor\DoctorPatientPhysicalExamController::class, 'store']);
Route::get('/get-patient-physical-exam-by-admission-and-patient/{admissionId}/{patientId}', [App\Http\Controllers\Doctor\DoctorPatientPhysicalExamController::class, 'getPhysicalExam']);

Route::get('/doctor-orders/{admissionId}/{patientId}', [App\Http\Controllers\Doctor\DoctorOrderController::class, 'index']);
Route::post('/doctor-orders-submit', [App\Http\Controllers\Doctor\DoctorOrderController::class, 'store']);
Route::get('/get-patient-doctor-orders/{admissionId}/{patientId}', [App\Http\Controllers\Doctor\DoctorOrderController::class, 'getDoctorOrders']);
Route::delete('/doctor-orders-delete/{id}', [App\Http\Controllers\Doctor\DoctorOrderController::class, 'destroy']);




Route::get('/doctor-patient-disposition/{admissionId}/{patientId}', [App\Http\Controllers\Doctor\DoctorPatientDispositionController::class, 'index']);
Route::get('/get-patient-all-data/{admissionId}/{patientId}', [App\Http\Controllers\Doctor\DoctorPatientDispositionController::class, 'getPatientInfo']);

Route::post('/doctor-patient-discharge', [App\Http\Controllers\Doctor\DoctorPatientDispositionController::class, 'store']);
Route::get('/get-patient-doctor-to-discharge/{admissionId}/{patientId}', [App\Http\Controllers\Doctor\DoctorPatientDispositionController::class, 'getPatientDoctorToDischarge']);



//summarry
Route::get('/patient-summary/{admissionId}/{patientId}', [App\Http\Controllers\Doctor\PatientSummaryController::class, 'index']);
Route::get('/get-summary-patient/{admissionId}/{patientId}', [App\Http\Controllers\Doctor\PatientSummaryController::class, 'summary']);


//Route::get('/doctor-admission/{id}', [App\Http\Controllers\Doctor\DoctorAdmissionPatient::class, 'index']);
//Route::post('/doctor-admission/{id}', [App\Http\Controllers\Doctor\DoctorAdmissionPatient::class, 'store']);


// -------------------------------DOCTOR-------------------------------------------





// -------------------------------CHIEF NURS-------------------------------------------
Route::get('/chief-home', [App\Http\Controllers\Chief\ChiefHomeController::class, 'index']);

Route::get('/chief-patients', [App\Http\Controllers\Chief\ChiefPatientController::class, 'index']);
Route::get('/chief-patient-summary/{admissionId}/{patientId}', [App\Http\Controllers\Chief\ChiefPatientSummaryController::class, 'index']);
Route::get('/get-summary-patient/{admissionId}/{patientId}', [App\Http\Controllers\Chief\ChiefPatientSummaryController::class, 'summary']);




// -------------------------------RECORD-------------------------------------------
Route::get('/record-home', [App\Http\Controllers\Record\RecordHomeController::class, 'index']);
Route::get('/record-patients', [App\Http\Controllers\Record\RecordPatientController::class, 'index']);
Route::get('/discharge-summary/{admissionId}/{patientId}', [App\Http\Controllers\Record\DischargeSummaryController::class, 'index']);





Route::get('/session', function(){
    return Session::all();
});



Route::get('/applogout', function(Request $req){
    \Auth::logout();
    $req->session()->invalidate();
    $req->session()->regenerateToken();


});
