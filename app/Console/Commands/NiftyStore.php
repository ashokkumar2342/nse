<?php

namespace App\Console\Commands;

use App\Nifty;
use Carbon\Carbon;
use Illuminate\Console\Command;

class NiftyStore extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'nifty:store';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return mixed
     */
    public function handle()
    {
      
       
        foreach (range(1, 2160) as $key => $value) {
            if (date('H:i')>= "09:15"  && "03:30"<=date('H:i')) {
                $ipinfoAPI="https://www.google.com/async/finance_wholepage_price_updates?ei=SLyRX8W3IK3ez7sPluaP0AQ&rlz=1C1CHZL_enIN828IN829&yv=3&async=mids:%2Fm%2F04t5sp,currencies:,_fmt:jspb";

                  $data =  file_get_contents($ipinfoAPI);
                  $data=substr($data, 5);
                  $data =json_decode($data); 
                 // dd($data->PriceUpdate[0][0][0][17]);
                
                 // \Log::info($data->PriceUpdate[0][0][0][17]);
                 $nifty =new Nifty();
                 $nifty->price =$data->PriceUpdate[0][0][0][17][4];
                 $nifty->value =$data->PriceUpdate[0][0][0][17][5];
                 $nifty->percentage =$data->PriceUpdate[0][0][0][17][6];
                 $nifty->save();
                 sleep(10);   
            }else{
                  break;
            }

            
        }
      
    }
}
