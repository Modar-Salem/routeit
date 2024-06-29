<?php

namespace App\Console\Commands;

use App\Models\PreviousWeekRoadmapUsersRanking;
use App\Models\RoadmapUsersRanking;
use Illuminate\Console\Command;

class RefreshRoadmapRankingsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:refresh-roadmap-rankings-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $data = RoadmapUsersRanking::get();
        PreviousWeekRoadmapUsersRanking::insert(collect($data)->toArray());
        $data->each->delete();
    }
}
