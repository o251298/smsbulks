<?php

namespace App\Console\Commands;
use Illuminate\Console\Command;
use App\Services\SmppReceiver;
class StartSmppReceiver extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'smpp:receiver';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Start SMPP Receiver';

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
     * @return mixed
     */
    public function handle()
    {
        $receiver = new SmppReceiver();
        while (true){
            $receiver->keepAlive();
            sleep(3);
            //$transmitter->sendSms("kod activate: $now", 'Shop Zakaz', '380962540183');
            dump('enq_link');
            $receiver->readSms();
            sleep(57);
        }
    }
}
