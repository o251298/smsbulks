<?php

namespace App\Console\Commands;

use App\Models\Message;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class GetStatusForAPI extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'api:getstatus';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        while (true){
            $now = Carbon::now();

        $messages = Message::all();
        $messages = $messages->where('status', 0);

        if (count($messages) > 0){
            foreach ($messages as $item){
                $diff = $now->diff($item->created_at);
                if (($diff->d == 1) || ($diff->d > 1)){
                    // прострочено
                    $item->status = 2;
                    $item->change_time = Carbon::now();
                    $item->save();
                } else{
                    // дальше
                    $token = 'HLxFRtg5YnUyrwuGUUWEd2H3un6CbCVJ';
                    $url = 'http://api.acemountmedia.com/sms/status';
                    $data_array = [
                        'id_sms' => [$item->provider_id]
                    ];
                    $data = json_encode($data_array);
                    $ch = curl_init();
                    curl_setopt_array($ch, [
                        CURLOPT_URL => $url,
                        CURLOPT_POSTFIELDS => $data,
                        CURLOPT_POST => true,
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_HTTPHEADER => [
                            'Authorization: Bearer ' . $token,
                            'Content-Type: application/json'
                        ]
                    ]);
                    $result = curl_exec($ch);
                    $res = $result;
                    curl_close($ch);
                    $res = json_decode($res, true);
                    dump($res);
                    if (isset($res['successful_request'])){
                        $info = $res['successful_request'][$item->provider_id];
                        $state = $info;
                        if ($state !== "0"){
                            $item->status = $state;
                            $item->change_time = Carbon::now();
                            $item->save();
                        }
                    }
                }
            }
        }
            sleep(5);
    }
    }
}
