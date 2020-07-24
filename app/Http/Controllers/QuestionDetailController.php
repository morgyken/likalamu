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
                 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
             ]
         );

          return redirect() ->back();
    }
    //complete Question by a tutors, mark as answer



    //put question on review by admin

    //put question on revision

    // Complete question by Admin

    //admin make paymnent ::admin

    //show bids:: admina


}
