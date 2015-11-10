<?php
$eventDate=explode(' ',formatFrenchDate($event->date));
?>
<hr>
<li class="row">
  <div class="col-xs-3">
    <strong class="h3">{{ $eventDate[0] }}</strong></br>{{ $eventDate[1] }}
  </div>

  <div class="col-xs-7">
      <h4><a href="{{ route('showEvent', ['events' => $event->id]) }}">{{ $event->title }}</a></h4>
      <p>{{ formatTime($event->time) }}</p>
      <p>Chez <a href="#">TODO</a>, Paris {{ $event->location }}</p>
  </div>
</li>