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
    return redirect('employes');
});


Route::get('/uplaodemployes', [App\Http\Controllers\employeController::class, 'upload'])->name('upload');
Route::post('/uplaodemployes', [App\Http\Controllers\employeController::class, 'doUpload'])->name('doUpload');


Route::get('/employes/{perpage?}', [App\Http\Controllers\employeController::class, 'list'])->name('employes');
Route::get('/employe/{departament}', [App\Http\Controllers\employeController::class, 'departmentList'])->name('department');


