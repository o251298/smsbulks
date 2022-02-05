<?php

namespace App\Jobs;

use App\Models\Number;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class GroupSave implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $numbers_uniq;
    public $groupid;

    public function __construct($numbers_uniq, $groupid)
    {
        $this->numbers_uniq = $numbers_uniq;
        $this->groupid = $groupid;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach ($this->numbers_uniq as $item){
            $message = Number::create([
                'group_id' => $this->groupid,
                'number' => $item,
            ]);
        }
    }
}
