<!DOCTYPE html>
<html>
  <head>
    <meta charset = 'UTF-8'>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Meal o'Clock | Organisez des repas, partagez des moments | accueil !</title>
    <link rel="icon" href="{{ asset('img/favicon-B-Q-ILL.ico') }}" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    {!! Html::style('css/app.css') !!}
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />
    <link href='https://fonts.googleapis.com/css?family=Fredericka+the+Great' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Hammersmith+One' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Gudea:400,700' rel='stylesheet' type='text/css'>
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  </head>

  <body>
    <div id="largeurSite">
      
      @include('partials.header')
      
      @include('flash::message')

      @yield('content')
              
    </div>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="http://jondmiles.com/bootstrap-datepaginator/js/moment.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
  {!! Html::script('js/loginsignup.js') !!}
  {!! Html::script('js/carousel.js') !!}
  {!! Html::script('js/navbarfix.js') !!}
  
  <script type="text/javascript">;
    $('div.alert').not('.alert-important').delay(3000).slideUp(300);
  </script>

   @yield('footer')

  </body>
</html>