<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MeetUp;
use Auth;

class AdminController extends Controller
{

    /**
     *  Render home page for admin user
     *  @return view
     */
    public function index() {
        return view('admin.home');
    }

    /**
     *  Store new meet up details
     *  @param Request $request
     *  @return jsonArray
     */
    public function createMeetUp(Request $request) {

        // Create a timestamp from date and time
        $dateTime = $request->date.' '.$request->time;

        // Create data store model for the request
        $meetUp = new MeetUp();
        $meetUp->title = $request->title;
        $meetUp->description = $request->description;
        $meetUp->user_id = Auth::id();
        $meetUp->date_time = $dateTime;

        if ($meetUp->save()) {
            return response()->json([
                'status' => 'success',
                'message' => 'successfully added event'
            ], 200);
        }
        else {
            return repsonse()->json([
                'status' => 'error',
                'message' => 'Could not save record'
            ], 501);
        }
    }
}
