@extends('app')

@section('content')
	<section id="requests" class="largeurSite paddingTB20">

		<h2 class='text-center'>Les demandes de participations votre événement: {{ $eventTitle }} </h2>
		@if(!empty($requests))
			@foreach ($requests as $request)
				@include('profiles._request', array('request' => $request, 'eventId' =>$eventId));
			@endforeach
		@else
			{{ 'Vous n\'avez aucune demande de participations pour cet évènement' }}
		@endif
	</section>
{!! Html::script('js/gererutilisateurs.js') !!}
@stop