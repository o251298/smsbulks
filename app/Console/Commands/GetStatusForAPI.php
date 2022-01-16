<?php

namespace App\Console\Commands;

use App\Models\Message;
use App\Services\API\APITransceiver;
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

    public function dataConnect(){
        $data = [
            'url' => 'http://api.acemountmedia.com/sms/status',
            'token' => 'EevnBT8XkJe2spKz9QTb1suUlrjcDytT'
        ];
        return $data;
    }

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
                    } else {
                        $data_array = [
                            'id_sms' => [$item->provider_id]
                        ];
                        $transceiver = new APITransceiver($data_array, $this->dataConnect());
                        $res = $transceiver->checkResponse();
                        if (array_key_exists('successful_request', $res)){
                            $info = $res['successful_request'][$item->provider_id];
                            dump($info);
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
