<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthEmployeeLoginController;
use App\Http\Controllers\EmployeeDashboardController;
use App\Http\Controllers\EmployeeProfileController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/order/add', [OrderController::class, 'add'])->name('order.add');
    Route::get('/order/show', [OrderController::class, 'show'])->name('order.show');
    Route::get('order/delete/{order}', [OrderController::class, 'destroy'])->name('order.delete');
    Route::get('order/order/{order}', [OrderController::class, 'order'])->name('order.order');
});

Route::middleware(['auth:employee'])->group(function () {
    Route::get('/employee/dashboard', [EmployeeDashboardController::class, 'index'])->name('employee.dashboard');
    Route::get('/employee/profile', [EmployeeProfileController::class, 'edit'])->name('employee.profile.edit');

    Route::get('/employee/products', [ProductController::class, 'create'])->name('employee.products.create');
    Route::post('/employee/products', [ProductController::class, 'store'])->name('employee.products.store');
    Route::get('/employee/products/{product}', [ProductController::class, 'edit'])->name('employee.products.edit');
    Route::post('/employee/products/{product}', [ProductController::class, 'update'])->name('employee.products.update');
    Route::get('/employee/products/delete/{product}', [ProductController::class, 'destroy'])->name('employee.products.destroy');

    Route::get('/employee/create', [EmployeeController::class, 'create'])->name('employee.create');
    Route::post('/employee', [EmployeeController::class, 'store'])->name('employee.store');
    Route::get('/employee/edit/{employee}', [EmployeeController::class, 'edit'])->name('employee.edit');
    Route::post('/employee/edit/{employee}', [EmployeeController::class, 'update'])->name('employee.update');
    Route::delete('/employee/{employee}', [EmployeeController::class, 'destroy'])->name('employee.destroy');

    Route::get('/employee/order/show/{order}', [OrderController::class, 'employeeShow'])->name('employee.order.show');
    Route::get('/employee/order/close/{order}', [OrderController::class, 'close'])->name('employee.order.close');
    Route::get('/employee/order/open/{order}', [OrderController::class, 'open'])->name('employee.order.open');

    // Voeg hier eventuele extra routes toe die alleen toegankelijk zijn voor medewerkers
});


Route::get('/employee/login', [AuthEmployeeLoginController::class, 'showLoginForm']);
Route::post('/employee/login', [AuthEmployeeLoginController::class, 'login'])->name('employee.login');
Route::post('/employee/logout', [AuthEmployeeLoginController::class, 'logout'])->name('employee.logout');

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

Route::get('/employee', [EmployeeController::class, 'index'])->name('employee.index');

require __DIR__.'/auth.php';
