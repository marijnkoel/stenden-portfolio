
      <!-- navbar -->
      <div class="navbar2">
        <div class="top-left links">
          <a href="{{ url('/') }}">Home</a>
          
          @if(!Auth::guest())
            @if( Auth::user()->user_level < 2 )
              {{-- Docenten en SLB'ers --}}
              <a href="{{ url('/users') }}">Gebruikers</a>
              <a href="{{ url('/portfolios') }}">Portfolios</a>
            @else
              {{-- Studenten --}}
              <a href="{{ url('/portfolios/' . Auth::user()->portfolio->id) }}">Portfolio</a>
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