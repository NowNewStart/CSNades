<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/landing-page.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <title>CS:GO Smokes and Nades</title>
</head>
<body>
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">CSNades</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    @if ($user)
                    <!-- <li class="visible-xs">
                        <a href="{{ action('UsersController@showProfile') }}">Welcome, {{ $user->username }}!</a>
                    </li> -->
                    <li class="dropdown visible-xs">
                        @include('partials.authenticated-menu')
                    </li>
                    @endif
                    <li>
                        <a href="{{ action('MapsController@showAllMaps') }}">Browse Maps</a>
                    </li>
                    <li>
                        <a href="{{ action('NadesController@showNadeForm') }}">Add Nade</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="#" title="Search"><span class="visible-xs">Search</span><span class="hidden-xs glyphicon glyphicon-search"></span></a>
                    </li>
                    <li>
                        <a href="http://steamcommunity.com/tradeoffer/new/?partner=77337443&token=LHJlb5mV" title="Donate"><span class="visible-xs">Donate</span> <span class="hidden-xs glyphicon glyphicon-heart"></span></a>
                    </li>
                    @if ($user)
                    <!-- <li class="hidden-xs">
                        <a href="{{ action('UsersController@showProfile') }}" title="Profile">Welcome, {{ $user->username }}!</a>
                    </li> -->
                    <li class="visible-xs">
                        <a href="{{ action('UsersController@logout') }}">Logout</a>
                    </li>
                    <li class="dropdown hidden-xs">
                        @include('partials.authenticated-menu')
                    </li>
                    @else
                    <li>
                        <a href="{{ action('UsersController@showLoginForm') }}">Login</a>
                    </li>
                    @endif
                    <!-- <li class="hidden-xs">
                        <a href="http://steamcommunity.com/tradeoffer/new/?partner=77337443&token=LHJlb5mV">Donate <span class="glyphicon glyphicon-heart"></span></a>
                    </li> -->
                </ul>
            </div> <!-- /.navbar-collapse -->
        </div> <!-- /.container -->
    </nav>
    <!-- Header -->
    <div class="intro-header hidden-xs hidden-sm">
        <div class="container">
            <div class="row">
                @if(Session::has('flashDanger'))
                <div class="col-xs-12">
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        {{ Session::get('flashDanger') }}
                    </div>
                </div>
                @endif

                @if(Session::has('flashInfo'))
                <div class="col-xs-12">
                    <div class="alert alert-info">
                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        {{ Session::get('flashInfo') }}
                    </div>
                </div>
                @endif

                @if(Session::has('flashSuccess'))
                <div class="col-xs-12">
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        {{ Session::get('flashSuccess') }}
                    </div>
                </div>
                @endif
                <div class="col-lg-12">
                    <div class="intro-message">
                        <h1>CSNades</h1>
                        <h3>Smokes and Nades for the competitive scene</h3>
                        <hr class="intro-divider">
                        <ul class="list-inline intro-social-buttons">
                            <li>
                                <a href="#" class="btn btn-default btn-lg" data-toggle="modal" data-target="#search"><i class="glyphicon glyphicon-search"></i>Search!</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div> <!-- /.container -->
    </div> <!-- /.intro-header -->
    <!-- Page Content -->
    <div class="container" style="padding-top: 40px;">
        <h1>{{ $heading }}</h1>
        <hr>
        @yield('content')
    </div>
    <footer style="padding-top: 100px;">
        <div class="container" >
            <div class="row">
                <div class="col-lg-12">
                    <ul class="list-inline">
                        <li>
                            <a href="/">Home</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="#"  data-toggle="modal" data-target="#about">About</a>
                        </li>
                    </ul>
                    <!-- <p class="copyright text-muted small">Copyright &copy; 2014 NowNewStart and contributors </p> -->
                </div>
            </div>
        </div>
    </footer>
    <!-- Modals -->
    <div class="modal fade" id="search" tabindex="-1" role="dialog" aria-labelledby="search" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="meinModalLabel">Search</h4>
                </div>
                <form role="form" action="index.php?action=Search" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                        <label for="map">Map</label>
                        <select class="form-control" name="map">
                            <option>Select...</option>
                            @foreach($maps as $map)
                            <option value="{{ $map->slug }}">{{ $map->name }}</option>
                            @endforeach;
                        </select>
                        </div>
                        <div class="form-group">
                            <label for="popspot">Pop Spot</label>
                            <select class="form-control" name="popspot">
                                <option></option>
                                <option>A site</option>
                                <option>B Site</option>
                                <option>Mid</option>
                                <option>Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Search</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>        
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="about" tabindex="-1" role="dialog" aria-labelledby="about" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="meinModalLabel">About</h4>
                </div>
                <div class="modal-body">
                    The <em>Counter-Strike: Global Offensive Nades and Smoke</em> Website is mainly made by <a href="http://steamcommunity.com/id/imnns/">NowNewStart</a>, <a href="http://steamcommunity.com/id/fatboyxpc">FatBoyXPC</a> and contributors.<br>
                    <br>
                    <strong>Staff members who are helping to have all smokes in the system:</strong>
                    <br>
                    <a href="http://steamcommunity.com/id/imnns/">NowNewStart</a>
                    <br>
                    <a href="http://steamcommunity.com/id/fatboyxpc">FatBoyXPC</a>
                    <br>
                    <a href="http://steamcommunity.com/profiles/76561198071213385/">falc0n</a>
                    <br>
                    <br>
                    <strong>Idea by <a href="http://reddit.com/u/gas4u">Gas4U</a></strong>
                    <br>
                    <br>
                    <a href="http://blog.counter-strike.net"><em>Counter-Strike: Global Offensive</em></a> is made by Valve and Hidden Path Entertainment.
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-56023761-1', 'auto');
        ga('send', 'pageview');
    </script>
</body>
</html>
