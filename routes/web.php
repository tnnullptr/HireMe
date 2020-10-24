<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.home');
Route::get('/admin/skills', [App\Http\Controllers\AdminController::class, 'skill'])->name('admin.skills.home');
Route::post('/admin/skills/accept', [App\Http\Controllers\AdminController::class, 'skill_accept'])->name('admin.skills.accept');

Route::get('/personal', [App\Http\Controllers\PersonalController::class, 'index'])->name('personal.home');
Route::get('/personal/setSkill', [App\Http\Controllers\PersonalController::class, 'set_skill'])->name('personal.setSkill');
