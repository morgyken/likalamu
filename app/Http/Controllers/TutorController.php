<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class TutorController extends Controller
{
    //

    //home controller
    public function TutorAllQuestions(){

        $data =  DB::table('questions')->paginate(10);

        return view('tutor.all-questions', ['data' =>$data]);

    }

    public function TutorQuestionDetails($questionid)
    {

      $adminController = new AdminQuestionController;

      $dest = public_path().'/storage/uploads/'.$questionid.'/question/';

      $file = $adminController->fileDownloads($dest);

      $data =  DB::table('questions')

              ->where('questionid', $questionid)

              ->get()

              ->toArray();

      $data = $data[0];

      //read comments
      $comments = $adminController->getComments($questionid);
      //return the view for question detail

      return view('tutor.question-det', ['data' =>$data, 'files'=> $file, 'comments' => $comments] );

    }

    public function TutorDetails(){

      return view ('tutor.tutor-det');
    }
}
