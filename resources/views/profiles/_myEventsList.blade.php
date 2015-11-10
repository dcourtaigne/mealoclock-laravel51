<li class="center">

  <div class="vege col-xs-12">
    <p class=" h4 color-white">{{ formatFrenchDate($event['date']) }}</p>
    <div class="buttons_gerer_event">
      <button class="confirmer_event" data-id="#">{!! Html::linkRoute('requests', 'Gerer l\'évenement', array($event['id'])) !!}</button>
      <button class="update_event">{!! Html::linkRoute('editEvent', 'Modifier l\'évenement', array($event['id'])) !!}</button>
      <button class="cancel_event">Annuler l'evenement</button>
    </div>
    <div class="dropdown_menu">
      <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Options
      <span class="caret"></span></button>
      <ul class="dropdown-menu">
        <li>{!! Html::linkRoute('requests', 'Gerer l\'évenement', array($event['id'])) !!}</li>
        <li><a href="#">Modifier l'évenement</a></li>
        <li><a href="#">Annuler l'évenement</a></li>
      </ul>
    </div>
  </div>

  <div class="col-xs-12 col-sm-3 bg-success marginTB20">
    <h4 class="noMargin">{{ formatTime($event['time']) }}</h4>
  </div>

  <article class="col-xs-12 col-sm-9">
    <H3>
      <strong>{{ $event['title'] }}</strong>
    </H3>

    <p class="noMargin">Chez <a href="#">TO DO</a> , Paris {{ $event['location'] }}</p>
    <p class="marginTop20 comment_field">{!! nl2br($event['details']) !!}</p>
  </article>
  </li>