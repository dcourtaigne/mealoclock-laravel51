<li>
@if($guest->profile->photo_thumb)
	{!! Html::image('img/avatar/'.$guest->profile->photo_thumb, 'avatar', array('class' => 'img-responsive')) !!}
@else
	{!! Html::image('img/avatar/avatar_thumbnail.png', 'avatar', array('class' => 'img-responsive')) !!}
@endif
 <p class="noMargin"><a href="#">{{ $guest->name }}</a></p>
 </li><br>