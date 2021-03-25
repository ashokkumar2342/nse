<?php

namespace App\Console\Commands;

use App\Message;
use App\Nifty;
use App\TradeFailed;
use Berkayk\OneSignal\sendNotificationToAll;
use Carbon\Carbon;
use Illuminate\Console\Command;
use OneSignal;

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
        // $date = '2020-11-27';
        // $lastvalue =Nifty::whereDate('created_at',$date)->orderBy('id','desc')->first();
        // $firstvalue =Nifty::whereDate('created_at',$date)->orderBy('id','asc')->first();
        // $niftys =Nifty::whereDate('created_at',$date)->get();
        // $min = $niftys->min('price');
        // $max = $niftys->max('price');
        // dd($max-$min);
        $datename=date('D', strtotime(date('d-m-Y')));  
        foreach (range(1, 2260) as $key => $value) {
            if (date('H:i')>= "09:15"  && "03:30"<=date('H:i') && $datename != 'Sun' && $datename != 'Sat' ) {
                $ipinfoAPI="https://www.google.com/async/finance_wholepage_price_updates?ei=SLyRX8W3IK3ez7sPluaP0AQ&rlz=1C1CHZL_enIN828IN829&yv=3&async=mids:%2Fm%2F04t5sp,currencies:,_fmt:jspb";

                  $data =  file_get_contents($ipinfoAPI);
                  $data=substr($data, 5);
                  $data =json_decode($data);
                  $value =$data->PriceUpdate[0][0][0][17][5];
                  $symble =substr($value,0,1);  
                  if ($symble=='+') {
                      $value = (double)substr($value,1); 
                  }else{
                      $value =(double)substr($value, 3);
                      $value =$value -($value*2); 
                  }  
                 $nifty =new Nifty();
                 $nifty->price =$data->PriceUpdate[0][0][0][17][4];                 
                 $nifty->value =$value;
                 $nifty->percentage =$data->PriceUpdate[0][0][0][17][6]; 
                 $nifty->save();    
                 $this->message($value,$symble);  

                 sleep(10);   
                 $this->tradeFailedTry();
            }else{
                  break;
            } 
        }
      
    }

    public function message($value,$symble){
        if ($value >= 80 || -80 >= $value) {   
           $message = Message::first();
           $today = date('d-m-Y');
           $updated_date = date('d-m-Y',strtotime($message->updated_at)); 
           if ($symble=='+') {
               $addvalue =$message->value + 20;  
               if ($today==$updated_date) { 
                    if ($addvalue > $value && $message->count < 11 ) {
                       $message->value=$value; 
                       $message->count=$message->count+1;
                       $message->save(); 
                       OneSignal::sendNotificationToAll(
                              (string)$value, 
                              $url = null, 
                              $data = null, 
                              $buttons = null, 
                              $schedule = null
                          );  
                    }else{

                    }  
                     
               }else{
                 $message->value=0; 
                 $message->count=0; 
                 $message->save(); 
               }
           }else{
               $addvalue =$message->value - 20; 
               if ($today==$updated_date) { 
                    if ($addvalue < $value && $message->count < 11 ) {
                       $message->value=$value; 
                       $message->count=$message->count+1;
                       $message->save(); 
                       OneSignal::sendNotificationToAll(
                              (string)$value, 
                              $url = null, 
                              $data = null, 
                              $buttons = null, 
                              $schedule = null
                          );  
                    }else{

                    }  
                     
               }else{
                 $message->value=0; 
                 $message->count=0; 
                 $message->save(); 
               }
           }  
          
           
        }
        
    }
  public function tradeFailedTry()
    {
      $TradeFaileds = TradeFailed::where('status',1)->get();
      foreach ($TradeFaileds as $TradeFaileds) {
        $this->orders($TradeFaileds->json);
      }
  } 

  public function orders($json)
  {    
      try {
          
          $config =DB::table('config')->first();
          $client = new Client();
          $res = $client->request(
              'POST', $this->api_url.'/orders', [ 
              'headers' => [
                  'Content-Type' => 'application/json',
                  'Authorization' => $this->token,
              ],
               'body' => $json
                   
          ]);
          $data= $res->getBody()->getContents();  
          $datas = (array) json_decode($data); 
          if ($datas['code']==1101) {
              return $this->tradeFailedDelete($json)
              
          }
      } catch (\GuzzleHttp\Exception\RequestException $e) { 
          $this->tradeFailed($json);
          
      }
            
  } 

  public function tradeFailed($json)
  {    
      try {
          $TradeFailed = new TradeFailed(); 
          $TradeFailed->json = $json;
          $TradeFailed->status = 1;
          $TradeFailed->save();
          return $TradeFailed;
      } catch (Exception $e) {
          
      }
            
  }

  public function tradeFailedDelete($json)
  {    
      try {
          $TradeFailed = TradeFailed::first();  
          $TradeFailed->delete();
          return $TradeFailed;
      } catch (Exception $e) {
          
      }
            
  }
}
