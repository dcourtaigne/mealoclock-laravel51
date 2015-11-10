<div class="conteneur_bis">
        <section class="utilisateur">
          <div class="alignright">
            <div class="image_prenom">
              @if($request['profile']['photo'])
                {!! Html::image('img/avatar/'.$request['profile']['photo'], 'photo du profil') !!}
                @else
                {!! Html::image('img/avatar/avatar.png', 'photo du profil') !!}
              @endif
                <h4>{{ $request['name'] }}</h4>
            </div>
            <p class="commentaire wide">{{ $request['pivot']['message'] }}</p>
            <span class="liste">
              <ul>
                <li>
                  {!! Form::open(array('route' => 'confirmRequest', 'id' => 'confirmer')) !!}
                  {!! Form::hidden('guest_id', $request['id']) !!}
                  {!! Form::hidden('event_id', $eventId) !!}
                  {!! Form::submit('Confirmer l\'inscription', array('class' => 'btn btn-primary')) !!}
                  {!! Form::close() !!}

                </li>
                <li>
                  {!! Form::open(array('route' => 'rejectRequest', 'id' => 'refuser')) !!}
                  {!! Form::hidden('guest_id', $request['id']) !!}
                  {!! Form::hidden('event_id', $eventId) !!}
                  {!! Form::submit('Refuser l\'inscription', array('class' => 'btn btn-primary')) !!}
                  {!! Form::close() !!}
                </li>
              </ul>
            </span>
          </div>

          <div class="display_bottom_comment">
            <strong>Afficher son message</strong>
          </div>
          <p class="commentaire">{{ $request['pivot']['message'] }}<br>
          <div class="display_bottom_profile">
          <strong>Apercu du profil</strong>
          </div>
          <article class="profile_preview">
            <p><strong>Introduction:</strong> {{ $request['profile']['intro'] }}</p>
            <span><strong>Repas participes:  TO DO</strong></span>
            <br>
            <span><strong>Repas organises:  {{ count($request['events_owner']) }}</strong></span>
            <br>
            {!! HTML::linkRoute('profile', 'Consulter son profil', array($request['name']), array('target' => '_blank')) !!}
          </article>
      </section>
    </div>