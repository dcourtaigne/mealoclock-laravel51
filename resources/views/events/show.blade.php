@extends('app')

@section('content')
<section id="event" data-id="{{ $event->id }}" class="container-fluid">
       <section class="row marginTop10">
      <div id="feedback"></div>

          <article class="col-xs-12 col-sm-6 col-sm-push-3 col-md-6 col-md-push-3 paddingTB25">
            <h2 class="marginTop10"><a href="#">{{ $event->title }}</a></h2>
              <p>Organisé par <a href="{{ route('profile', array('users' => $event->user->name)) }}"><strong>{{ ucfirst($event->user->name) }}</strong></a></p> <br>
              <p><i class="glyphicon glyphicon-time"></i> {{ formatFrenchDate($event->date) }} à {{ formatTime($event->time) }}</p>
              <p><i class="glyphicon glyphicon-map-marker"></i> Paris, {{ $event->location }}e</p>
              <p><i class="fa fa-child"></i> Participants : {{ count($confirmedGuests) }}</p>
          </article>

          <article class="col-xs-12 col-sm-3 col-sm-push-3 col-md-3 col-md-push-3 paddingTB20 text-center">
            {!! Html::image('img/event/'.$event->image, 'event picture', array('class' => 'img-responsive')) !!}
          @if ($currentUserId == $event->user_id)
            <div class="col-xs-12 col-sm-2 form-group photoUpload">
              <form method='POST' action="{{ route('uploadImage'  ) }}" enctype="multipart/form-data">
                <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="event" value="{{ $event->id }}">
                <input type="file" name="image">
                <input type="hidden" name="MAX_FILE_SIZE" value="100000">
                <button type="submit" class="btn btn-primary btn-xs">Ok</button>
              </form>
            </div>
           @endif
          </article>

         <div class="col-xs-12 col-sm-3 col-sm-pull-9">
             @if (Auth::check())
              @if($currentUserId == $event->user_id)
            	<button type="button" name="Participer" class="btn btn-primary btn-block marginTop20 color-white">
              <a href="#" class="color-white"><i class="glyphicon glyphicon-user color-white"></i><strong>  Gérer mes événements</strong></a>
              </button>
            	@endif
	            @if (!$confirmedGuests->contains($currentUserId) AND !$pendingGuests->contains($currentUserId) AND $currentUserId !== $event->user_id)
	            <button type="button" name="Participer" class="btn btn-primary btn-block marginTop20 color-white" id="buttonmsg">
              <a href="#" id="attend" class="color-white"><i class="glyphicon glyphicon-user color-white"></i><strong>  Participer</strong></a>
              </button>
	            @elseif($confirmedGuests->contains($currentUserId) OR $pendingGuests->contains($currentUserId) AND $currentUserId !== $event->user_id)
	            <button type="button" name="Participer" class="btn btn-primary btn-block marginTop20">
              <a href="#" id="cancel" class="color-white"><strong>Annuler ma participation</strong></a>
              </button>
              @endif
            @else
            <button type="button" name="Participer" class="btn btn-primary btn-block marginTop20" id="open_register_form">
            <a href="#" id="inscription" class="color-white"><strong>Inscrivez-vous pour participer !</strong></a>
            </button>
            @endif
            <button type="button" name="Participer" class="btn btn-primary btn-block marginTop10">
            <a href="#" class="color-white"><i class="glyphicon glyphicon-pencil"></i><strong>Question</strong></a>
            </button>
            
            <div class="btn-group btn-block">
              <button type="button" class="btn-group btn btn-primary dropdown-toggle btn-block marginTop10" name="events" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="glyphicon glyphicon-search"></i>
              <strong>  Evénements</strong> <span class="caret"></span>
              </button>
                <ul class="dropdown-menu">
                  <li><a href="{{ route('eventsIndexCom', array('events' => $event->communitie->shortname)) }}">Evénements de la communauté</a></li>
                  <li><a href="{{ route('eventsIndex') }}">Tous les événements</a></li>
                </ul>
             </div>
          </div> 
      </section>

      <section class="row ">

        <article class="col-xs-12 col-sm-8 col-sm-push-3 marginTB20">
            <p class="text-left">{{ $event->details }}</p>
        </article>

         <article class="col-xs-12 col-sm-3 col-sm-pull-8 marginTB20">
            <div class=" row thumbnail noMargin text-center">

                <p>Membres participants</p>

              <ul class="list-unstyled list-inline marginTop10">
                
                @each ('events._eventGuests', $confirmedGuests,'guest')
              
              </ul>
            </div>
          </article>
      </section>

</section>

<div class="overlay">
  <div id="modale_participation">
    <form id="participation" method="POST" action=" {{ route('sendRequest') }}">
      <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
      <button class="fermer_modale_p">x</button>
      <h4>Demande de participation</h4>
      <p>Envoyez un message à l\'organisateur avec votre demande participation</p>
      <div class="text-danger" id="error"></div>
      <textarea id="champ_message" name="message" placeholder="Cliquer pour saisir"></textarea>
      <input type="hidden" value="{{ $currentUserId }}" name="guest_id">
      <input type="hidden" value="{{ $event->id }}" name="event_id">
      <input type="submit" id="submit_button_p" label="Envoyer" value="Envoyer">
    </form>
  </div>
</div>

<div class="overlay2">
  <div id="modale_annulation">
    <form id="annulation" method="POST" action="{{ route('cancelRequest') }}">
      <button class="fermer_modale_2">x</button>
      <p>Etes vous sûr de vouloir annuler votre participation à cet événement?</p>
      <div class="text-danger" id="error"></div>
      <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
      <input type="hidden" value="{{ $currentUserId }}" name="guest_id">
      <input type="hidden" value="{{ $event->id }}" name="event_id">
      <input type="submit" label="Envoyer" name="cancel" value="OK">
    </form>
  </div>
</div>
@stop

@section('footer')
{!! Html::script('js/modale_participation.js') !!}
@endsection

