<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Stenden-portfolio</title>
    <link href="{{{ asset('/css/style.css') }}}" rel="stylesheet">
    {{ HTML::style('css/style.css', array('media' => 'print')) }}
    <link href="{{{ asset('/css/bootstrap.css') }}}" rel="stylesheet">
    {{ HTML::style('css/bootstrap.css', array('media' => 'print')) }}
    <link href="{{{ asset('/css/bootstrap.min.css') }}}" rel="stylesheet">
    {{ HTML::style('css/bootstrap.min.css', array('media' => 'print')) }}
  </head>
  <body>
      <!-- navbar -->
      <div class="navbar2">
        <div class="top-left links">
          <a href="{{ url('/home') }}">Home</a>
          
          @if(!Auth::guest())
            @if( Auth::user()->user_level < 2 )
              {{-- Docenten en SLB'ers --}}
              <a href="{{ url('/school_groups') }}">Gebruikers</a>
              <a href="{{ url('/portfolios') }}">Portfolios</a>
            @else
              {{-- Studenten --}}
              <a href="{{ url('/portfolios/' . Auth::user()->portfolio) }}">Portfolio</a>
            @endif
          @endif

          <a href="{{ url('/contact') }}">Contact</a>
        </div>

        @if (Auth::guest())
          <div class="top-right links">
            <a href="{{ url('/login') }}">Login</a>
            <a href="{{ url('/register') }}">Register</a>
          </div>
        @else
          <div class="top-right links">
            <a>{{ Auth::user()->name }}</a>
            <a href="{{ url('/logout') }}"
                    onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                    Uitloggen
            </a>
            
            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
            </form>
          </div>
        @endif
      </div>
      <!-- einde navbar -->
      <!-- content -->
      <div class="content2">
        <div class="homepic">
          <div class="home_text flex-center">
            <h1>Home</h1>
          </div>
        </div>
        <div class="flex-center welcome">
          <h1>Welkom op het Stenden portfolio</h1>
        </div>
        <div class="col-md-4">
          <div class="flex-center img_boxes">
            <img src="img/icon_1.png" alt="">
          </div>
          <div class="flex-center">
            <h4>Eigen portfolio</h4>
          </div>
          <div class="flex-center align-center">
            <p>Door middel van onze website kunnen leerlingen van Stenden hun eigen portfolio maken en bewerken. In dit portfolio kunnen ze verschillende mijlpalen en opdrachten verwerken. </p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="flex-center img_boxes">
            <img src="img/icon_2.png" alt="">
          </div>
          <div class="flex-center">
            <h4>Persoonlijk dashboard</h4>
          </div>
          <div class="flex-center align-center">
            <p>Door middel van onze website kunnen leerlingen van Stenden hun eigen portfolio maken en bewerken. In dit portfolio kunnen ze verschillende mijlpalen en opdrachten verwerken. </p>
          </div>
        </div>
        <div class="col-md-4 margin-btm">
          <div class="flex-center img_boxes">
            <img src="img/icon_3.png" alt="">
          </div>
          <div class="flex-center">
            <h4>Contact opnemen</h4>
          </div>
          <div class="flex-center align-center">
            <p>Door middel van onze website kunnen leerlingen van Stenden hun eigen portfolio maken en bewerken. In dit portfolio kunnen ze verschillende mijlpalen en opdrachten verwerken. </p>
          </div>
        </div>
      </div>
      <!-- einde content -->
      <div class="footer">
        <div class="flex-center footer_text">
          <p>Design: Ramon Drent</p>
          <p>Ontwikkeling: Dominique Netters, Marijn Koel</p>
        </div>
      </div>
  </body>
</html>
