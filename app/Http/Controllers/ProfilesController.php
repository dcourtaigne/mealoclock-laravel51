<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\ProfileRequest;
use App\Http\Controllers\Controller;

use Image;

use App\Profile;
use App\User;
use App\Communitie;
use App\Event;

class ProfilesController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($username)
    {
        $currentUserId = '';
        if(\Auth::user()){
            $currentUserId = \Auth::user()->id;
        }
        $user = User::with('profile', 'events_owner', 'events', 'communities')->where('name', $username)->first();
        if($currentUserId == $user->id){
            $textTable = [
                    'orgTitle' => 'J\'organise',
                    'partTitle' => 'Je participe',
                    'greetings' => 'Bienvenue, '.ucfirst($user->name)
                    ];
        } else{
            $textTable = [
                    'orgTitle' => 'Evènements(s) organisé(s) par '.ucfirst($user->name),
                    'partTitle' => 'Evènements(s) au(x)quel(s) '.ucfirst($user->name).' participe',
                    'greetings' => 'Bienvenue sur le profil de '.ucfirst($user->name)
                    ];
        }
        $text = collect($textTable);
        //dd($user->toArray());

        return view('profiles.show', compact('user', 'currentUserId', 'text'));
    }

    public function showMyEvents()
    {
        $user = User::find(\Auth::user()->id);
        
        $eventsTemp = $user->events;
        $events = $eventsTemp->groupBy(function ($item, $key) {
        return $item['pivot']['status'];
        });

        $eventsOwner = $user->events_owner;
        return view('profiles.myEvents', compact('events', 'eventsOwner'));
    }

    public function showMyEventsRequests(Event $event)
    {
        if($event->user_id != \Auth::user()->id){
            return redirect()->route('profile', \Auth::user()->name);
        }

        $requests = $event->users()->with('profile', 'events', 'events_owner')->where('status', '=', 'tobeconfirmed')->get();
        $eventTitle = $event->title;
        $eventId = $event->id;
        //dd($requests->toArray());
        return view('profiles.myEventsRequests', compact('requests', 'eventTitle', 'eventId'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($users)
    {
        $user = User::where('name', '=', $users)->with('profile')->firstOrFail();
        $communities = Communitie::lists('name', 'id');
        $com_list = $user->communities->lists('id')->toArray();
        //dd($com_list);
        return view('profiles.edit', compact('user', 'communities', 'com_list'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileRequest $request, $users)
    {
        $user = User::where('name', $users)->firstOrFail();
        $user->profile->fill($request->only('intro'))->save();
        $user->communities()->sync($request->input('com_list'));

        flash()->success('Votre profil a bien été mis à jour!');
        return redirect()->route('profile', \Auth::user()->name);
    }

    public function uploadPhoto(Request $request)
    {
        $this->validate($request, [
            ['photo' => 'required|mimes:jpeg, jpg, png, gif'] 
            ]);

        $image = $request->file('photo');
        $fileName  = \Auth::user()->name. '.' . $image->getClientOriginalExtension();
        $fileNameThumb  = \Auth::user()->name. '_' . 'thumb' . '.' . $image->getClientOriginalExtension();

        $path = public_path('img/avatar/' . $fileName);
        $pathThumb = public_path('img/avatar/' . $fileNameThumb);

    
        Image::make($image->getRealPath())->resize(250, 250)->save($path);
        Image::make($image->getRealPath())->resize(50, 50)->save($pathThumb);

        $user = \Auth::user();
        $user->profile->photo = $fileName;
        $user->profile->photo_thumb = $fileNameThumb;
        $user->profile->save();

        return redirect()->route('profile', \Auth::user()->name);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
