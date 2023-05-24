<?php

namespace App\Jobs;

use App\Models\Endpoint;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class EndpointCheckJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public Endpoint $endpoint,
    ) {}

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $url = $this->endpoint->url();
        $response = Http::get($url);

        $this->endpoint->checks()->create([
            'status_code' => $response->status(),
            'response_body' => $response->successful() ? null : $response->body(),
        ]);

        $this->endpoint->update([
            'next_check' => now()->addMinutes($this->endpoint->frequency),
        ]);
    }
}
