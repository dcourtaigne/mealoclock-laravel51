@extends('app')

@section('content')
    <div class="largeurSite">
        <section id="User" class="container-fluid">
                <div class="col-xs-12">
                    <div class="row">
                   <!-- debut de la info du profil -->
                        <div class="col-xs-5 col-sm-3 marginTB20 text-center">
                            @if($user->profile->photo)
                            {!! Html::image('img/avatar/'.$user->profile->photo, 'photo du profil', array('class' => 'img-responsive thumbnail')) !!}
                            @else
                            {!! Html::image('img/avatar/avatar.png', 'photo du profil', array('class' => 'img-responsive thumbnail')) !!}
                            @endif
                        </div>
                        <div class="col-xs-7 col-sm-9">
                            <h2>{{ $text['greetings'] }}</h2>
                            @if ($currentUserId == $user->id)
                            <ul class="list-unstyled list-inline">
                                <li>{!! Html::linkRoute('editProfile', 'Compléter mon profil', array($user->name), array('class' => 'btn btn-default', 'role' => 'button')) !!}</li>
                                <li class="btn btn-default" role="button">Modifier ma photo
                                    <form method='POST' action="{{ route('uploadPhoto') }}" enctype="multipart/form-data">
                                    <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
                                    <input style="opacity:0;position:absolute;z-index:99" type="file" name="photo">
                                    <input type="hidden" name="MAX_FILE_SIZE" value="100000">
                                </li>
                                <li>
                                    <input type="submit" class="btn btn-primary btn-xs" value="ok">
                                </form>
                                </li>
                            </ul>
                            @endif
                        </div>
                        <div class="col-xs-12 col-sm-9">
                            <p> Membre depuis le : {{ formatFrenchDate($user->created_at) }}</p>
                            <p> Repas organisé(s) : {{ count($user->events_owner) }} </br>
                                Repas participé(s) : {{ count($user->events) }}</p>
                            <a class="btn btn-default marginTop10" href="#" role="button">Laisser un commentaire</a>
                            <a class="btn btn-default marginTop10" href="#" role="button">Contacter</a>

                        </div>
                    </div>

                </div>

                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-xs-12">
                            <blockquote>{!! nl2br($user->profile->intro) !!}</blockquote>
                            <p>Communautés favorites: </p>
                            <ul class="list-unstyled list-inline">
                                @foreach($user->communities as $communitie)
                                    <li>{!! Html::image('img/'.$communitie->shortname.'_thumb.png', 'logo communauté', array('class' => 'img-thumbnail')) !!} </li>
                                @endforeach
                            </ul>

                            <!-- commentaires -->

                            <section id="comments" class="row container-fluid marginTB20">
                                <h4>Les avis des gens</h4><br>
                                <ul class="list-unstyled list-inline">
                                    <li><img class="img-rounded" src="http://lorempixel.com/50/50"></li>
                                    <li><a href="#"><strong>Barbe Bleue</strong></a>
                                    <br><p>"Super soirée fondue avec Gaston, on remet ça bientôt!"</p></li>
                                </ul>
                            <hr>
                                <ul class="list-unstyled list-inline">
                                    <li><img class="img-rounded" src="http://lorempixel.com/50/50"></li>
                                    <li><a href="#"><strong>ChouFleur</strong></a><br>
                                    <p>"C'était génial, comme d'habitude :) Vivement VeggGiving!"</p></li>
                                </ul>
                            <hr>
                                <ul class="list-unstyled list-inline">
                                    <li><img class="img-rounded" src="http://lorempixel.com/50/50"></li>
                                    <li><a href="#"><strong>Grand Schtroumpf</strong></a><br>
                                    <p>"J'ignorais qu'on pouvait à ce point savourer des brocolis!"</p></li>
                                </ul>
                            </section>

                        </div>
                    </div>
                    <div class="col-sm-6">
                        <a href="#" data-href="" data-toggle="modal" data-target="#confirm-delete">Supprimer mon compte</a><br>
                    </div>
                </div>


                <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel">Confirmer la suppression de votre profil</h4>
                            </div>

                            <div class="modal-body">
                                <p>Attention ! Vous êtes sur le point de faire une grosse erreur, du genre irreversible. Vous allez supprimer votre compte. </p>
                                <p>Voulez-vous vraiment le faire ? hein ? Sérieusement ?</p>
                                <p class="debug-url"></p>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                                <a href="#" class="btn btn-danger btn-ok">Supprimer</a>
                            </div>
                        </div>
                    </div>
                </div>

            <!-- tableau d'exemple en placement -->
            <div class="col-sm-5 col-sm-offset-1">
                <section id="evenementProfile" class="row container-fluid gris marginTB20">
                    <h3>Les prochains événements 
                        @if ($currentUserId !== $user->id) 
                            {{ 'de '.$user->name }}
                        @endif
                    </h3>
                        <ul class="list-unstyled list-inline">
                            @if ($currentUserId == $user->id)
                                <li>{!! Html::linkRoute('myevents', 'Gérer mes événements', array() , array('class' => 'btn btn-default', 'role' => 'button')) !!}</li>
                            @endif
                            <li><a href="{{ route('createEvent') }} " class="btn btn-primary" role="button">Créer un événement</a></li>
                        </ul>
			            @if(empty($user->events_owner) AND empty($user->events))
			            <p>Vous n'avez pas d\'événements planifiés</p>
			            @endif
                    @if (!empty($user->events_owner))
                    <section>
                        <h4 class="col-xs-12">{{ $text['orgTitle'] }}</h4>
                            <article id="events">
                                <div class="col-xs-12">
                                    <section id="event_list" class="marginTB20">
                                        <ul class="list-unstyled">

                                            @foreach ($user->events_owner as $event)
                                                @include('profiles._eventsList', array('event' => $event))
                                            @endforeach
                                            
                                        </ul>
                                    </section>
                                </div>
                            </article>
                    </section>
                    @endif
                    @if (!empty($user->events))
                    <section>
                        <h4 class="col-xs-12">{{ $text['partTitle'] }}</h4>
                            <article id="events">
                                <div class="col-xs-12">
                                    <section id="event_list" class="marginTB20">
                                        <ul class="list-unstyled">
                                            @foreach ($user->events as $event)
                                                @include('profiles._eventsList', array('event' => $event))
                                            @endforeach
                                        </ul>
                                    </section>
                                </div>
                            </article>
                    </section>
                    @endif
                </section>
            </div>
            <!-- fin du tableau de placement -->
        </section>
    </div>
@stop
