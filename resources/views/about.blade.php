@extends('app')

@section('content')

	<section id="about">
            <!-- section de présentation générale des communautés -->

        <section class=" container-fluid largeurSite">

            <section class='row text-center anthracite color-white'>
                <div class="col-xs-12 paddingTB40 paddingLR40">
                    <h2> Comment ça marche ?</h2>
                    <p >Meal o'clock est un site communautaire dont le but est de vous permettre d’organiser des repas,
                        des activités, des initiations ou tous types d'événements liés à un régime alimentaire spécifique. Que vous soyez végétarien, végan, intolérant ou allergique au gluten ou au lactose, organisez ou participez à des événements avec des personnes qui partagent cette spécificité alimentaire.</p>
                </div>
            </section>

            <section class='row text-left vegan color-white'>
                <div class="col-xs-12 col-md-4 col-md-push-8 paddingTB40 paddingLR40">
                    <h3 class='text-center'><strong>Soyez vous-même !</strong></h3>
                    <p class="text-justify">Fini les tracas et les prises de têtes pour plaire à tout le monde, fini les regards noirs et les plats “rien que pour toi” : vivez pleinement votre régime alimentaire !
                        <br> Aujourd'hui, c'est vous qui êtes la norme alors, faites-vous plaisir.</p>
                </div>
                <div class="col-xs-12 col-md-8 col-md-pull-4 ">
                	{!! Html::image('img/vous_etes-B.png', 'illustration de la diversité du genre humain', array('class' => 'img-responsive')) !!}
                </div>
            </section>

            <section class='row text-left vege color-white'>
                <div class="col-xs-12 col-md-5 paddingTB40 paddingLR40">
                    <h3 class='text-center'><strong>Organisateur, <br>vous êtes le maître !</strong></h3>
                    <p class="text-justify">Avec des inconnus ou avec vos amis, organisez les événements qui vous ressemblent grâce à un large choix d’options et de personnalisation.
                    Grâce aux profils de nos membres, apprenez à connaître vos futurs invités. Et si vous ne souhaitez pas d’un participant à votre événement, refusez sa demande.</p>
                </div>
                <div class="col-xs-12 col-md-7 noPadding ">
                	{!! Html::image('img/maitre-b.png', 'illustration de superhéro', array('class' => 'img-responsive')) !!}
                </div>
            </section>

            <section class='row text-left sslactose color-white'>
                <div class="col-xs-12 col-md-4 col-md-push-8 paddingTB40 paddingLR40">
                    <h3 class='text-center'><strong>Faites le premier pas !</strong></h3>
                    <p class="text-justify">Pas besoin d’être cuisinier pour profiter de bons plats. De vrais chefs n’attendent que vous
                        autour de leur table. Alors complétez votre profil et donnez-leur envie d’en apprendre plus sur vous.<br>
                        L’organisateur a toujours le dernier mot concernant votre participation alors montrez que derrière votre profil, il y a un être sensible.</p>
                </div>
                <div class="col-xs-12 col-md-8 col-md-pull-4 ">
                	{!! Html::image('img/first_step-B.png', 'bulles bandes dessinnees', array('class' => 'img-responsive')) !!}
                </div>
            </section>

            <section class='row text-left ssgluten color-white'>
                <div class="col-xs-12 col-md-5 paddingTB40 paddingLR40">
                    <h3 class='text-center'><strong>Participez, dégustez, commentez</strong></h3>
                    <p class="text-justify">Meal o'clock est basé sur la confiance mais la confiance ne suffit pas toujours.
                        C’est pourquoi vous pouvez donner votre avis sur un événement,
                        un organisateur ou un participant afin que tout le monde sache le bien que vous en pensez,
                        ou a contrario, pour éviter à d’autres une mauvaise expérience avec l'un de nos membres. On est tous gagnants en donnant son avis.</p>
                </div>
                 <div class="col-xs-12 col-md-7 ">
                 	{!! Html::image('img/commenter-B.png', 'illustration de foule donnant son avis', array('class' => 'img-responsive')) !!}
            </section>

            <section class='row text-left rose color-white'>
                <div class="col-xs-12 col-md-4 col-md-push-8 paddingTB40 paddingLR40">
                    <h3 class='text-center'><strong>Des repas, des rencontres</strong></h3>
                    <p class="text-justify">Grâce à meal o'clock, vous avez la possibilité de partager sans restriction vos choix
                        et vos goûts avec les curieux ou les habitués. Entre connaisseurs ou néophytes, profitez du repas pour découvrir plus que des recettes, de véritables personnalités.</p>
                </div>
                <div class="col-xs-12 col-md-8 col-md-pull-4 ">
                	{!! Html::image('img/partager-B.png', 'groupe de personne autour d\'un stand de burger', array('class' => 'img-responsive')) !!}
                </div>
            </section>

            <section class='row text-left anthracite color-white text-center'>
                <div class="col-xs-12 paddingTB40 paddingLR40">
                    <h3 ><strong>Alors, qu’attendez-vous ?</strong></h3>
                    <p>Parmi nos 4 régimes alimentaires principaux, choisissez celui qui vous correspond ou bien celui que vous souhaitez découvrir.
                        Vous n'aurez plus qu'à choisir un événement, envoyer une requête à l'organisateur pour y participer et attendre sa réponse.
                        Et pourquoi ne pas organiser vous-même quelque chose ? Notre interface de création d'événement est très simple.
                        Alors, qu'attendez-vous pour vous asseoir à notre table ?</p></br>
                    <p><a href="#"><button type="button" class="btn btn-info btn-lg" id="button_inscription_about">Je m'inscris !</button></a></p>
                </div>
            </section>

        </section>
    </section>
@stop