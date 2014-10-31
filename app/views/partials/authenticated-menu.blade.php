                <a href="http://beta.nownewstart.net/#" class="dropdown-toggle" data-toggle="dropdown">Welcome, {{{ Auth::user()->username}}}! <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li>
                    <a href="{{ action('UsersController@showProfile') }}" title="Profile">Profile</a>
                  </li>
                  @if ($user->is_admin)
                  <li>
                      <a href="{{ action('MapsController@showMapForm') }}">Add Map</a>
                  </li>
                  @endif
                  @if ($user->is_mod)
                  <li>
                      <a href="{{ action('NadesController@showUnapprovedNades') }}}">Unapproved Nades</a>
                  </li>
                  @endif
                  <li>
                    <a href="http://beta.nownewstart.net/nades/unapproved%7D">Unapproved Nades</a>
                  </li>
                  <li class="hidden-xs">
                      <a href="{{ action('UsersController@logout') }}">Logout</a>
                  </li>
                </ul>
