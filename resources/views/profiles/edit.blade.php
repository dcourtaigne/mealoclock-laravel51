@extends('app')

@section('content')

<section id="updateUser" class="largeurSite container-fluid">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
				<h1>Compléter mon profil</h1>

		{!! Form::model($user, ['method' => 'PATCH', 'route' => ['updateProfile', $user['name']]]) !!}
	
	  		<div class="form-group">
	  			{!! Form::label('name', 'Pseudo:') !!}
	  			{!! Form::text('name', null , ['class' => 'form-control', 'disabled' => 'true']) !!}
	  		</div>

			<div class="form-group marginTB20">
				{!! Form::label('email', 'Email:') !!}
	  			{!! Form::text('email', null , ['class' => 'form-control', 'disabled' => 'true']) !!}
		  	</div>

			<div class="marginTB20">
				{!! Form::label('com_list', 'Communauté(s) favorite(s): ') !!}
				{!! Form::select('com_list[]', $communities, $com_list, ['id' => 'com_list', 'class' => 'form-control', 'multiple']) !!}
			</div>

		  	<div class="form-group">
		  		{!! Form::label('intro', 'Présentez-vous!') !!}
				{!! Form::textarea('intro', $user->profile->intro, ['class' => 'form-control', 'placeholder' => 'N\'hésitez à vous présenter! Ce texte s\'affichera sur votre profil et permettront aux autres membres de mieux vous connaître', 'rows' => '10']) !!}
		  	</div>

		  	<div class="marginTB20">
		  		{!! Form::submit('Mettre à jour', ['class' => 'btn btn-primary form-control']) !!}
			<!-- 	<input type="submit" class="btn btn-default" value="Annuler" name="cancel"> -->
			</div>

		{!! Form::close() !!}
		</div>
	</div>
</section>
@stop
@section('footer')
<script type="text/javascript">
	$('#com_list').select2();
</script>
@endsection
