<?php

namespace App\Jobs;

use App\Models\Url;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CleanUrls implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(
        private int $days = 7,
        private bool $withUsers = false,
    ) {
    }

    public function handle()
    {
        Url::query()
            ->when(!$this->withUsers, fn ($query) => $query->where('user_id', null))
            ->where('created_at', '<=', now()->subDays($this->days))->delete();
    }
}
