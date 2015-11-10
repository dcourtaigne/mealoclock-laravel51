<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\EventRequest;
use App\Http\Controllers\Controller;

use App\Event;
use App\Communitie;

use Image;
class EventsController extends Controller
{
    /**
     * __construct method with middleware initialisation
     */
    public function __construct()
    {
        $this->middleware('auth', ['except'=>['index', 'indexCom', 'show']]);
    }

    /**
     * Display a listing of the events with the owner's name
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events= Event::getEventAndOwner()->sortBy('date')->groupBy('date')->toArray();
        return view('events.index', compact('events'));
    }

    /**
     * Display a listing of events of the community
     * @param  string $community shortname for the community
     * @return [type] Events by Community index view if the url parameter corresponds to a community shortname
     *                if not, 404 page 
     */
    public function indexCom($community)
    {
        if($community == 'vege' || $community == 'vegan' || $community == 'ssgluten' || $community == 'sslactose'){
            $com = Communitie::where('shortname','=', $community)->first()->toArray();
            $events = Event::getEventAndOwnerbyCom($com['id'])->sortBy('date')->groupBy('date')->toArray();
        } else{
            \App::abort(404);
        }
        return view('events.indexCom', compact('events', 'com'));
    }

    /**
     * Method to provide the list of existing events dates to the jquery datepicker on events pages
     * @return json dates of all events
     */
    public function getEventsDatesAjax(){
        $dates = Event::lists('date');
        return response()->json($dates);
    }
    /**
     * Method to provide the list of existing events dates for a community to the jquery datepicker on events by community pages
     * @return json dates of all events for a community
     */
    public function getEventsDatesAjaxCom(){
        $data = \Input::all();
        $dates = Communitie::find($data['com'][0])->events()->lists('date');
        return response()->json($dates);
    }

    /**
     * Show the form for creating a new event.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $communities = Communitie::lists('name', 'id')->toArray();
        $communities = array_merge(['' => 'Choisissez une communauté'], $communities);
        $loc = [];
        for($i=1;$i<=20;$i++){
            $loc[$i] = $i;
        }
        
        return view('events.create', compact('communities', 'loc'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventRequest $request)
    {
        
        $event = $this->createEvent($request);
        flash()->success('Votre événement a bien été créé!');
        return redirect()->route('showEvent', array('events' => $event->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        $currentUserId = '';
        if(\Auth::user()){
            $currentUserId = \Auth::user()->id;
        }
        $confirmedGuests = $event->users()->wherePivot('status', '=', 'confirmed')->with('profile')->get();
        $pendingGuests = $event->users()->wherePivot('status', '=', 'tobeconfirmed')->get();
        $event->user;
        $event->communitie;
        return view('events.show', compact('event', 'currentUserId', 'confirmedGuests', 'pendingGuests'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Event Collection
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        $communities = Communitie::lists('name', 'id');
        $communities->prepend('0', 'Choisissez');
        $loc = [];
        for($i=1;$i<=20;$i++){
            $loc[$i] = $i;
        }
        return view('events.edit', compact('event','communities', 'loc'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        $event->communitie()->associate(\Input::get('communitie_id'));
        $event->update($request->all());
        flash()->success('Votre événement a bien été mis à jour!');
        return redirect()->route('showEvent', array('events' => $event->id));
    }

    public function uploadImage(Request $request)
    {
        $this->validate($request, [
            ['image' => 'required|mimes:jpeg, jpg, png, gif'] 
            ]);
        $id = $request->get('event');
        $event = Event::findOrFail($id);
        $image = $request->file('image');
        $fileName  = $event->id. '_' . 'event' . '.' . $image->getClientOriginalExtension();

        $path = public_path('img/event/' . $fileName);
    
        Image::make($image->getRealPath())->resize(600, 469)->save($path);

        $event->image = $fileName;
        $event->save();

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

    private function chooseDefaultPic($id){
        $defaultPic1=array("burger-vege.jpg","legume-vege.jpg","poele-vege.jpg","sandwich-vege.jpg");
        $defaultPic2=array("burger-vegan.jpg","dessert-vegan.jpg","poele-vegan.jpg","sandwich-vegan.jpg");
        $defaultPic3=array("biscuit-gluten.jpg","dessert-gluten.jpg","pate-gluten.jpg","plat-gluten.jpg");
        $defaultPic4=array("chocolat-lactose.jpg","dessert-lactose.jpg","smoothie-lactose.jpg","verine-lactose.jpg");

        $number = rand(1,3);
        switch ($id) {
            case '1':
            $default = $defaultPic1;
            break;
            case '2':
            $default = $defaultPic2;
            break;
            case '3':
            $default = $defaultPic3;
            break;
            case '4':
            $default = $defaultPic4;
            break;
            default:
            $default = $defaultPic1;
              break;
        } 
        return $default[$number];
    }

    private function createEvent(EventRequest $request)
    {
        $event = new Event(\Input::all());
        $event->user()->associate(\Auth::user());
        $event->image = $this->chooseDefaultPic($event->communitie_id);
        $event->communitie()->associate(\Input::get('communitie_id'));
        $event->save();
        return $event;
    }
}

