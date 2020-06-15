<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\Auth;

use DB;

use Response;

class AskQuestionController extends Controller
{
    //

    public function postQuestion(Request $request)
   {
       $question_id = rand (99999,999999);

       $allre= $request->all();

       //dd( $request->all());

       $number_of_words = rand (180,230);

       $number_of_words1 = rand (160,630);

       $summary =  strip_tags(substr($request->body,0, $number_of_words)). '...';

       $summary1 =  strip_tags(substr($request->body,0, $number_of_words1)). '...';


       $file = $request->file;

       //upload files

       if(is_array($file)){

           $dest = public_path().'/storage/uploads/'.$question_id.'/question/';

           foreach ($file as $files){
               /*
                * loop through multiple files
                */
               $name =  $files->getClientOriginalName();
               $files->move($dest, $name);
           }

       }


       DB::table('questions')->insert(
           [
               'body' =>  htmlspecialchars($request['question_body']),
               'studentid'   => Auth::user()->id,
               'header'     => $request->header,
               'pages'     => $request->pages,
               'price'     => $request->price,
               'deadline'     => $request->deadline,
               'format'     => $request->format,
               'tutorprice'     => $request->tutorprice,
               'questionid' => $question_id,
               'summary' => $summary1,
               'created_at' =>\Carbon\Carbon::now()->toDateTimeString(),
               'updated_at' => \Carbon\Carbon::now()->toDateTimeString()

           ]);

       return redirect() ->back();
   }

}
