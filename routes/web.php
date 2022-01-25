<?php

use App\Settings\SMPP;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SingleSmsController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\Reports;
use App\Http\Controllers\BalanceController;
use App\Http\Controllers\BulkSmsController;
use Illuminate\Support\Facades\Cookie;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\OriginatorController;
use App\Http\Controllers\Admin\OriginatorController as AdminOriginatorController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Admin\PaymentController as AdminPaymentController;
use App\Http\Controllers\Admin\WalletController;
use App\Http\Controllers\HomeController;

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
return view('main');
});

Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('user');
Route::group([
    'middleware'  => ['auth', 'user']
], function (){
    Route::get('/send/single', [SingleSmsController::class, 'index'])->name('send.single');
    Route::post('/send/single/send', [SingleSmsController::class, 'send'])->name('send.single.send');
    Route::get('/send/bulk/', [BulkSmsController::class, 'index'])->name('send.bulk');
    Route::post('/send/bulk/send', [BulkSmsController::class, 'store'])->name('send.bulk.send');
    Route::post('/bulk/coast', [BulkSmsController::class, 'coastBulk']);
    Route::get('/groups', [GroupController::class, 'index'])->name('groups.index');
    Route::get('/groups/create', [GroupController::class, 'create'])->name('groups.create');
    Route::post('/groups/store', [GroupController::class, 'store'])->name('groups.store');
    Route::get('/groups/{id}', [GroupController::class, 'view'])->name('groups.view');
    Route::get('/reports', [Reports::class, 'index'])->name('reports.index');
    Route::get('/api-documentation', [HomeController::class, 'documentation'])->name('documentation');

    Route::get('/originator/create', [OriginatorController::class, 'create'])->name('originator.create');
    Route::post('/originator/store', [OriginatorController::class, 'store'])->name('originator.store');
    Route::get('/originators', [OriginatorController::class, 'index'])->name('originator.list');
    Route::get('/payments', [PaymentController::class, 'index'])->name('payments.list');
    Route::get('/payment-interkassa', [PaymentController::class, 'interkassa'])->name('payments.interkassa');
});
Route::group([
    'middleware' => ['auth', 'admin'],
    'prefix' => 'admin'
], function (){
    Route::get('/', [MainController::class, 'index'])->name('admin');
    Route::get('/users', [UsersController::class, 'index'])->name('admin.users');
    Route::get('/users/destroy/{user}', [UsersController::class, 'destroy'])->name('admin.users.destroy');
    Route::get('/admin/change/{id}', [UsersController::class, 'change'])->name('change');
    Route::get('/originators', [AdminOriginatorController::class, 'index'])->name('admin.originators');
    Route::get('/originators/activate/{originator}', [AdminOriginatorController::class, 'activate'])->name('admin.originators.activate');
    Route::get('/originators/deactivate/{originator}', [AdminOriginatorController::class, 'deactivate'])->name('admin.originators.deactivate');
    Route::get('/messages', [MessageController::class, 'index'])->name('admin.messages');
    Route::get('/payments', [AdminPaymentController::class, 'index'])->name('admin.payments');
//    Route::get('/balance', [BalanceController::class, 'create'])->name('balance.create');
//    Route::get('/balance/list', [BalanceController::class, 'index'])->name('balance.index');
//    Route::get('/balance/destroy/{id}', [BalanceController::class, 'destroy'])->name('balance.destroy');
//    Route::post('/balance/store', [BalanceController::class, 'store'])->name('balance.store');
    Route::post('/wallet/store', [WalletController::class, 'store'])->name('admin.wallet.store');
});
Route::any('/payment-interkassa/success', [PaymentController::class, 'success'])->name('payments.interkassa.success');
Route::any('/payment-interkassa/error', [PaymentController::class, 'error'])->name('payments.interkassa.error');
Route::any('/payment-interkassa/proccess', [PaymentController::class, 'proccess'])->name('payments.interkassa.proccess');
