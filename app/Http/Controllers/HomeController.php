<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Controllers\AdminQuestionController;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admina.home');
    }

    public function adminbhome()
    {
      return view ('adminb/home');
    }

    public function center()
    {
      return view ('center/home');
    }

    public function student()
    {
      return view ('student/home');
    }

    public function tutor()
    {
      return view ('tutor/home');
    }
    //add reviewer, caller and bidder.

}
