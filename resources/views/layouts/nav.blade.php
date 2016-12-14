      <!-- einde navbar -->
      <nav class="navbar navbar-default">
        <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Stenden Portfolio</a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right links">
              @if(!Auth::guest())
                @if( Auth::user()->user_level < 2 )
                  {{-- Docenten en SLB'ers --}}
                  <li><a href="{{ url('/users') }}">Gebruikers</a></li>
                  <li><a href="{{ url('/portfolios') }}">Portfolios</a></li>
                @else
                  {{-- Studenten --}}
                  <li><a href="{{ url('/portfolios/' . Auth::user()->portfolio->id) }}">Portfolio</a></li>
                @endif
              @endif
            <li><a href="{{ url('/contact') }}">Contact</a></li>
            @if (Auth::guest())

              <li>  <a href="{{ url('/login') }}">Login</a></li>
              <li>  <a href="{{ url('/register') }}">Register</a></li>

            @else

              <li>  <a>{{ Auth::user()->name }}</a></li>
              <li>  <a href="{{ url('/logout') }}"
                        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                        Uitloggen
                </a></li>

                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                </form>

            @endif
              </div>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container -->
      </nav><!-- /.navbar -->
