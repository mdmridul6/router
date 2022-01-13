<?php

namespace App\Console\Commands;

use App\Models\PPPoE;
use Carbon\Carbon;
use Illuminate\Console\Command;

class DeactivePPPoE extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pppoe:deactive';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deactive PPPoe Users';

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
     * @return int
     */
    public function handle()
    {
        PPPoE::where('package_expire_date', '<', Carbon::now())
            ->update([
                'status' => false,
                'package_expire_date' => Carbon::now()
            ]);
    }
}
