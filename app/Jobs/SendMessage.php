<?php

namespace App\Jobs;

use App\Services\SingleMessage\SendSingle;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class SendMessage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $numbers;
    public $sms;

    public function __construct($numbers, $sms)
    {
        $this->numbers = $numbers->get();
        $this->sms = $sms;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Log::channel('fakeApiSend')->info("Start Bulk message");
        $not_success = 0;
        foreach ($this->numbers as $item){
            Log::channel('fakeApiSend')->info($item);
            $status = $this->sms->sendMessage($item->number);
            Log::channel('fakeApiSend')->info($status);
            if (array_key_exists('error_request', $status)){
                $not_success++;
            }
        }
        Log::channel('fakeApiSend')->info('End Bulk message' . $not_success);
    }
}
