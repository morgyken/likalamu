<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\AdminQuestionController;

use DB;

use Auth;

class QuestionDetailController extends Controller
{
    //tutor make bids
    public function PlaceBids (Request $request)
    {
      DB::table('bid_tables')->insert(
             [
                 'tutorid' => $request->tutorid,
                 'questionid' => $request->questionid,
                 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
             ]
         );

           return redirect() ->back();
    }
    //Assign questions to a tutor

    //rate tutor
    public function rateTutor (Request $request, $questionid)
    {
      //tutor id
      $tutor = DB::table('assignment_tables')

            ->where('questionid', '=', $request->questionid)->pluck('tutorid');
      //dd($tutor[0]);

      DB::table('tutor_ratings')->insert(
             [
                 'tutorid' => $tutor[0],
                 'userid' => Auth::user()->id,
                 'rating' => $request->rating,
                 'comment' =>$request->comment,
                 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
             ]
         );

          return redirect() ->back();
    }

    //take question //tutor

    public function takeBids (Request $request)
    {
      DB::table('assignment_tables')->insert(
             [
                 'questionid' => $request->questionid,

                 'tutorid' => Auth::user()->id,

                 'userid' => Auth::user()->id,

                 'name' => 'Morgyken', //add user

                 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
             ]
         );

         $this->makeReview($request->questionid, 'assigned');

        return redirect() ->back();
    }

        //review can be completed, assigned,answered,paid,cancelled,revision,price,tutorprice,late,completed

    public function makeReview($questionid, $review)
    {
      DB::table('matrices')->where('qid','=', $questionid)->update(
             [
                 $review=>1,
                 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
             ]
         );

        //  return redirect() ->back();
    }

    // admin assign bids
    public function assignBids (Request $request, $questionid)
    {

    //  dd($request->tutorid);

      DB::table('assignment_tables')->insert(
             [
                 'questionid' =>$questionid, // question id

                 'userid' => Auth::user()->id, // assigned by

                 'name' => $request->name, // assigned by

                 'tutorid' => $request->tutorid, // The tutor assigned to

                 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
             ]
         );

         $this->makeReview($request->questionid, 'assigned');

        return redirect() ->back();
    }

    //admin make paymnent ::admin

    //show bids:: admina

    //archive order
    public function archiveQuestion(Request $request)
    {
      //call archive question

      $this->makeReview($request->questionid, 'archived');

      return redirect() ->back();
    }

    //put on review

    //mark as complete

    public function completeQuestion(Request $request)
    {
      //call archive question

      $this->makeReview($request->questionid, 'completed');

      return redirect() ->back();
    }
    //reassign question

    public function reassignQuestion(Request $request)
    {
      //callcomplete question

      DB::table('matrices')->where('qid','=', $questionid)->update(
             [
                 'revision'=>0,
                 'assigned'=>0,
                 'answered'=>0,
                 'finished'=>0,
                 'paid'=>0,
                 'revision'=>0,
                 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
             ]
         );

      return redirect() ->back();
    }

    public function viewTutorPayments(){

      //return all tutor payments

      //last payment day // make payments on fridays like frid 4th sept

      $payments = DB::table('tutor_payments')->get();

      return view('admina.tutorpayments', ['data'=> $payments]);
    }

    public function viewTutorPaymentsDet(Request $request, $tutorid){

      //tutor id, name, from user
      //question id and det from questions
      // question status from matrices

      $orderscompleted = DB::table('questions')

      ->join('matrices', 'matrices.qid', '=', 'questions.questionid')

      ->join('assignment_tables', 'matrices.qid', '=', 'assignment_tables.questionid')

      ->select(DB::raw('questions.questionid, questions.tutorprice, questions.deadline, matrices.completed, matrices.paid'))

      ->where('assignment_tables.tutorid', '=', $tutorid)

      ->get();

      return view('admina.tutorpayment-det', ['data' => $orderscompleted]);

    }

    public function payTutors(Request $request, $data){

      $data = json_decode($data);

      //1. Update the tutor payment table

      for($i= 0; $i< count($data); $i++)
      {
        $affected = DB::table('tutor_payments')
                ->where('id',$data[$i])
                ->update([
                  'paid'=>1,
                  'updated_at' => \Carbon\Carbon::now()->toDateTimeString()

                ]);
      }


      //2. update all questions that have been paid use their user ids and dates

      // get finished orders

      $finishedOrders = new AdminQuestionController();

      $data= $finishedOrders->finishedOrders();

    //  dd($finishedOrders1);

    //dd($data);

      for($i= 0; $i< count($data); $i++)
      {
        //update the matrices table for the paid orders

        $affected = DB::table('matrices')
                ->where('qid',$data[$i]->questionid)
                ->update([
                  'paid'=>1,
                  'updated_at' => \Carbon\Carbon::now()->toDateTimeString()

                ]);

      }


      return redirect()->route('view-tutor-payments');

    }


    


}
