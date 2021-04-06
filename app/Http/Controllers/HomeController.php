<?php

namespace App\Http\Controllers;

use App\Events\SmsEvent;
use App\Http\Controllers\Controller;
use App\Mail\SendMail; 
use App\Nifty;
use App\TradeFailed;
use App\TradeBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;

 
class HomeController extends Controller
{
    
    protected $api_url;
    protected $token;

    public function __construct()
    {        
        $this->api_url = 'https://api.fyers.in/api/v1'; 
        $this->token = DB::table('config')->first()->token; 
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $config =DB::table('config')->first();
        $client = new Client();
        $res = $client->request('get', $this->api_url.'/get_profile', [ 
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => $config->token,
            ],
        ]);
        return $data= $res->getBody()->getContents(); 
        $datas = (array) json_decode($data);
        $priorities = $datas['data']; 

        dd($priorities);
          $niftys =Nifty::take(100)->get();

        return view('front.home',compact('niftys'));
        
    }
    public function getProfile()
    {  
        $config =DB::table('config')->first();
        $client = new Client();
        $res = $client->request('get', $this->api_url.'/get_profile', [ 
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => $config->token,
            ],
        ]);
        return $data= $res->getBody()->getContents(); 
        $datas = (array) json_decode($data);
        $priorities = $datas['data']; 

        dd($priorities);
          $niftys =Nifty::take(100)->get();

        return view('front.home',compact('niftys'));
        
    }

    public function placeOrder(Request $request)
    {   
        try {
            $json =(array)$request->all();
            if ($json['password']=='Ashok@2342') {
                $json =json_encode($json); 
                $this->orders($json); 
            }
           
        } catch (Exception $e) {

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
               return $datas;
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
    public function paperTrade(Request $request)
    {    
        try { 
            
            $json =(array)$request->all(); 
            if ($json['password']=='Ashok@2342') {
                $Tradebook = new TradeBook(); 
                $Tradebook->qty = @$json['qty'];
                $Tradebook->side = @$json['side'];
                $Tradebook->symbol = @$json['symbol'];
                if (@$json['price'] !=null) {
                    $Tradebook->price = @$json['price'];
                }else{
                    $Tradebook->price =$this->getPrice('nifty');
                } 
                $Tradebook->time = @$json['time']; 
                $Tradebook->indicator = @$json['indicator']; 
                $Tradebook->save();
                return $Tradebook; 
            }
           
        } catch (Exception $e) {
            
        }
              
    }

    public function getPrice($symble)
    {    
        try {

            $ipinfoAPI="https://www.google.com/async/finance_wholepage_price_updates?ei=SLyRX8W3IK3ez7sPluaP0AQ&rlz=1C1CHZL_enIN828IN829&yv=3&async=mids:%2Fm%2F04t5sp,currencies:,_fmt:jspb";

              $data =  file_get_contents($ipinfoAPI);
              $data=substr($data, 5);
              $data =json_decode($data); 
             return $data->PriceUpdate[0][0][0][17][4];
           
        } catch (Exception $e) {
            
        }
              
    }
    public function paperTradeReport($symble,$indicator,$date,$time)
    {    
        try {
            
             $date = date('Y-m-d',strtotime($date));
             $symble =$symble;
             $indicator =$indicator; 
             $price_buy = TradeBook::whereDate('created_at',$date)
                          ->where('side',1)
                          ->where('symbol','Like',$symble)
                          ->where('indicator',$indicator)
                          ->where('time',$time)
                          ->get();
             $price_sell = TradeBook::
                           whereDate('created_at',$date)
                           ->where('side',-1)
                           ->where('symbol','Like',$symble)
                           ->where('indicator',$indicator)
                           ->where('time',$time)
                           ->get();
            $temp =[];               
            $buy =[];               
            $sell =[];               
            foreach ($price_buy as $key => $value) {
                  $temp[$key]= $price_sell[$key]->price - $value->price;
                  $buy[$key] =$value->price;               
                  $sell[$key] =$price_sell[$key]->price;                          
            }               
            $data = array();
            $data['price_buy'] = $price_buy->sum('price');               
            $data['price_sell'] = $price_sell->sum('price');            
            $data['count_buy'] = $price_buy->count();               
            $data['count_sell'] = $price_sell->count();               
            $data['list'] = $temp;               
            $data['buy'] = $buy;               
            $data['sell'] = $sell;
            $data['sum'] = array_sum($temp);

            $data['total'] = $price_sell->sum('price') - $price_buy->sum('price') ;
            return $data;              
              
           
        } catch (Exception $e) {
            
        }
              
    }

}
