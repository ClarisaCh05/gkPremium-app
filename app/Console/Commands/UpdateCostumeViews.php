<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Illuminate\Console\Scheduling\Schedule;

class UpdateCostumeViews extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'views:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update costume views from Redis to database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $keys = Redis::keys('costume:*:views');

        foreach ($keys as $key) {
            $costumeId = explode(':', $key)[1];
            $views = Redis::get($key);
            // $this->info("Costume ID: $costumeId, Views: $views"); 
            // Log each costume ID and its views

            DB::table('costume')
                ->where('id_costume', $costumeId)
                ->update(['views' => $views]);
        }

        $this->info('Costume views updated successfully.');
    }
}
