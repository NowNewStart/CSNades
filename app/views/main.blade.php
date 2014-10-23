<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://nades.nownewstart.net/css/landing-page.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <title>CS:GO Smokes and Nades</title>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">CSNades</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="http://steamcommunity.com/tradeoffer/new/?partner=77337443&token=LHJlb5mV">Donate <span class="glyphicon glyphicon-heart"></span></a>
                    </li>
                </ul>
            </div> <!-- /.navbar-collapse -->
        </div> <!-- /.container -->
    </nav>
    <!-- Header -->
    <div class="intro-header hidden-xs hidden-sm">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-message">
                        <h1>CSNades</h1>
                        <h3>Smokes and Nades for the competitive scene</h3>
                        <hr class="intro-divider">
                        <ul class="list-inline intro-social-buttons">
                            <li>
                                <a href="" class="btn btn-default btn-lg" data-toggle="modal" data-target="#search"><i class="glyphicon glyphicon-search"></i>Search!</a>
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
        <!-- 
        <div class="row">
            <div class="col-lg-3">
                <a href="index.php?page=Maps&map=Dust2">
                <img src="img/maps/dust2.png" alt="Dust 2" class="img-responsive hidden-xs hidden-sm"/>
                <h3>Dust 2</h3>
                </a>
            </div>
            <div class="col-lg-3">
                <a href="index.php?page=Maps&map=Nuke">
                <img src="img/maps/nuke.jpg" alt="Nuke" class="img-responsive hidden-xs hidden-sm" />
                <h3>Nuke</h3>
                </a>
            </div>
            <div class="col-lg-3">
                <a href="index.php?page=Maps&map=Mirage">
                <img src="img/maps/mirage.png" alt="Mirage" class="img-responsive hidden-xs hidden-sm" />
                <h3>Mirage</h3>
                </a>
            </div>
            <div class="col-lg-3">
            <a href="index.php?page=Maps&map=Inferno">
            <img src="img/maps/inferno.png" alt="Inferno" class="img-responsive hidden-xs hidden-sm" />
            <h3>Inferno</h3>
            </a>
            </div>
            <div class="col-lg-3">
                <a href="index.php?page=Maps&map=Cobble">
                <img src="img/maps/cobble.png" alt="Cobblestone" class="img-responsive hidden-xs hidden-sm" />
                <h3>Cobblestone</h3>
                </a>
            </div>                
            <div class="col-lg-3">
                <a href="index.php?page=Maps&map=Overpass">
                <img src="img/maps/overpass.png" alt="Overpass" class="img-responsive hidden-xs hidden-sm" />
                <h3>Overpass</h3>
                </a>
            </div>
            <div class="col-lg-3">
                <a href="index.php?page=Maps&map=Cache">
                <img src="img/maps/cache.png" alt="Cache" class="img-responsive hidden-xs hidden-sm" />
                <h3>Cache</h3>
                </a>
            </div>
            <div class="col-lg-3">
                <a href="index.php?page=Maps&map=Train">
                <img src="img/maps/train.png" alt="Train" class="img-responsive hidden-xs hidden-sm" />
                <h3>Train</h3>
                </a>
            </div>
            <div class="col-lg-3">
                <a href="index.php?page=Maps&map=OldSeason">
                <img src="img/maps/season_old.jpg" alt="Old Season" class="img-responsive hidden-xs hidden-sm" />
                <h3>Old Season</h3>
                </a>
            </div>                
            <div class="col-lg-3">
                <a href="index.php?page=Maps&map=NewSeason">
                <img src="img/maps/season_new.jpg" alt="New Season" class="img-responsive hidden-xs hidden-sm" />
                <h3>New Season</h3>
                </a>
            </div>
            <div class="col-lg-3">
                <a href="index.php?page=Maps&map=Sparity">
                <img src="img/maps/sparity.jpg" alt="Sparity" class="img-responsive hidden-xs hidden-sm" />
                <h3>Sparity</h3>
                </a>
            </div> 
        </div>-->
    </div>
    <footer style="padding-top: 100px;">
        <div class="container" >
            <div class="row">
                <div class="col-lg-12">
                    <ul class="list-inline">
                        <li>
                            <a href="#home">Home</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href=""  data-toggle="modal" data-target="#about">About</a>
                        </li>
                    </ul>
                    <p class="copyright text-muted small">Copyright &copy; 2014 NowNewStart and contributors </p>
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
                            <option></option>
                            <option>Dust 2</option>
                            <option>Nuke</option>
                            <option>Mirage</option>
                            <option>Inferno</option>
                            <option>Cobblestone</option>
                            <option>Overpass</option>
                            <option>Cache</option>
                            <option>Train</option>
                            <option>Old Season</option>
                            <option>New Season</option>
                            <option>Sparity</option>
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
                    The <em>Counter-Strike: Global Offensive Nades and Smoke</em> Website is mainly made by <a href="http://steamcommunity.com/id/imnns/">NowNewStart</a> and its contributors.<br>
                    <br>
                    <strong>Staff members who are helping to have all smokes in the system:</strong>
                    <br>
                    <a href="http://steamcommunity.com/id/imnns/">NowNewStart</a> <br>
                    <a href="http://steamcommunity.com/profiles/76561198071213385/">falc0n</a><br>
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

    <!-- jQuery Version 1.11.0 -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <!-- Google Analystics -->
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-51942617-2', 'auto');
        ga('send', 'pageview');
    </script>
</body>
</html>
