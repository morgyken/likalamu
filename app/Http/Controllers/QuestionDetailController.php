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
    public function rateTutor (Request $request)
    {
      DB::table('tutor_ratings')->insert(
             [
                 'tutorid' => $request->tutorid,
                 'userid' => Auth::user()->id,
                 'rating' => 5,
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

}
