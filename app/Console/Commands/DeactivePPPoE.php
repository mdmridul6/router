<?php

namespace App\Console\Commands;

use App\Helper\Connector;
use App\Models\PPPoE;
use App\Models\Seller;
use App\Models\User;
use App\Notifications\AdminNotify;
use App\Notifications\SellerNotify;
use Carbon\Carbon;
use Illuminate\Console\Command;
use RouterOS\Query;
use Illuminate\Support\Facades\Log;


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
        
        $pppoes = PPPoE::whereDate('package_expire_date', '<', Carbon::today()->toDateString())->where('status', 1)->get();
        foreach ($pppoes as $pppoe) {
            $pppoe = PPPoE::find($pppoe->id);
            Log::alert("PPPoE Deactive",$pppoe->username);
            $pppoe->status = false;
            $pppoe->package_active_date = null;
            $pppoe->package_expire_date = null;
            $pppoe->save();
            if (isset($pppoe->seller_id)) {
                $seller = Seller::where('id', $pppoe->seller_id)->first();
                $user = User::find($seller->user_id);
                $user->notify(new SellerNotify($pppoe));
            } else {
                $user = User::where('role', 'Admin')->first();

                $user->notify(new AdminNotify($pppoe));
            }


            $client = Connector::Connector();
            $query = new Query('/ppp/secret/print');
            $query->where('name', $pppoe->username);
            $secrets = $client->query($query)->read();

            $query = (new Query('/ppp/secret/set'))
                ->equal('.id', $secrets[0]['.id'])
                ->equal('profile', 'Block');

            // Update query ordinary have no return
            $client->query($query)->read();
        }
    }
}
