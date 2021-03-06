<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes(['verify' => true]);



Route::middleware(['auth', 'verified'])->group(function () {


    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('employee', 'EmployeeController');
    Route::resource('typevacations', 'TypevacationsController');
    Route::resource('vacations', 'VacationsController');

    Route::get('vacations/{employee_id}/{typevacation_id}/{date_start}/{days}', 'VacationsController@c');

    Route::resource('country', 'CountryController');
    Route::resource('city', 'CityController');
    Route::resource('administration', 'AdministrationController');
    Route::resource('section', 'SectionController');
    Route::resource('titlejob', 'TitlejobController');
    Route::resource('allowance', 'AllowanceController');
    Route::resource('payroll', 'PayrollController');


});


