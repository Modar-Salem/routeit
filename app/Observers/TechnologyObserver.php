<?php

namespace App\Observers;

use App\Models\Technology;
use App\Models\TechnologyLevel;

class TechnologyObserver
{
    /**
     * Handle the Technology "created" event.
     */
    public function created(Technology $technology): void
    {
        TechnologyLevel::create([
            'level' => 'junior',
            'technology_id' => $technology->id
        ]) ;
        TechnologyLevel::create([
            'level' => 'mid-level',
            'technology_id' => $technology->id
        ]) ;
        TechnologyLevel::create([
            'level' => 'senior',
            'technology_id' => $technology->id
        ]) ;
    }

    /**
     * Handle the Technology "updated" event.
     */
    public function updated(Technology $technology): void
    {
        //
    }

    /**
     * Handle the Technology "deleted" event.
     */
    public function deleted(Technology $technology): void
    {
        //
    }

    /**
     * Handle the Technology "restored" event.
     */
    public function restored(Technology $technology): void
    {
        //
    }

    /**
     * Handle the Technology "force deleted" event.
     */
    public function forceDeleted(Technology $technology): void
    {
        //
    }
}
