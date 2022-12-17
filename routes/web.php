<?php

use App\Http\Controllers\AssignCashiersController;
use App\Http\Controllers\AssignDriversController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BusesController;
use App\Http\Controllers\ExpenseItemsController;
use App\Http\Controllers\ExpensesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RoutesController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\UsersController;
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

    if(auth()->check()){
        if(auth()->user()->usertype == 'admin'){
            return redirect()->route('admin.home');
        }
    };
    return view('auth.login');
});

Route::get('/login', [AuthController::class, 'loginIndex'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'loginStore']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'registerIndex'])->name('register')->middleware('guest');
Route::post('/register', [AuthController::class, 'registerStore']);


Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('/admin/home', [HomeController::class, 'admin'])->name('admin.home');
});
Route::group(['middleware' => ['auth', 'user']], function () {
    Route::get('/user/home', [HomeController::class, 'admin'])->name('user.home');
});
Route::group(['middleware' => ['auth', 'agent']], function () {
    Route::get('/agent/home', [HomeController::class, 'agent'])->name('agent.home');
});

Route::group(['prefix' => 'setups', 'middleware' => ['auth']], function () {
    Route::get('/buses/index', [BusesController::class, 'index'])->name('buses.index');
    Route::post('/buses/index', [BusesController::class, 'store']);
    Route::post('/buses/update', [BusesController::class, 'update'])->name('buses.update');
    Route::post('/buses/delete', [BusesController::class, 'delete'])->name('buses.delete');

    Route::get('/terminals/index', [RoutesController::class, 'index'])->name('routes.index');
    Route::post('/terminals/index', [RoutesController::class, 'store']);
    Route::post('/terminals/update', [RoutesController::class, 'update'])->name('routes.update');
    Route::post('/terminals/delete', [RoutesController::class, 'delete'])->name('routes.delete');

    Route::get('/expense_items/index', [ExpenseItemsController::class, 'index'])->name('expense_items.index');
    Route::post('/expense_items/index', [ExpenseItemsController::class, 'store']);
    Route::post('/expense_items/update', [ExpenseItemsController::class, 'update'])->name('expense_items.update');
    Route::post('/expense_items/delete', [ExpenseItemsController::class, 'delete'])->name('expense_items.delete');

    Route::get('/assign/drivers/index', [AssignDriversController::class, 'index'])->name('assign.drivers.index');
    Route::post('/assign/drivers/index', [AssignDriversController::class, 'store']);
    Route::post('/assign/drivers/update', [AssignDriversController::class, 'update'])->name('assign.drivers.update');
    Route::get('/assign/drivers/edit/{id}', [AssignDriversController::class, 'edit'])->name('assign.drivers.edit');
    Route::post('/assign/drivers/update/{id}', [AssignDriversController::class, 'update'])->name('assign.drivers.update');
    Route::post('/assign/drivers/delete', [AssignDriversController::class, 'delete'])->name('assign.drivers.delete');

    Route::get('/assign/cashiers/index', [AssignCashiersController::class, 'index'])->name('assign.cashiers.index');
    Route::post('/assign/cashiers/index', [AssignCashiersController::class, 'store']);
    Route::post('/assign/cashiers/update', [AssignCashiersController::class, 'update'])->name('assign.cashiers.update');
    Route::get('/assign/cashiers/edit/{id}', [AssignCashiersController::class, 'edit'])->name('assign.cashiers.edit');
    Route::post('/assign/cashiers/update/{id}', [AssignCashiersController::class, 'update'])->name('assign.cashiers.update');
    Route::post('/assign/cashiers/delete', [AssignCashiersController::class, 'delete'])->name('assign.cashiers.delete');
   
});


Route::group(['prefix' => 'users', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/index', [UsersController::class, 'index'])->name('users.index');
    Route::post('/store', [UsersController::class, 'store'])->name('users.store');
    Route::post('/verify', [UsersController::class, 'verify'])->name('users.verify');
    Route::post('/sort', [UsersController::class, 'sort'])->name('users.sort');
    Route::get('/sort', [UsersController::class, 'sort'])->name('users.sort');
    Route::post('/get-user-details', [UsersController::class, 'getDetails'])->name('get-user-details');
});

Route::group(['prefix' => 'sales', 'middleware' => ['auth']], function () {
    Route::get('/index', [SalesController::class, 'index'])->name('sales.index');
    Route::post('/index', [SalesController::class, 'store']);
    Route::get('/create', [SalesController::class, 'create'])->name('sales.create');

 
});
Route::group(['prefix' => 'expense', 'middleware' => ['auth']], function () {
    Route::get('/index', [ExpensesController::class, 'index'])->name('expenses.index');
    Route::post('/index', [ExpensesController::class, 'store']);
    Route::get('/create', [ExpensesController::class, 'create'])->name('expenses.create');
});
Route::group(['prefix' => 'report', 'middleware' => ['auth']], function () {
    Route::get('/index', [ReportController::class, 'index'])->name('report.index');
    Route::post('/generate', [ReportController::class, 'generate'])->name('report.generate');
});



