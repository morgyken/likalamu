<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use Response;

class AdminQuestionController extends Controller
{
    //view my questions

    public function getAllQuestions(){

      $data =  DB::table('questions')->orderBy('deadline', 'asc')->paginate(20);

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

        //return the number of tutors that have bid the question
        //this should be dynamic

        $comments = $this->getComments($questionid);

        //return the view for question detail

        //available bids ;

        $questionbids = $this->showBids($questionid);


        return view('admina.question-det',
        [
          'data' =>$data, 'files'=> $file,
          'comments' => $comments, 'bids'=> $questionbids
        ]
      );
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

      if(self::folder_exist($path_comm))
      {
        $manuals = [];

        $filesInFolder = \File::files($path_comm);



        foreach($filesInFolder as $path)
        {
            $manuals [] = pathinfo($path);
        }

        return $manuals;

      }

      else{

        return NULL;

      }

  }

  public static function folder_exist($folder)
    {
        // Get canonicalized absolute pathname
        $path = realpath($folder);

        // If it exist, check if it's a directory
        return ($path !== false AND is_dir($path)) ? $path : false;
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

      return $data;
  }

  public function GetCommentsFiles($questionid, $commentid,  $type, $filename){

          $dest = public_path().'/storage/uploads/'.$questionid.'/'.$type.'/'.$commentid.'/'.$filename;

        return Response::download($dest);
    }

    public function showBids ($questionid){

      //select from bids join tutors

      $bids = DB::table('bid_tables')
              ->join('users', 'users.id', '=', 'bid_tables.tutorid')
              ->select('users.name', 'bid_tables.*')
              ->where('bid_tables.questionid', '=', $questionid)
              ->get();
      //dd($bids);

            return $bids;

    }

}
