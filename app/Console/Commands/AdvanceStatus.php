<?php

namespace App\Console\Commands;

use App\Enums\AdvanceAccountStatus;
use App\Models\AdvanceAccount;
use Illuminate\Console\Command;

class AdvanceStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'advance:status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Change Advances status';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $advances = AdvanceAccount::where('status', AdvanceAccountStatus::ON_ACCEPT)->get();
        foreach ($advances as $advance) {
            $advance->status = AdvanceAccountStatus::ACCEPTED;
            $advance->save();
        }
    }
}
