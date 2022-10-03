<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;
use App\Http\Controllers\AdminController;

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

Route::get('/', [App\Http\Controllers\MyController::class, 'index2'])->name('index2');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('adddoctor', [AdminController::class, 'adddoctor'])->name('add.doctor');
Route::post('insertdoctor', [AdminController::class, 'insertdoctor'])->name('insert.doctor');
Route::post('insertappo', [AdminController::class, 'insertappo'])->name('insert.appo');
Route::get('showappo', [AdminController::class, 'showappo'])->name('show.appo');
Route::get('delappo/{id}', [AdminController::class, 'delappo'])->name('del.appo');
Route::get('adminappo', [AdminController::class, 'adminappo'])->name('admin.appo');
Route::get('approvedappo/{id}', [AdminController::class, 'approvedappo'])->name('approved.appo');
Route::get('cancelappo/{id}', [AdminController::class, 'cancelappo'])->name('cancel.appo');
Route::get('editdoctor/{id}', [AdminController::class, 'editdoctor'])->name('edit.doctor');
Route::post('updatedoctor/{id}', [AdminController::class, 'updatedoctor'])->name('update.doctor');
Route::get('deldoctor/{id}', [AdminController::class, 'deldoctor'])->name('del.doctor');

//Route::get('/myadmin',[MyController::class,'redirect']);
