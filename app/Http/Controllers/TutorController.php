<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use Auth;

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
      //dd($data);
      $data = $data[0];

      //read comments
      $comments = $adminController->getComments($questionid);
      //return the view for question detail

      return view('tutor.question-det', ['data' =>$data, 'files'=> $file, 'comments' => $comments] );

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

      return view ('tutor.tutor-det');
    }
}
