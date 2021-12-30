<?php

namespace App\Console\Commands;

use App\Services\SmppTransmitter;
use Illuminate\Console\Command;

class StartSmppTransmitter extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'smpp:transmitter';

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

        $transmitter = new SmppTransmitter();
        while (true){
            $now = rand(0, 1000);
            $transmitter->keepAlive();
            sleep(3);
            $transmitter->sendSms("kod activate: $now", 'Shop Zakaz', '380962540183');
            dump('Send');
            //$test = $transmitter->readSms();

            sleep(57);
        }
    }
}
