@extends('app')

@section('content')

	<h1>Edit {!! $event->title !!}</h1>

	<hr/>
	{!! Form::model($event, ['method' => 'PATCH', 'action' => ['EventsController@update', $event->id]]) !!}
		@include('events._form', ['submitButtonText' => 'Update Article'])
		
	{!! Form::close() !!}
		
@stop