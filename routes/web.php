<?php

use App\Settings\SMPP;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SingleSmsController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\Reports;
use App\Http\Controllers\BalanceController;
use App\Http\Controllers\BulkSmsController;

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
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group([
    'middleware'  => 'auth'
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
    Route::get('/balance', [BalanceController::class, 'create'])->name('balance.create');
    Route::get('/balance/list', [BalanceController::class, 'index'])->name('balance.index');
    Route::get('/balance/destroy/{id}', [BalanceController::class, 'destroy'])->name('balance.destroy');
    Route::post('/balance/store', [BalanceController::class, 'store'])->name('balance.store');
});

