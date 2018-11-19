<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Massage;

class MassagesController extends Controller
{
    public function submit(Request $request){
        $this->validate($request,[
    'name' => 'required',
    'email' => 'required'
        ]);
        

         //Create new Massage
        $massage = new Massage;
        $massage->name = $request->input('name');
        $massage->email = $request->input('email');
        $massage->massage = $request->input('massage');
        
        //Save 
        $massage->save();

        //Redirect
        return redirect('/')->with('succsess', 'Massage Sent');

       }

       public function getMassages(){
           $massages = Massage::all();
           return view ('massages')->with('massages', $massages);
       }
}


