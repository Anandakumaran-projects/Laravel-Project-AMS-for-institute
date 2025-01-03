<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

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
    return view('/welcome');
});

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
// Route::get('/dashboard', [AuthController::class, 'index']);

Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

Route::get('/addstudent', [StudentController::class, 'create'])->name('student.create');
Route::post('/addstudent', [StudentController::class, 'store'])->name('student.store');
Route::get('/studenttable', [StudentController::class, 'index'])->name('student.index');

/*Route::get('/attendancetable',[AttendanceController::class,'index'])->name('attendancetable');
*/

// Route::get('/report', [AttendanceController::class, 'showreport'])->name('report');
Route::get('/attendancetable', [AttendanceController::class, 'attendancetable'])->name('attendancetable');
// Route::get('/dashboard', [AttendanceController::class, 'dashboard'])->name('dashboard');
// Route::get('/report', [AttendanceController::class, 'getMonthlyAttendance']);


Route::get('/permissiontable', [PermissionController::class, 'permissiontable'])->name('permissiontable');
// Route::get('/dashboard', [PermissionController::class, 'dashboard'])->name('dashboard');
// Route::get('/report', [PermissionController::class, 'getMonthlyPermission']);

Route::get('/report',[ReportController::class,'showReport']);


// Route::get('/dashboard', [AuthController::class, 'index'])->name('/dashboard');
