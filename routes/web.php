<?php

use App\Http\Controllers\StudentContoller;
use App\Http\Controllers\AuthController;

use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\MockObject\Stub\Stub;

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

Route::get('/signup', [AuthController::class, 'showSignup'])->name('signup');
Route::post('/signup', [AuthController::class, 'signupPost'])->name('signup.post');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'loginPost'])->name('login.post');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



Route::prefix('students') ->middleware('auth')->name('students.')->group(function(){
Route::get('/',[StudentContoller::class,'index'])->name('index');
Route::get('/create',[StudentContoller::class,'create'])->name('create');
Route::post('/',[StudentContoller::class,'store'])->name('store');
Route::get('/edit/{id}',[StudentContoller::class,'edit'])->name('edit');
Route::put('/{id}',[StudentContoller::class,'update'])->name('update');
Route::delete('/delete/{id}',[StudentContoller::class,'destroy'])->name('destroy');
});


