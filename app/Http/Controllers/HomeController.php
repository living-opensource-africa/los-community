<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Role;

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
     * Check the user typeand render a respective page
     *
     * @return \Illuminate\Contracts\Support\Renderable
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

    public function userTypes() {
        return Role::get();
    }
}
