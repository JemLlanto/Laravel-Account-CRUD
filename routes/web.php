<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;

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
Route::get('/dashboard', [AccountController::class, 'ShowDashboard'])->name('dashboard');

Route::get('/addUser', [AccountController::class, 'showAddUser'])->name('addUserForm');
Route::post('/addUser', [AccountController::class, 'AddUser'])->name('addUser');

Route::get('/editUser/{id}', [AccountController::class, 'showEditUser'])->name('editUserForm');
Route::post('/editUser/{id}', [AccountController::class, 'editUser'])->name('editUser');

Route::delete('/delete/{id}', [AccountController::class, 'DeleteUser'])->name('deleteUser');


Route::get('/', [AccountController::class, 'LoginForm'])->name('login');
Route::post('/', [AccountController::class, 'Login'])->name('loginAccount');
Route::post('/logout', [AccountController::class, 'Logout'])->name('logout');

Route::get('/register', [AccountController::class, 'RegisterForm'])->name('register');
Route::post('/register', [AccountController::class, 'Register'])->name('registerAccount');
