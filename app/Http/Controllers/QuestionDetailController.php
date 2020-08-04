<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    //reassign question

    // mark as complete



}
