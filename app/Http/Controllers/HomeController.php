<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Role;
use App\MeetUp;
use Carbon\Carbon;

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
     * Check the user type and render a respective page
     *
     * @return view
     */
    public function index()
    {
        switch(Auth::user()->user_type) {
            case 1:
                return view('admin.home');
            break;
            case 2:
                return view('member.home');
            break;
            case 3:
                return view('student.home');
            break;
            default:
            abort(404);
        }
    }

    /**
     * Get platform user types
     * @return Model
     */
    public function userTypes() {
        return Role::get();
    }

    /**
    * Return json response of meetups
    * @return json 
    */
    public function meetups() {
        return MeetUp::where('date_time', 
            '>=', Carbon::now())->get();
    }
}
