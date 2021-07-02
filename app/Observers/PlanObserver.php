<?php

namespace App\Observers;

use Illuminate\Support\Str;
use App\Models\Plan;

class PlanObserver
{
    /**
     * Handle the Observer "creating" event.
     *
     * @param  \App\Models\Models\Observer  $observer
     * @return void
     */
    public function creating(Plan $plan)
    {
        $plan->url = Str::slug($plan->name);
    }

    /**
     * Handle the Observer "updateding" event.
     *
     * @param  \App\Models\Models\Observer  $observer
     * @return void
     */
    public function updating(Plan $plan)
    {
        $plan->url = Str::slug($plan->name);
    }

}
