<li class="center">
  <div class="vege col-xs-12">
    <p class=" h4 color-white">{{ formatFrenchDate($event['date']) }}</p>
    <button class="gerer_event">Annuler mon inscription</button>
  </div>

  <div class="col-xs-12 col-sm-3 bg-success marginTB20  ">
    <h4 class="noMargin">{{ formatTime($event['time']) }}</h4>
  </div>

  <article class="col-xs-12 col-sm-9">
    <h3>
      <strong>{{ $event['title'] }}</strong>
    </h3>

    <p class="noMargin">Chez <a href="#">TODO</a>, Paris {{ $event['location'] }}</p><br>
    <p class="marginTop20">{{ nl2br($event['details']) }}</p>
  </article>
  </li>