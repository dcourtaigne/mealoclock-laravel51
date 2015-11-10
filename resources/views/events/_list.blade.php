@foreach($events as $event)
        <li class="row center" id="{{ $event[0]['date'] }}">
          <div class='col-xs-12 vege'>
            <p class='text-left h4 color-white'>{{ formatFrenchDate($event[0]['date']) }}</p>
          </div>
    @foreach($event as $singleEvent)    
        <div class='col-xs-12 col-sm-3 bg-success marginTB20'>
            <h4 class='noMargin'>{{ formatTime($singleEvent['time']) }}</h4>
        </div>

        <article class='col-xs-12 col-sm-7'>
            <h3 class='noMargin marginTop20 text-left'><a href="{{ route('showEvent', ['events' => $singleEvent['id']]) }}"><strong>{{ $singleEvent['title'] }}</strong></a></h3>
            <p class='noMargin'>Chez {!! Html::linkRoute('profile', ucfirst($singleEvent['user']['name']), array($singleEvent['user']['name'])) !!}, Paris {{ $singleEvent['location'] }}</p>
            <p class='marginTop20 hidden-xs'>{!! nl2br($singleEvent['details']) !!}</p>
        </article>

        <div class='col-xs-12 col-sm-2'>
            <div class='marginTB10'>
                <a href='#'>{!! Html::image('img/event/'.$singleEvent['image'], 'event picture', array('class' => 'img-responsive')) !!}</a>
            </div>
        </div>
    @endforeach
    </li>
@endforeach