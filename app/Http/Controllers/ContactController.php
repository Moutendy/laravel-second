<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VideoModels;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

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


   public function video()
    {
        
          return view('video');
   }

   public function vueimage()
   {
      $videoModels= VideoModels::all();
          return view('multiimaga',compact('videoModels'));
   }
  

    public function  videopost(Request $resultat)
    {
 
      if($resultat->hasFile('video'))
      {
         $filevideo_arrey = $resultat->file('video');
         $array_len= count(  $filevideo_arrey);
          foreach($filevideo_arrey as $video)
          {
            $image_name =   $video->getClientOriginalName();
             $image_exit =   $video->getClientOriginalExtension();
                $videData[]=$image_name;
          

             echo $image_name."</br>";

              echo$image_exit."</br>";

              $video->move('storage/video',$image_name);

               
                

          }
               $videoModels= new VideoModels;
               $videoModels->video= json_encode($videData);

             $videoModels->save();  
      

         //$namevideo = $filevideo->getClientOriginalName();
   
        //$resultat->file('video')->move('storage',$namevideo);
      }
        
 
        
   }
}
