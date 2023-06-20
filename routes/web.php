<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController; //Mendaftarkan controller yang akan digunakan
use App\Http\Controllers\PositionController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\ResepController;
use App\Models\Obat;

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


Route::get('register', [UserController::class, 'register'])->name('register');
Route::post('register', [UserController::class, 'register_action'])->name('register.action');    
Route::get('login', [UserController::class, 'login'])->name('login');
Route::post('login', [UserController::class, 'login_action'])->name('login.action');

Route::middleware('auth')->group(
    function () {
        Route::get('/', function () {
            return view('home', ['title' => 'Home']);
        })->name('home');
        Route::get('password', [UserController::class, 'password'])->name('password');
        Route::post('password', [UserController::class, 'password_action'])->name('password.action');
        Route::get('logout', [UserController::class, 'logout'])->name('logout');

        //route position
        Route::resource('positions', PositionController::class);
         //route user
         Route::resource('user', UserController::class);
         Route::get('users/export-pdf', [UserController::class, 'exportPdf'])->name('users.export-Pdf');
         
        Route::resource('departements', DepartementController::class);
        Route::get('departement/export-pdf', [DepartementController::class, 'exportPdf'])->name('departements.exportPdf');
        Route::get('position/export-excel', 
        [PositionController::class, 'exportExcel'])
        ->name('positions.exportExcel');
        Route::resource('reseps', RESEPController::class);
        Route::get('chartLine', [ObatController::class, 'chartLine']);
        Route::get('chart-line-ajax', [ObatController::class, 'chartLineAjax'])->name('reseps.chartLineAjax');
        Route::get('search/obat', [ObatController::class, 'autocomplete'])->name('search.obat');
        Route::resource('obats', ObatController::class);
    });