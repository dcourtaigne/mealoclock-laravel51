<header>
      <!-- logo du site -->
      <h1><a href="#">{!! Html::image('img/mealoclockB.png', 'logo meal oclock Découvrir, partager, échanger, savourer', array('class' => 'center-block img-responsive')) !!}</a></h1>
        <!-- navbar -->
        <nav id="navigation" class="navbar navbar-default bordeauNav" role="navigation">
          <div class="container-fluid">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="glyphicon glyphicon-menu-hamburger color-white"></span>
              </button>
              <ul class="nav navbar-nav nav-home">
                  <li><a class="navbar-brand glyphicon glyphicon-home btn-sm active " href="{{ url('/') }}"></a></li>
              </ul>
            </div>
            <div class="collapse navbar-collapse">
              <ul class="nav navbar-nav">
                    <li><a href="{{ url('about') }}">Comment ça marche</a></li>
                    <li>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Communautés<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ url('vege') }}">Végétariens</a></li>
                            <li><a href="{{ url('vegan') }}">Vegans</a></li>
                            <li><a href="{{ url('ssgluten') }}">Sans gluten</a></li>
                            <li><a href="{{ url('sslactose') }}">Sans lactose</a></li>
                        </ul>
                    </li>
                    <li class=""><a href="{{ url('events') }}">Evénements</a></li>
              </ul>
              <ul class="nav navbar-nav navbar-right">
                @if (! Auth::check())
                <li id="login" class="paddingLR15"><button>Se connecter</button></li>
                @else
                <li>{!! HTML::linkRoute('profile', 'Bonjour '.ucfirst(Auth::user()->name), array(Auth::user()->name)) !!}</li>
                <li><a href="{{ url('/auth/logout') }}">Logout</a></li>
                @endif
                @if (! Auth::check())
                <li id="inscription" class="paddingLR15"><button>Inscription</button></li>
                @endif
              </ul>
            </div><!--/.nav-collapse -->
          </div>
        </nav>
      </header>
        <!-- Modal LOGIN REGISTER -->
        <div id="overlay">
          <div id="modal">
              <a href="" id="button">X</a>
            <div class="col-lg-6 top">
              <h4>Connectez vous</h4>
            </div>
            <div id="mid">
              <form id="loginform" class="col-lg-6" method="POST" action="{{ url('/auth/login') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="forms">
                  <div class="form-group" class="col-sm-10">
                    <div id="errorEmail" class="text-danger"></div>
                    <div id="errorPassword" class="text-danger"></div>
                    <div id="error" class="text-danger"></div>
                      <label for="user_login">Email address:</label>
                    <input type="email" class="form-control" id="user_login" name="email" placeholder="Email">
                  </div>
                  <div class="form-group" class="col-sm-10">
                      <label for="user_password">Password:</label>
                      <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    </div>
                    <div>
                      <input type="checkbox" name="remember" value="yes">
                      <span>Remember me</span>
                    </div>
                    <div class="form-group">
                      <input type="submit" value="Login" name="login" class="btn btn-primary btn-block btn-lg" tabindex="7">
                    </div>
                </div>
              </form>
            </div>
            <div id="bot">
              <div class="col-lg-6">
                <h4 class="toggle-button">Ou inscrivez vous</h4>
              </div>
              <form class="col-lg-6" id="registerform" method="POST" action="{{ url('/auth/register') }}">
                <div>
                  <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
                  <label> Votre nom (ceci est public): </label><span class="text-danger" id="errorName"></span>
                  <input type="text" class="form-control" name="name" id="left" placeholder="First Name">
                  <label> Votre adresse email:</label><span class="text-danger" id="errorEmail"></span>
                  <input type="text" class="form-control" name="email" placeholder="Email adress">
                  <label> Mot de passe: </label><span class="text-danger" id="errorPass"></span>
                  <input type="password" class="form-control" name="password" placeholder="Password">
                  <label> Verification: </label><span class="text-danger" id="errorPassRepeat"></span>
                  <input type="password" class="form-control" name="password_confirmation" placeholder="Repeat Password">
                  <span>By clicking Sign Up, you agree to our Terms and that you have read our Data Policy, including our Cookie Use.</span>
                  <input type="submit" name="signup" value="Register" class="btn btn-primary btn-block btn-lg" tabindex="7">
                </div>
              </form>
            </div>
          </div>
        </div>
      