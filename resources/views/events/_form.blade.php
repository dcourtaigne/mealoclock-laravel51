<div class="form-group">
		{!! Form::label('title', 'Titre: ') !!}
		@if($errors->has('title'))
			<span class="text-danger" id="errorsName">{{ $errors->first('title', ':message') }}</span>
		@endif
		{!! Form::text('title', $event->title, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('details', 'Description: ') !!}
	@if($errors->has('details'))
			<span class="text-danger" id="errorsName">{{ $errors->first('details', ':message') }}</span>
	@endif
	{!! Form::textarea('details', $event->details, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('date', 'Date: ') !!}
	@if($errors->has('date'))
			<span class="text-danger" id="errorsName">{{ $errors->first('date', ':message') }}</span>
	@endif
	{!! Form::input('date', 'date', $event->date, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('time', 'Heure: ') !!}
	@if($errors->has('time'))
			<span class="text-danger" id="errorsName">{{ $errors->first('time', ':message') }}</span>
	@endif
	{!! Form::input('time', 'time', $event->time, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('location', 'Lieu: ') !!}
	@if($errors->has('location'))
			<span class="text-danger" id="errorsName">{{ $errors->first('location', ':message') }}</span>
	@endif
	{!! Form::select('location', $loc, $event->location, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
	{!! Form::label('guests', 'Nombre de participants: ') !!}*
	@if($errors->has('guests'))
			<span class="text-danger" id="errorsName">{{ $errors->first('guests', ':message') }}</span>
	@endif
	{!! Form::selectRange('guests', 1, 99, $event->guests, ['class' => 'form-control']) !!}
</div>


<div class="form-group">
		{!! Form::label('communitie_id', 'Communauté: ') !!}
		@if($errors->has('communitie_id'))
			<span class="text-danger" id="errorsName">{{ $errors->first('communitie_id', ':message') }}</span>
		@endif
		{!! Form::select('communitie_id', $communities, $event->communitie_id, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}

</div>

@section('footer')

	<script type="text/javascript">
		$('#tag_list').select2({
			placeholder: 'Choose a tag'
		});
	</script>

@endsection