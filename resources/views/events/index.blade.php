@extends('app')

@section('content')

<section id="events" class="container-fluid">
<section class="row">
    <article class="col-xs-11">
      <h3 class="marginTop20">Evénements à venir</h3>
      <p>Retrouvez l'ensemble des événements à venir toutes communautés confondues, par ordre chronologique ou en recherchant une date précise.</p>
    </article>
  </section>
  <hr>
  <section class="pull-left">
    <label>Rechercher par date: </label>
    <input type="text" id="datepicker"></button>
    <button type="button" id="resetDate" class="btn btn-default btn-round-xs btn-xs glyphicon glyphicon-refresh"></button>
  </section>
  <div>
    <button type="button" name="créer un événement" class="btn btn-default pull-right">
    <a href="{{ route('createEvent') }}"><i class="glyphicon glyphicon-plus"></i><strong class="hidden-xs"> créer un événement</strong></a>
    </button>
  </div>
  <section id="event_list" class="col-xs-12 marginTB20">
    <ul class="list-unstyled">
      @include('events._list', array('events'=>$events))
    </ul>
  </section>
</section>
    {!! Html::script('js/datepicker_moc.js') !!}
    {!! Html::script('js/datepicker_fr.js') !!}
@stop