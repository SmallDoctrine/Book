<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class updateLogCount implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $userid ;
    /**
     * Create a new job instance.
     */
    public function __construct($userid)
    {
        $this->userid = $userid ;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
       $user = User::find($this->userid) ;
       $user->LogQty += 1 ;
       $user->save();

    }
}
