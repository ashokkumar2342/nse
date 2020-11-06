<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Helper\MyFuncs;
use App\Model\Activity;
use App\Model\Phonebook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Storage;

class AyushController extends Controller
{
    public function ayush(Request $request)
    {
      return view('demo');
      $startMemory = memory_get_usage();
      $datas = Activity::find(10000000000000000);
      if (empty($datas)) {
        return response($data = 'error', $status = 404);
      }else{
       
      
      return response($data = 'error', $status = 404);
      }
         
        
       
    } 
    public function dataStore(Request $request)
    {  
      
      if($request->has('file')){
      $path = $request->file('file')->getRealPath();
      $data = \Excel::load($path)->get();
      }else{
        return 'dd';
      }
    } 
    public function saveapi()
    {
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, "http://localhost:8000/api/get-date");
      // SSL important
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
      $output = curl_exec($ch);
      curl_close($ch);

      $datas=json_decode($output);
      foreach ($datas as $data) {
        $phonebook =new Phonebook();
        $phonebook->name =$data->name;
        $phonebook->mobile =$data->mobile;
        $phonebook->save();
      }
     
        $phonebooks =Phonebook::get();
      return view('ayush',compact('phonebooks'));
    } 

     public function add(Request $request)
     {
         $phonebook =new Phonebook();
         $phonebook->name = $request->name;
         $phonebook->mobile=$request->mobile;
         $phonebook->address=$request->address;
         $phonebook->student=$request->student;
         $phonebook->email=$request->email;
         $phonebook->pinkod=$request->pinkod;
         $phonebook->roll=$request->roll;
         $phonebook->city=$request->city;
         $phonebook->country=$request->country;
         $phonebook->save();

         return back();

         
     } 

     public function car()
     {
      return 'car';
     }



      public function baik()
     {
      return view('baik');
     }





    public function aaradhya()
    { 


      // return ''
        // $phonebooks =Phonebook::get();
        // return view ('aaradhya',compact('phonebooks'));
    }  

     public function navya()
     { 
      $phonebooks =Phonebook::all(); 
        return view('new_navya',compact('phonebooks'));

     }



    public function  store(Request $request){
           
           $phonebook =new phonebook();
           $phonebook->name=$request->name;
           $phonebook->mobile=$request->mobile;
           $phonebook->address=$request->address;
           $phonebook->student=$request->student;
           $phonebook->roll=$request->roll;
           $phonebook->email=$request->email;
           $phonebook->city=$request->city;
           $phonebook->cantry=$request->cantry;

           $phonebook->save();


           return back(); 
    }

    public function nidhi()
    { 
     $phonebooks =Phonebook::all(); 
       return view('nidhi',compact('phonebooks'));

    }
    public function chhotya()
    {  
     $phonebooks =Phonebook::all(); 
       return view('chhotya',compact('phonebooks'));

    }

     public function mango()
    {  
     $phonebooks =Phonebook::all(); 
       return view('mango',compact('phonebooks'));

    }

    public function mangostore(Request $request)
    {
       
       $phonebook =new phonebook();
       $phonebook->name =$request->name;
       $phonebook->mobile =$request->mobile;
       $phonebook->address =$request->address;
       $phonebook->pinkod =$request->pinkod;  
       $phonebook->email =$request->email;  
       $phonebook->city =$request->city;  
       $phonebook->country =$request->cuntry;  
       $phonebook->student =$request->student;  

       $phonebook->save();

           return back(); 
       
    }
    public function nidhistore(Request $request)
    {
       
       $phonebook =new phonebook();
       $phonebook->name =$request->name;
       $phonebook->mobile =$request->mobile;
       

       $phonebook->save();

           return back(); 
       
    }
    public function destroy($value='')
    {
         $phonebook =Phonebook::where('name','aaaaaa')->first();
         $phonebook->delete();
    }











 


}
 