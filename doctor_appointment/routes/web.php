<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PatientlistController;
use App\Http\Controllers\PrescriptionController;
use App\Http\Controllers\DepartmentController;


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

Route::get('/', [FrontendController::class, 'index'])->name('home');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


Route::group(['middleware' => ['auth', 'patient']], function() {

    Route::get('/new-appointment/{doctorId}/{date}', [FrontendController::class, 'show'])->name('create.appointment');

    Route::get('/my-booking', [FrontendController::class, 'myBookings'])->name('my.booking');

    Route::get('/user-profile', [ProfileController::class, 'index']);
    Route::post('/profile', [ProfileController::class, 'store'])->name('profile.store');

    Route::post('/profile-pic', [ProfileController::class, 'profilePic'])->name('profile.pic');

    Route::post('/book/appointment', [FrontendController::class, 'store'])->name('booking.appointment');

    Route::get('/my-prescription', [FrontendController::class, 'myPrescription'])->name('my.prescription');

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth', 'admin']], function() {

    Route::resource('doctor', DoctorController::class);
    Route::get('/patients', [PatientlistController::class, 'index'])->name('patient');
    Route::get('/patients/all', [PatientlistController::class, 'allTimeAppointment'])->name('all.appointments');
    Route::get('/status/update/{id}', [PatientlistController::class, 'toggleStatus'])->name('update.status');
    Route::resource('department', DepartmentController::class);

});

Route::group(['middleware' => ['auth', 'doctor']], function() {

    Route::resource('appointment', AppointmentController::class);
    Route::post('/appointment/check', [AppointmentController::class, 'check'])->name('appointment.check');
    Route::post('/appointment/update', [AppointmentController::class, 'updateTime'])->name('update');
    Route::get('patient-today', [PrescriptionController::class, 'index'])->name('patients.today');
    Route::post('/prescription', [PrescriptionController::class, 'store'])->name('prescription');
    Route::get('/prescription/{userId}/{date}', [PrescriptionController::class, 'show'])->name('prescription.show');
    Route::get('/prescribed-patients', [PrescriptionController::class, 'patientsFromPrescription'])->name('prescribed.patients');

});