@extends('app')

@section('content')

<div id="myevents" class="largeurSite paddingTB20">
	<div id="gererevenements" >
			<div class="">
				<div class="tabbable-line">

					<div class="panel-header">

						<ul class="nav-justified" id="tabs">
							<li>
								<a id="inc">
									Inscriptions confirmees
								</a>
							</li>
							<li>
								<a id="att">
									Inscriptions en attente
								</a>
							</li>
							<li>
								<a id="org">
									Evenements organises
								</a>
							</li>
						</ul>
					</div>

					<div class="tab-content">
						<section id="inscriptions" class="active">
							<ul>
								@if(isset($events['confirmed'] ))
									@foreach($events['confirmed'] as $event)
                    				@include('profiles._myEventsListPart', array('event' => $event));
                  					@endforeach
                 				@else
                  					{{ 'Vous n\'êtes inscrit à aucun événement' }}</p>
                  				@endif
							</ul>
						</section>

						<section id="enattente">
							<ul>
								@if(isset($events['tobeconfirmed'] ))
									@foreach($events['tobeconfirmed'] as $event)
                    				@include('profiles._myEventsListPart',array('event' => $event));
                  					@endforeach
                 				@else
                  					{{ 'Vous n\'êtes inscrit à aucun événement' }}</p>";
                  				@endif
							</ul>
						</section>

						<section id="organises">
							<ul>
								@if(!empty($eventsOwner))
									@foreach($eventsOwner as $event)
                    				@include('profiles._myEventsList', array('event' => $event));
                  					@endforeach
                  				@else
                  					{{ "Vous n'avez aucune demande de participation en attente" }}
                  				@endif
							</ul>
						</section>
					</div>
				</div>
	</div>

</div>
</div>
<div class="overlay">

</div>

 {!! Html::script('js/gerertableau.js') !!}





@stop