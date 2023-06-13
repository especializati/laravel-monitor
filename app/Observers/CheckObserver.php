<?php

namespace App\Observers;

use App\Models\Check;
use App\Notifications\EndpointDown;

class CheckObserver
{
    /**
     * Handle the Check "created" event.
     */
    public function created(Check $check): void
    {
        if (!$check->isSuccess()) {
            $user = $check->endpoint->site->user;
            $user->notify(new EndpointDown($check));
        }
    }
}
