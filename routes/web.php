<?php

use App\Http\Controllers\Admin\ClassesController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\URL;
use PHPUnit\Runner\Hook;

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

Auth::routes();

//__crud operations route for classes__//
Route::get('/classes',[ClassesController::class,'index'])->name('classes.index');
Route::get('/create/class',[ClassesController::class,'create'])->name('create.class');
Route::post('/store/class',[ClassesController::class,'store'])->name('store.class');
Route::get('/classes/delete/{id}',[ClassesController::class,'delete'])->name('delete.class');
























Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//__email verification send__//
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

//__deposite money__//
Route::get('/deposite/money',[HomeController::class,'deposite'])->name('deposite.money')->middleware('verified');
//email verification notice
Route::get('/verify/email', [HomeController::class,'verified'])->name('verification.notice')->middleware('auth');
// email verification resend
Route::post('/resend/email', [VerificationController::class,'resend'])->name('verification.resend')->middleware('auth');
// password change file view
Route::get('/password/change',[HomeController::class,'passChange'])->name('password.change');
// update password
Route::post('/password/update',[HomeController::class,'updatePass'])->name('update.password')->middleware('auth');
