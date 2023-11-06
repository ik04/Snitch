<?php

namespace App\Jobs;

use App\Http\Controllers\ViceCounterController;
use Illuminate\Bus\Queueable;
use App\Models\Vice;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Services\NeedCounterService;


class RenewVicesCounters implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected ViceCounterController $service;
    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $vices = Vice::select("id")->get();
        foreach ($vices as $vice) {
            $this->service->initCounter($vice->id);            
        }
    }
}
