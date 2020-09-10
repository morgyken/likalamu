<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use Response;

use Auth;

use Carbon\Carbon;

class AdminQuestionController extends Controller
{
    //view my questions

    public function getAllQuestions(){

      $data =  DB::table('questions')

                  ->join('matrices', 'matrices.qid', '=', 'questions.questionid')

                  //  ->where('matrices.archived','=', 0)

                  ->where('matrices.archived','=', NULL)

                  ->where('matrices.assigned','=', 'No')

                  ->orderBy('deadline', 'asc')

                  ->paginate(20);

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

    //calculate payments

    public static function calculatePayments ()
    {

      $fromDate = Carbon::now()->subDays(100)->format('Y-m-d');
      $tillDate = Carbon::now()->subDay()->format('Y-m-d');

      //select all orders completed between the above dates

      $completedOrders = DB::table('questions')

      ->join('matrices', 'matrices.qid', '=', 'questions.questionid')

      ->join('assignment_tables', 'matrices.qid', '=', 'assignment_tables.questionid')

      ->join('users', 'users.id', '=', 'assignment_tables.tutorid')

      ->select(DB::raw('assignment_tables.tutorid, users.name, users.email, users.phone, sum(questions.tutorprice) as tutorpay'))

    //  ->where('questions.deadline', '', $fromDate)

      ->whereBetween('questions.deadline', array($fromDate, $tillDate))

      ->groupBy('assignment_tables.tutorid', 'users.name', 'users.email', 'users.phone')

      ->get()

      ->toArray();

    //  dd($completedOrders);

        foreach($completedOrders as $orders)
            {
            //  dd($orders->tutorid);

              DB::table('tutor_payments')->insert([
                'tutorid' => $orders->tutorid,
                'name'=> $orders->name,
                'phone' =>$orders->phone,
                'email' => $orders->email,
                'tutorpay' => $orders->tutorpay,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString()

                  ]
                );
            }


      }

      public function finishedOrders()
      {
        $fromDate = Carbon::now()->subDays(80)->format('Y-m-d'); // use 20

        $tillDate = Carbon::now()->subDay(5)->format('Y-m-d'); /// use 5


        //select all orders completed between the above dates
        // pay for orders finished by 3 days ago

        $completedOrders = DB::table('questions')

          ->join('matrices', 'matrices.qid', '=', 'questions.questionid')

          ->select(DB::raw('questions.questionid'))

          ->whereDate('questions.deadline','>=', $fromDate)

          //->where('questions.deadline','<', $tillDate)

          ->whereDate('questions.deadline','<=', $tillDate)

          //->whereBetween('questions.deadline', [$fromDate, $tillDate])

          ->where('matrices.completed', '=', 1)

          ->get();

        return $completedOrders;
      }

      //tutor last payments
      public function tutorLastPayments()
      {


              $fromDate = Carbon::now()->subDays(80)->format('Y-m-d'); // use 20

              $tillDate = Carbon::now()->subDay(5)->format('Y-m-d'); /// use 5

              $paidOrders = DB::table('questions')

                  ->join('matrices', 'matrices.qid', '=', 'questions.questionid')

                  ->join('assignment_tables', 'matrices.qid', '=', 'assignment_tables.questionid')

                  ->select(DB::raw('*'))

                  ->whereDate('questions.deadline','>=', $fromDate)

                  //->where('questions.deadline','<', $tillDate)

                  ->whereDate('questions.deadline','<=', $tillDate)

                  //->whereBetween('questions.deadline', [$fromDate, $tillDate])

                  ->where('matrices.paid', '=', 1) //answered, paid and completed are all 1

                  ->where('assignment_tables.tutorid', '=', Auth::user()->id)

                  ->paginate(10);


                return $paidOrders;
      }




}
