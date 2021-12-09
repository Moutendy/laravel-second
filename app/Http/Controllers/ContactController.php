<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    //
    public function contact()
    {
        if(auth()->user()->isAdmin == true)
        {
        return redirect(url('/private'));
        } 
       else 
       {
        return redirect (url('/'));
 
       }

   }
}
