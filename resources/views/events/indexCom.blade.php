@extends('app')

@section('content')

<section id="{{ $com['shortname'] }}" data-type="com" data-id="{{ $com['id'] }}" data-class="{{ $com['shortname'] }}" class="container-fluid">

     <section class="row {{ $com['shortname'] }}">
        <div class="col-xs-2 marginTB20 ">
          <i class="glyphicon logo hidden-sm hidden-md hidden-lg img-responsive marginTop10
        "></i>
          {!! Html::image('img/'.$com['shortname'].'.png', 'logo communauté', array('class' => 'hidden-xs img-responsive thumbnail')) !!}
        </div>

        <article class="col-xs-10 color-white marginTB20">
          <h2 class="marginTB20">Bienvenue dans l'espace {{ $com['name'] }}</h2>
          <p class='hidden-xs marginTB20 text-left'>{{ $com['details'] }}</p>
        </article>
    </section>
    <section class="row marginTop20">
      <article class="col-xs-6 col-sm-4">
      <h3>Evénements à venir</h3>
      </article>
      <div class="col-xs-10 col-sm-5 marginTop10">
        <section class="pull-left">
            <label>Rechercher par date: </label>
            <input type="text" id="datepicker"></button>
            <button type="button" id="resetDate" class="btn btn-default btn-round-xs btn-xs glyphicon glyphicon-refresh"></button>
        </section>
      </div>

      <div class="col-xs-2 col-sm-3 h4 ">
        <button type="button" name="créer un événement" class="btn btn-default pull-right">
        <a href="{{ route('createEvent') }}"><i class="glyphicon glyphicon-plus"></i><strong class="hidden-xs"> créer un événement</strong></a>
        </button>
      </div>

    </section>

        <!--<section id="events" class="container-fluid">-->
    <div class="col-xs-12">
      <section id="event_list" class="marginTB20">
        <ul class="list-unstyled">
           @include('events._list', array('events'=>$events))
        </ul>
      </section>
    </div>
  </section>
    {!! Html::script('js/datepicker_moc_com.js') !!}
    {!! Html::script('js/datepicker_fr.js') !!}
@stop