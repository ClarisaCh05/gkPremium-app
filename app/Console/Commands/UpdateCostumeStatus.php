<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\rented;
use App\Models\costume;
use Illuminate\Console\Command;

class UpdateCostumeStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'costume:update-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update costume status if the rental period has ended';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Get current date
        $now = Carbon::now()->toDateString();

        // Find rentals where the rental period has ended
        $rentals = rented::where('ended_at', '<', $now)
                            ->whereHas('costume', function($query) {
                                $query->where('status', 2);
                            })
                            ->get();

        foreach ($rentals as $rental) {
            $costume = costume::find($rental->id_costume);
            if ($costume && $costume->status == 2) {
                $costume->update(['status' => 0]);
                $this->info("Updated status for costume ID: {$costume->id_costume}");
            }
        }

        $this->info('Costume statuses updated successfully.');
    }
}
