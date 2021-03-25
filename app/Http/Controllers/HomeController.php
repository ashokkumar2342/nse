<?php

namespace App\Http\Controllers;

use App\Events\SmsEvent;
use App\Http\Controllers\Controller;
use App\Mail\SendMail; 
use App\Nifty;
use App\TradeFailed;
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
            $json =json_encode($json);

            $this->orders($json);
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

}
