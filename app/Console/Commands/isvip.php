<?php

namespace App\Console\Commands;

use App\Models\colormodel;
use App\Models\events;
use Carbon\Carbon;
use Illuminate\Console\Command;

use function Ramsey\Uuid\v1;

class isvip extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'vip:control';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Controlling VIP events';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        events::where('vip', 1)->whereDate('in_to', '<=', now())->update([
            'vip' => 0, 'in_to' => null
        ]);
    }
}
