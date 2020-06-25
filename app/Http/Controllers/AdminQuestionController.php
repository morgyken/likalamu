<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use Response;

class AdminQuestionController extends Controller
{
    //view my questions

    public function getAllQuestions(){

      $data =  DB::table('questions')->paginate(10);

      return view('admina.all-questions', ['data' =>$data]);

    }

    public function viewQuestionDetails($questionid)
    {
        $dest = public_path().'/storage/uploads/'.$questionid.'/question/';

        $file = $this->fileDownloads($dest);

        $data =  DB::table('questions')

                ->where('questionid', $questionid)

                ->get()

                ->toArray();

        $data = $data[0];

        //read comments
        $comments = $this->getComments($questionid);

        //return the view for question detail



        return view('admina.question-det', ['data' =>$data, 'files'=> $file, 'comments' => $comments] );
    }

    public function downloads($question, $fileName){

          $dest = public_path().'/storage/uploads/'.$question.'/question/'.$fileName;

         return Response::download($dest);
 }

 /*
  * comments files download
  */

  public static function CommentFiles($questionid, $commentid, $commentType){


      $path_comm = public_path().'/storage/uploads/'.$questionid.'/'.$commentType.'/'.$commentid.'/';

      $manuals = [];

      $filesInFolder = \File::files($path_comm);



      foreach($filesInFolder as $path)
      {
          $manuals [] = pathinfo($path);
      }


      return $manuals;

  }

  public function fileDownloads($dest){

    $filesInFolder = \File::files($dest);

    foreach($filesInFolder as $path)
    {
        $files [] = pathinfo($path);
    }


    return $files;
  }

  public function getComments($questionid){

    $data =  DB::table('comments_models')

            ->where('questionid', $questionid)

            ->get()

            ->toArray();

    //$data = $data[0];


    return $data;
  }

  public function GetCommentsFiles($questionid, $commentid, $filename, $type){

          $dest = public_path().'/storage/uploads/'.$questionid.'/'.$type.'/'.$commentid.'/'.$filename;

          return Response::download($dest);
    }

}
