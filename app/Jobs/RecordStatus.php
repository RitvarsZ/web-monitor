<?php

namespace App\Jobs;

use App\Models\Website;
use App\Services\StatusService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class RecordStatus implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * The website to record the status for.
     *
     * @var \App\Models\Website
     */
    protected $website;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Website $website)
    {
        $this->website = $website;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(StatusService $statusService)
    {
        $prevStatus = $this->website->latestStatus;
        $response = $statusService->recordStatus($this->website->url);

        // If the status has changed, create a new record.
        if ($prevStatus && $prevStatus->status === $response['status']) {
            return;
        }

        $this->website->statuses()->create($response);
    }
}
