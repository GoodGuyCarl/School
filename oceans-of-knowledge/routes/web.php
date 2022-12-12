<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

Route::get('/', [AuthController::class, 'home']);
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('postlogin');
Route::get('signup', [AuthController::class, 'signup'])->name('register-user');
Route::post('signup', [AuthController::class, 'register'])->name('postregister');
Route::get('signout', [AuthController::class, 'signout'])->name('signout');
Route::get('teacher/signup', [AuthController::class, 'register_teacher'])->name('register-teacher');

Route::get('profile', [UserController::class, 'profile'])->name('profile');
Route::get('profile/edit', [UserController::class, 'edit_profile'])->name('edit_profile');
Route::post('profile/edit', [UserController::class, 'update'])->name('update');
Route::get('upload', [UserController::class, 'upload'])->name('upload');
Route::post('upload', [UserController::class, 'upload_image'])->name('upload_vax');

Route::get('dashboard', [AdminController::class, 'dashboard'])->name('home');
Route::get('records', [AdminController::class, 'records'])->name('records');
Route::get('profile/{id}', [AdminController::class, 'edit'])->name('edit');
Route::post('profile/{id}', [AdminController::class, 'update'])->name('adminupdate');
Route::get('student/delete/{id}', [AdminController::class, 'delete_student'])->name('delete_student');
Route::get('staff/delete/{id}', [AdminController::class, 'delete_staff'])->name('delete_staff');
Route::get('staff', [AdminController::class, 'staff'])->name('staff');
Route::get('search', [AdminController::class, 'search'])->name('search');
