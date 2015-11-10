<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Event;


class ApplicationsController extends Controller
{
    public function sendRequest(Request $request)
    {
        //dd($request->all());
        $this->validate($request, [
            'message' => 'required|min:5' 
             ]);   

        $event = Event::findOrFail($request->input('event_id'));
        $userId = $request->input('guest_id');
        $event->users()->attach([$userId => ['message' => $request->input('message'), 'status' => 'tobeconfirmed']]);
        return 'it has arrived';
    }

    public function cancelRequest(Request $request)
    {
    	$event = Event::findOrFail($request->input('event_id'));
        $userId = $request->input('guest_id');
        return $event->users()->updateExistingPivot($userId, ['status' => 'cancelled']);
    }

    public function confirmRequest(Request $request)
    {
    	$event = Event::findOrFail($request->input('event_id'));
        $userId = $request->input('guest_id');
        return $event->users()->updateExistingPivot($userId, ['status' => 'confirmed']);
    }

    public function rejectRequest(Request $request)
    {
        $event = Event::findOrFail($request->input('event_id'));
        $userId = $request->input('guest_id');
        return $event->users()->updateExistingPivot($userId, ['status' => 'rejected']);
    }
}
