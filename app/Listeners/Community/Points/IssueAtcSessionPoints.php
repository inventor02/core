<?php

namespace App\Listeners\Community\Points;

use App\Events\NetworkData\AtcSessionEnded;
use Illuminate\Contracts\Queue\ShouldQueue;

class IssueAtcSessionPoints implements ShouldQueue
{
    public function handle(AtcSessionEnded $event)
    {
        $account = $event->atcSession->account;

        // Check duration, issue points appropriately.
    }
}
