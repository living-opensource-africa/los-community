<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display member user landing page
     * @return view
     */
    public function index() {
        return view('member.index');
    }
}
