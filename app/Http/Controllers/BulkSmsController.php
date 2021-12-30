<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BulkSmsController extends Controller
{
    protected $token = 'HLxFRtg5YnUyrwuGUUWEd2H3un6CbCVJ';
    public function send()
    {
        $data = array();
        $data_array = [
            'phones' => [$this->phone],
            'text' => $this->massage,
            'originator' => $this->origanator
        ];
        $data = json_encode($data_array);

        $arr = ["380508047845", "380635661329", "380962540183", "380504047845", "380508046845", "380501047845", "380508047846"];
        while(count($arr) != 0){
            if(count($arr) > 5){
                echo 'many request' . '<br>';
                $req = array_splice($arr, 0, 5);
                $arr = array_diff($arr, $req);
                var_dump($req);
                sleep(0.9);
                echo '<hr>' . '<br>';





                //var_dump($arr);
                //echo '<hr>' . '<br>';
            } else {
                echo 'one request' . '<br>';
                $req = $arr;
                var_dump($arr);
                echo '<hr>' . '<br>';
                $arr = [];





            }
        }



        $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_URL => $this->url,
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_POST => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
                'Authorization: Bearer ' . $this->token,
                'Content-Type: application/json'
            ]
        ]);
        $result = curl_exec($ch);
        $res = $result;
        curl_close($ch);
        dump($res);
        dd();
    }
}
