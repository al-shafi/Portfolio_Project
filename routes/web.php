<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\MainPagesController;
use App\Http\Controllers\ServicePagesController;
use App\Http\Controllers\PortfolioPagesController;
use App\Http\Controllers\AboutPagesController;
use App\Http\Controllers\ContactFormController;

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\NewEmployeeController;
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

Route::prefix('admin')->group(function(){
    Route::get('/dashboard', [PagesController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/main', [MainPagesController::class, 'index'])->name('admin.main');
    Route::put('/main', [MainPagesController::class, 'update'])->name('admin.main.update');
    Route::get('/services/create', [ServicePagesController::class, 'create'])->name('admin.services.create');
    Route::POST('/services/create', [ServicePagesController::class, 'store'])->name('admin.services.store');
    Route::get('/services/list', [ServicePagesController::class, 'list'])->name('admin.services.list');
    Route::get('/services/edit/{id}', [ServicePagesController::class, 'edit'])->name('admin.services.edit');
    Route::post('/services/update/{id}', [ServicePagesController::class, 'update'])->name('admin.services.update');
    Route::delete('/services/destroy/{id}', [ServicePagesController::class, 'destroy'])->name('admin.services.destroy');
   
    Route::get('/portfolios/create', [PortfolioPagesController::class, 'create'])->name('admin.portfolios.create');
    Route::put('/portfolios/create', [PortfolioPagesController::class, 'store'])->name('admin.portfolios.store');
    Route::get('/portfolios/list', [PortfolioPagesController::class, 'list'])->name('admin.portfolios.list');
    Route::get('/portfolios/edit/{id}', [PortfolioPagesController::class, 'edit'])->name('admin.portfolios.edit');
    Route::post('/portfolios/update/{id}', [PortfolioPagesController::class, 'update'])->name('admin.portfolios.update');
    Route::delete('/portfolios/destroy/{id}', [PortfolioPagesController::class, 'destroy'])->name('admin.portfolios.destroy');

    Route::get('/abouts/create', [AboutPagesController::class, 'create'])->name('admin.abouts.create');
    Route::put('/abouts/create', [AboutPagesController::class, 'store'])->name('admin.abouts.store');
    Route::get('/abouts/list', [AboutPagesController::class, 'list'])->name('admin.abouts.list');
    Route::get('/abouts/edit/{id}', [AboutPagesController::class, 'edit'])->name('admin.abouts.edit');
    Route::post('/abouts/update/{id}', [AboutPagesController::class, 'update'])->name('admin.abouts.update');
    Route::delete('/abouts/destroy/{id}', [AboutPagesController::class, 'destroy'])->name('admin.abouts.destroy');

    Route::get('/employees/create', [EmployeeController::class, 'create'])->name('admin.employees.create');
    Route::put('/employees/create', [EmployeeController::class, 'store'])->name('admin.employees.store');
    Route::get('/employees/list', [EmployeeController::class, 'list'])->name('admin.employees.list');
    Route::get('/employees/edit/{id}', [EmployeeController::class, 'edit'])->name('admin.employees.edit');
    Route::post('/employees/update/{id}', [EmployeeController::class, 'update'])->name('admin.employees.update');
    Route::delete('/employees/destroy/{id}', [EmployeeController::class, 'destroy'])->name('admin.employees.destroy');
   // Route::resource('employees', EmployeeController::class);
   Route::get('newemployees/fetchemployee', [NewEmployeeController::class, 'fetchemployee'])->name('newemployees.fetchemployee');
   Route::get('newemployees/get', [NewEmployeeController::class, 'get'])->name('newemployees.get'); 
   Route::get('newemployees/index1', [NewEmployeeController::class, 'index1'])->name('newemployees.index1'); 
   Route::resource('newemployees', NewEmployeeController::class);
});
Route::post('/contact', [ContactFormController::class, 'store'])->name('contact.store');

Route::get('/home', [PagesController::class, 'index'])->name('home');




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
