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

       $number_of_words1 = rand (450,520);

       $summary =  strip_tags(substr($request->body,0, $number_of_words)). '...';

       $summary1 =  strip_tags(substr($request->body,0, $number_of_words1)). '...';


       $file = $request->file;

       //destination

      $dest = public_path().'/storage/uploads/'.$question_id.'/question/';

       //upload files
       $this->uploadFiles($file, $dest);

       //insert into database here

       DB::table('questions')->insert(
           [
               'body' =>  htmlspecialchars($request['body']),
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


       public function PostComments(Request $request){
         // random number
          $commentid = rand (99999,999999);
         //upload files

         //files
         $file = $request->file;

         //question id
         $questionid = $request->questionid;
         //path

         if($request->mark == null)
         {
            $dest = public_path().'/storage/uploads/'.$questionid.'/comments/'.$commentid.'/';
            $mark ='comment';
         }

         else {
            $dest = public_path().'/storage/uploads/'.$questionid.'/answer/'.$commentid.'/';
            $mark ='ans';
         }


        // dd($request->all());

        //upload files
        $this->uploadFiles($file, $dest);

        //save data to database

        DB::table('comments_models')->insert(
             [
                 'answer' =>  htmlspecialchars($request['answer']),

                 'userid'   => Auth::user()->id,

                 'commentid'   => $commentid,

                 'questionid'   =>$request->questionid,

                 'mark'     => $request->mark,
                //dates are here
                 'created_at' =>\Carbon\Carbon::now()->toDateTimeString(),

                 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()

             ]);

                  //return back tp the previous url
         return redirect() ->back();

       }

       public function uploadFiles($file, $dest){

         if(is_array($file)){

                foreach ($file as $files){
                 /*
                  * loop through multiple files
                  */
                 $name =  $files->getClientOriginalName();
                 $files->move($dest, $name);
             }

         }

       }



}
