<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use Auth;

use App\Http\Controllers\AdminQuestionController;

class TutorController extends Controller
{
    //

    //home controller
    public function TutorAllQuestions($status=NULL){

      //Add status: revision, paid, assigned, review, revision, finished, last payment

      // Assigned, Completed, Review, Revision,Finished, Last Payment

      if($status== NULL)
      {
        $data =  DB::table('questions')

                ->join('matrices', 'matrices.qid', '=', 'questions.questionid')

                ->where('matrices.archived','=', NULL)

                ->where('matrices.status','=','new')

                ->orderBy('deadline', 'asc')

                ->paginate(25);

        }
      else {
        // code...
        $data =  DB::table('questions')

                ->join('matrices', 'matrices.qid', '=', 'questions.questionid')

                ->where('matrices.archived','=', NULL)

                //->orWhere('matrices.assigned','=', 0)

                ->whereRaw('matrices.status= ?', [$status])

                ->orderBy('deadline', 'asc')

                ->paginate(25);
                //hide cancelled from tutor

      }

      return view('tutor.all-questions', ['data' =>$data]);
    }

    public static function findStatus($question) //called on blade all questions
    {

        $data =  DB::table('matrices')->where('qid','=', $question)->get();
        //dd($data[0]->paid);

        if($data[0]->paid ==1 )
        {
          $status = "Paid";

        }
        if($data[0]->completed ==1 )
        {
          $status = "Complete";

        }
        if($data[0]->reviews ==1 )
        {
          $status = "Review";

        }
        if($data[0]->revision ==1 )
        {
          $status = "Revision";

        }
        if($data[0]->answered ==1 )
        {
          $status = "Answered";

        }
        if($data[0]->assigned ==1 )
        {
          $status = "Assigned";

        }
        if($data[0]->assigned ==0 )
        {
          $status = "New";

        }

        return $status;

    }

    // home page status
    public static function findStatusNew($question) //called on blade all questions
    {

        $data =  DB::table('matrices')->where('qid','=', $question)->first();
        //dd($data[0]->paid);

        return $data->status;

    }

    // home page status
    public static function findStatusComplete($question) //called on blade all questions
    {

        $data =  DB::table('matrices')->where('qid','=', $question)->get();
        //dd($data[0]->paid);

        if($data[0]->paid ==1 )
        {
          $status = "Paid";

        }

        else
        {
          $status = "Not Paid";

        }

        return $status;

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
      //dd($data);
      $data = $data[0];

      //read comments
      $comments = $adminController->getComments($questionid);

      // get bids here
      $bids = $this->getBidStatus($questionid);

      //check assigned

      $assigned = $this->checkAssigned($questionid);


       return view('tutor.question-det',
       [
          'data' =>$data,
          'files'=> $file, // question files
           'comments' => $comments, //get comments
           'bids'=> $bids ,//check the bids
           'assigned' => $assigned // check if asigned

       ] );

    }


    //Check if tutor made bid

    public function getBidStatus($questionid)
    {
        $bids = DB::table('bid_tables')

                -> select('tutorid', 'questionid')

                ->where('tutorid','=', Auth::user()->id )

                ->where('questionid','=', $questionid)

                ->get()

                ->toArray();

        return $bids;
    }

    //Check if tutor made bid

    public function checkAssigned($questionid)
    {
        $assigned = DB::table('matrices')

                //-> select('tutorid', 'questionid')

                ->where('assigned','=', 1 )

                ->where('qid','=', $questionid)

                ->get()

                ->toArray();

        return $assigned;
    }


    public function UpdateProfile(Request $request)
    {
      $random = rand(999,9999);
      $affected = DB::table('tutors')
              ->where('id', Auth::user()->id)
              ->update([
                'tutorid' =>$random,

                'about'=> $request->about,

                'phone' => $request->phone,

                'country' =>$request->country,

                'language' =>$request->language,

                'software' => $request->software,

                'expertise' => $request->expertise,

                'school'=>$request->school
              ]);

      return redirect() ->back();
    }

    public function UpdateAccount(Request $request)
    {

      $random = rand(999,9999);

      $affected = DB::table('accounts')
              ->where('id', Auth::user()->id)
              ->update([
                'accountid'=> $random,
                'level' =>'beginer',
                'state' =>'Active',
                'paymentmethodid' =>$random

              ]);
          return redirect() ->back();
    }

    public function UpdatePaymentDetails(Request $request)
    {

      $random = rand(999,9999);

      $affected = DB::table('payment_details')
              ->where('id', Auth::user()->id)
              ->update([
                'accountid'=> $random,
                'accountid' => rand(999,9999),
                'paypalemail' =>$request->paypalemail,
                'mpesa' =>$request->mpesa,
                'amountdue' =>$request->amountdue,
                'minamount'=> $request->minamount,
                'total' => $request->total

              ]);
          return redirect() ->back();
    }

    public function TutorDetails(){

      //become a tutor

      $user = Auth::user()->id;

      //tutor data

      $tutorData = DB::table('tutors')->where('tutorid', '=', $user)->get();

      //account information

      $accountData =DB::table('accounts')->where('tutorid', '=', $user)->get();
      //payment information

      $paymentData = DB::table('payment_details')->where('tutorid', '=', $user)->get();

      //payment data

      return view ('tutor.tutor-det', ['tutordata'=> $tutorData, 'accountdata'=> $accountData, 'paymentdata'=> $paymentData]);
    }

    public function lastPayment()
    {
      // get the paid orders
        $last = new AdminQuestionController();

        $payments = $last->tutorLastPayments();

        return view('tutor.last-payments', ['data'=> $payments]);

    }

}
