<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MeetUp;

class TrainingController extends Controller
{
    /**
     * Show session interface, if currently running
     * @return view
     */
    public function index(Request $request) {
        $training = MeetUp::find($request->room_id);
        return view('training', compact(['training']));
    }
}
