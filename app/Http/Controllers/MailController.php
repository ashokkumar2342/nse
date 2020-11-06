<?php

namespace App\Http\Controllers;

use App\Ved;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function index()
    {
    	return view('mail.home');
    }

    public function sendEmail(Request $request)
    {
    	$data=array();
    	$data['data']=$request->message;
    	Mail::send('mail.send_email', $data, function ($message) use ($request) {
    		$sub=$request->subject;
    		$email=$request->email;
         $message->from('dilipkumarchauhan2342@gmail.com','dilip');
         $message->subject('subject');
         $message->to('email');
    	});
    }

    public function calculator()
    {
         return view('calculetor');
    }
    public function video()
    {  $Video =Ved::get();

         return view('video.index',compact('Video'));
    }
     public function videoStore(Request $request)
    {  
       
        $file = $request->file('file');
        $file->store('public');
        $document = new Ved();
        $document->name = $file->hashName();        
                 
        $document->save();      
        return redirect()->route('video') ;
     }
}
