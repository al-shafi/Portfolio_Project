<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\MainPagesController;
use App\Http\Controllers\ServicePagesController;
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

Route::get('/', [PagesController::class, 'index'])->name('home');

Route::get('/admin/dashboard', [PagesController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/admin/main', [MainPagesController::class, 'index'])->name('admin.main');
Route::put('/admin/main', [MainPagesController::class, 'update'])->name('admin.main.update');
Route::get('/admin/services/create', [ServicePagesController::class, 'create'])->name('admin.services.create');
Route::POST('/admin/services/create', [ServicePagesController::class, 'store'])->name('admin.services.store');
Route::get('/admin/services/list', [ServicePagesController::class, 'list'])->name('admin.services.list');
Route::get('/admin/services/edit/{id}', [ServicePagesController::class, 'edit'])->name('admin.services.edit');
Route::post('/admin/services/update/{id}', [ServicePagesController::class, 'update'])->name('admin.services.update');
Route::delete('/admin/services/destroy/{id}', [ServicePagesController::class, 'destroy'])->name('admin.services.destroy');



/*
Route::get('/', function () {
    return view('pages.index');
});
*/

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
