	@extends('app')

@section('content')
<section id="createEvent" class="largeurSite container-fluid">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<h1>Créer un nouvel évènement</h1>
			<p><em>Tous les champs sont obligatoires</em></p>

	<hr/>
	{!! Form::model($event = new \App\Event, ['url' => 'events']) !!}
	
		@include('events._form', ['submitButtonText' => 'Créer l\'événement'])
		
	{!! Form::close() !!}
		</div>

	</div>
		
@stop