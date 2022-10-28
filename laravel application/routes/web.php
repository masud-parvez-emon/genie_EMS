<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\OwnerController;
use App\Models\Report;
use App\Models\Employee;
use App\Models\Owner;
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

Route::view('/', 'welcome');

//-----------------------------------------------------------------
Route::post('/ownerlogin', [OwnerController::class, 'ownerauth']);
Route::get('/ownerdashboard/logout',[OwnerController::class, 'ownerlogout']);
Route::get('/ownerdashboard',[OwnerController::class, 'ownerdashboard']);
Route::get('/ownerdashboard/addemployee',[OwnerController::class, 'viewregisterform']);
Route::post('/ownerdashboard/addemployee/add',[OwnerController::class, 'addemployee']);
Route::any('/ownerdashboard/employeereport',[OwnerController::class, 'employeereport']);
Route::get('/ownerdashboard/employeereport/detailreport/{username:username}', [OwnerController::class, 'detailreport']);
//-----------------------------------------------------------------




//-----------------------------------------------------------------
Route::post('/employeelogin', [EmployeeController::class, 'employeeauth']);
Route::get('/employeedashboard/logout',[EmployeeController::class, 'employeelogout']);
Route::get('/employeedashboard',[EmployeeController::class, 'employeedashboard']);

Route::get('/employeedashboard/checkin/{id}' , [EmployeeController::class, 'employeecheckin']);
Route::get('/employeedashboard/checkout/{id}' , [EmployeeController::class, 'employeecheckout']);
//-----------------------------------------------------------------


