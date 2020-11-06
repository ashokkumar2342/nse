<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\UserActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Symfony\Component\Process\Process;

class MobileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function mobile()
    {
        return view('admin.mobile');
    }

      public function mobilestore(Request $request)
    {
         return $request;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function car()
    {
       return view('admin.car');
    }

      public function carstore(request $request)
    {
       return $request;

     }




    public function laptop()
    {
        return view('admin.laptop');
    }

     public function user()
    {
        return view('admin.user');
    }

     public function userstore(request $request)
    {
        for ($i=0; $i <10 ; $i++) { 
            sleep(1);
             $request->session()->put('progress', 'hello');
             return 'd';
        }
        
    }
    public function ayushstore(Request $request)
    { 
        Artisan::queue('process:start');
        // shell_exec('php artisan process:start');
        // Artisan::call('process:start');
        return 'done';
        // getting values from form (like $record_num)
            // Session::put('progress', 0);
            // Session::save(); // Remember to call save()
            // $record_num =10;
            // for ($i = 1; $i < $record_num; $i++) {
            //     $process = new Process('php ' . base_path('artisan') . " task {$i}");
            //          $process->setTimeout(0);
            //          $process->disableOutput();
            //          $process->start();
            //          $processes[] = $process;
            //     Session::put('progress', $i);
            //     Session::save(); // Remember to call save()
            //     sleep(1); //IMPORTANT!
                
            // }

            // $response = Response::make();
            // $response->header('Content-Type', 'application/json');
            // return $response;
       // if (strlen(session_id()) === 0) {
       //     session_start();
       //     unset($_SESSION['progress']);
       // }
       //  $this->test($request);
    }
    public function test($request){  

        for ($i=0; $i <10 ; $i++) {  
          
             
             sleep(1); //IMPORTANT!
        }
        return 'done';
    }
    public function progressbar(request $request)
    {  
        return Response::json(array(Session::get('progress')));
       // if (strlen(session_id()) === 0) {
       //     session_start();
       // }



       // if (isset($_SESSION['progress'])) {
       //     echo $_SESSION['progress'];
       //     if ($_SESSION['progress'] == 100) {
       //         unset($_SESSION['progress']);
       //     }
       // } else {
       //     echo '0';
       // }
    }


    public function telibijen()
    {
        return view('admin.telibijen');
    }


    public function ayush()
    {
        return view('admin.ayush');
    }


    
     

    public function telibijenstore(request $request)
    {
        return $request;
    }

    public function laptopstore(request $request)
    {
        return $request;    
     }
      public function bike()
    {
        return view('admin.bike');
    }

      public function bikestore(request $request)
    {
        return $request;
    }

        public function redio()
    {
        return view('admin.redio');
    }
     

        public function rediostore(request $request)
    {
        return $request;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\UserActivity  $userActivity
     * @return \Illuminate\Http\Response
     */
    public function show(UserActivity $userActivity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\UserActivity  $userActivity
     * @return \Illuminate\Http\Response
     */
    public function edit(UserActivity $userActivity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\UserActivity  $userActivity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserActivity $userActivity)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\UserActivity  $userActivity
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserActivity $userActivity)
    {
        //
    }
}
