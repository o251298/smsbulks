<?php

use App\Models\Message;
use App\Settings\SMPP;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SingleSmsController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\Reports;
use App\Http\Controllers\BalanceController;
use Illuminate\Support\Facades\Storage;

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

    $data = [
        "phones" => ["380635661329"],
        "text" => "testasd sms",
        "originator" => "Shop Zakaz"
    ];

    $data = json_encode($data);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data),
            'X-Requested-With: XMLHttpRequest',
            'Accept: application/json, text/javascript, */*; q=0.01',
            'Authorization: Bearer ' . 'HLxFRtg5YnUyrwuGUUWEd2H3un6CbCVJ')
    );
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_URL, 'https://api.acemountmedia.com/sms-v2/send');
    $result = curl_exec($ch);
    $res = $result;
    curl_close($ch);

    dd($res);




    $number1 = new \App\Services\GroupParser('/app/numbers.csv');
    $number1->parse();

    echo '</br>';
    $number = new \App\Services\GroupParser('/app/book.csv');
    $number->parse();

    die();
//    function run(){
//        $arr = ["380508047845", "380635661329", "380962540183", "380504047845", "380508046845", "380501047845", "380508047846"];
//        while(count($arr) != 0){
//            if(count($arr) > 5){
//                echo 'many request' . '<br>';
//                $req = array_splice($arr, 0, 5);
//                $arr = array_diff($arr, $req);
//
//                dump($req);
//                foreach ($req as $item){
//                    $data_array = [
//                        'phones' => [$item],
//                        'text' => "sdasdasda heyh erthw rtgw",
//                        'originator' => "Shop Zakaz"
//                    ];
//                    $data = json_encode($data_array);
//
//                    $ch = curl_init();
//                    curl_setopt_array($ch, [
//                        CURLOPT_URL => 'https://api.acemountmedia.com/sms-v2/send',
//                        CURLOPT_POSTFIELDS => $data,
//                        CURLOPT_POST => true,
//                        CURLOPT_RETURNTRANSFER => true,
//                        CURLOPT_HTTPHEADER => [
//                            'Authorization: Bearer ' . 'HLxFRtg5YnUyrwuGUUWEd2H3un6CbCVJ',
//                            'Content-Type: application/json'
//                        ]
//                    ]);
//                    $result = curl_exec($ch);
//                    $res = $result;
//                    curl_close($ch);
//                    dump($res);
//                }
//                sleep(0.9);
//
//
//
//            } else {
//                echo 'one request' . '<br>';
//                $req = $arr;
//                dump($arr);
//                foreach ($arr as $item) {
//                    $data_array = [
//                        'phones' => [$item],
//                        'text' => "sdasdasda heyh erthw rtgw",
//                        'originator' => "Shop Zakaz"
//                    ];
//                    $data = json_encode($data_array);
//                    $ch = curl_init();
//                    curl_setopt_array($ch, [
//                        CURLOPT_URL => 'https://api.acemountmedia.com/sms-v2/send',
//                        CURLOPT_POSTFIELDS => $data,
//                        CURLOPT_POST => true,
//                        CURLOPT_RETURNTRANSFER => true,
//                        CURLOPT_HTTPHEADER => [
//                            'Authorization: Bearer ' . 'HLxFRtg5YnUyrwuGUUWEd2H3un6CbCVJ',
//                            'Content-Type: application/json'
//                        ]
//                    ]);
//                    $result = curl_exec($ch);
//                    $res = $result;
//                    curl_close($ch);
//                    dump($res);
//                }
//                $arr = [];
//            }
//        }
//    }
//    run();
//    die();

//    $tx = new SMPP('sms.acemountmedia.com',13000);
//    dump($tx->checkSeq());
//    $tx->sendSMS('Shop Zakaz', '380635661329', 'Msssasd');
//    php artisan smpp:transceiver
    return view('main');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group([
    'middleware'  => 'auth'
], function (){
    Route::get('/send/single', [SingleSmsController::class, 'index'])->name('send.single');
    Route::post('/send/single/send', [SingleSmsController::class, 'send'])->name('send.single.send');
    Route::get('/groups', [GroupController::class, 'index'])->name('groups.index');
    Route::get('/groups/create', [GroupController::class, 'create'])->name('groups.create');
    Route::post('/groups/store', [GroupController::class, 'store'])->name('groups.store');
    Route::get('/reports', [Reports::class, 'index'])->name('reports.index');
    Route::get('/balance', [BalanceController::class, 'create'])->name('balance.create');
    Route::get('/balance/list', [BalanceController::class, 'index'])->name('balance.index');
    Route::get('/balance/destroy/{id}', [BalanceController::class, 'destroy'])->name('balance.destroy');
    Route::post('/balance/store', [BalanceController::class, 'store'])->name('balance.store');
});

