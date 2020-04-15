<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MeetUp;
use Auth;

class TrainingController extends Controller
{
    /**
     * Show session interface, if currently running
     * @return view
     */
    public function index(Request $request) {
        $training = MeetUp::find($request->room_id);
        $agent = new \Jenssegers\Agent\Agent;
        $isDesktop = $agent->isDesktop();
        return view('training', compact(['training', 'isDesktop']));
    }

    /**
     *  Update meet up details
     *  @param Request $request
     *  @return jsonArray
     */
    public function updateMeetUp(Request $request, $id) {

        // Create a timestamp from date and time
        $dateTime = $request->date.' '.$request->time;

        // Create data store model for the request
        $meetUp = MeetUp::find($id);
        $meetUp->title = $request->title;
        $meetUp->description = $request->description;
        $meetUp->user_id = Auth::id();
        $meetUp->date_time = $dateTime;

        if ($meetUp->save()) {
            return response()->json([
                'status' => 'success',
                'message' => 'successfully updated event'
            ], 200);
        }
        else {
            return repsonse()->json([
                'status' => 'error',
                'message' => 'Could not update event'
            ], 501);
        }
    }
}
