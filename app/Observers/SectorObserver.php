<?php

namespace App\Observers;

use Illuminate\Support\Str;
use App\Models\Support\Sector;

class SectorObserver
{
    /**
     * Handle the sector "creating" event.
     *
     * @param  \App\Models\Sector  $sector
     * @return void
     */
    public function creating(Sector $sector)
    {
        $sector->id = Str::uuid();
    }

}
