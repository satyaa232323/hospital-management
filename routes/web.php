<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'redirect']);
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/add_doctor_view', [AdminController::class, 'addview'])->name('admin_view');
Route::post('/upload_doctor', [AdminController::class, 'upload_doctor'])->name('upload');
Route::post('/appointment', [HomeController::class, 'appointment'])->name('appointment');
Route::get('/myAppointment', [HomeController::class, 'myAppointment'])->name('myAppointment');

Route::get('/cancel_appoint/{id}', [HomeController::class, 'cancel_appoint'])->name('cancelappoint');


Route::get('/showappointment', [AdminController::class, 'showappointment'])->name('showappointment');
Route::get('/showdoctors', [AdminController::class, 'showdoctors'])->name('showdoctors');


Route::get('/approved/{id}', [AdminController::class, 'approved'])->name('approved');
Route::get('/canceled/{id}', [AdminController::class, 'canceled'])->name('canceled');
Route::get('/delete_doctor/{id}', [AdminController::class, 'delete_doctor'])->name('delete_doctor');
Route::get('/update_doctor/{$id}', [AdminController::class, 'update_doctor'])->name('update_doctor');
Route::post('/update/{$id}', [AdminController::class, 'update'])->name('update');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
