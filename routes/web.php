<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
Use App\Http\Controllers\HomeControler;
Use App\Http\Controllers\LoginController;
Use App\Http\Controllers\RegisterController;
Use Illuminate\Notifications\Action;
Use App\Http\Controllers\ActivityController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ConfirmController;
use App\Http\Controllers\EvaFormController;
use App\Http\Controllers\SpreadsheetController;
use App\Http\Controllers\UploadController;

use App\Http\Controllers\UpdateActivityController;

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

Route::get('/', [HomeControler::class, 'get'])->name('home');


route::get('/login', [LoginController::class, 'get'])->name('login')->middleware('guest');

route::get('/register', [RegisterController::class, 'get'])->name('register')->middleware('guest');


route::post('/login', [LoginController::class, 'attempt']);

route::post('/register', [RegisterController::class, 'create']);

route::post('/logout', function(){
    Auth::logout();
    return redirect('/');
}); 

route::post('/activity', [ActivityController::class, 'store']);

route::delete('/activity', [ActivityController::class, 'delete']);

route::get('/activity/{id}/update', [UpdateActivityController::class, 'get']);

route::put('/activity/{id}/update', [UpdateActivityController::class, 'update']);


route::get('/spreadsheet', [SpreadsheetController::class, 'get'])->name('spreadsheet')->middleware('auth');
route::post('/spreadsheet', [SpreadsheetController::class, 'store'])->name('spreadsheet')->middleware('auth');
//route::post('/spreadsheet', [UploadController::class, 'post'])->name('spreadsheet')->middleware('auth');

Route::get('/contact', [ContactController::class, 'get'])->name('contact');
Route::post('/contact', [ContactController::class, 'store']);

Route::get('/eva', [EvaFormController::class, 'get'])->name('eva');
Route::post('/eva', [EvaFormController::class, 'store']);
Route::get('/confirm', [EvaFormController::class, 'get'])->name('confirm');