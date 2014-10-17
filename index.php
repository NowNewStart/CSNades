<?php

include 'global.php';

error_reporting(E_ERROR | E_WARNING | E_PARSE);

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CS:GO Smokes and Nades</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/landing-page.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

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
                <a class="navbar-brand" href="index.php">CS:GO Smokes and Nades</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <?php
                    if(isset($_SESSION['username'])) {                        
                    ?>
                    <li>
                        <a href="index.php?page=Intern">Staff Area</a>
                    </li>
                    <li>
                        <a href="index.php?page=AddNade">Add Nade</a>
                    </li>
                    <li>
                        <a href="index.php?page=Logout">Logout</a>
                    </li>
                    <?php
                    }
                    ?>
                    <li>
                        <a href="http://steamcommunity.com/tradeoffer/new/?partner=77337443&token=LHJlb5mV">Donate &#9829;</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Header -->
    <div class="intro-header hidden-xs hidden-sm">

        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-message">
                        <h1>Counter-Strike: Global Offensive</h1>
                        <h3>Smokes and Nades for competitive scene</h3>
                        <hr class="intro-divider">
                        <ul class="list-inline intro-social-buttons">
                            <li>
                                <a href="" class="btn btn-default btn-lg" data-toggle="modal" data-target="#search"><i class="glyphicon glyphicon-search"></i>Search!</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.intro-header -->

    <!-- Page Content -->
    <div class="container" style="padding-top: 40px;">
    <?php
    	if($action == "Search") {
    		$map = $_POST['map'];
    		$popspot = $_POST['popspot'];
    			echo "<div class='row'>"; 

    			if(empty($popspot)) {
    			$q_map = $sql->query("SELECT * FROM nades WHERE nadeMap='".$map."' ORDER BY nadeID DESC");  
    			$header = "<h1>Nades and Smokes on the Map '".$map."'</h1><hr>";    			  				
    			} else {
    			$q_map = $sql->query("SELECT * FROM nades WHERE nadeMap='".$map."' AND nadePopSpot='".$popspot."' ORDER BY nadeID DESC");
    			$header = "<h1>Nades and Smokes on the Map '".$map."' and the Pop Spot '".$popspot."'</h1><hr>";
    			}

    			if(empty($map) || empty($popspot)) {
    			$q_map = $sql->query("SELECT * FROM nades ORDER BY nadeID DESC");  	
    			$header = "<h1>All Listed Smokes</h1><hr>";
    			}

    			echo $header;
    			while($row = mysqli_fetch_object($q_map)) {
    		    if($row->working == 1) { $working = "YES"; } else { $working = "NO"; }
    			echo "<div class='col-lg-3'>";
    			echo "<h3><a target='_blank' href='".$row->nadeImgurLink."'>".$row->nadeTitle."</a></h3><br />";
    			echo "<h3><small>Map: ".$row->nadeMap." &bull; Posted: ".$row->timestamp." &bull; Working: ".$working."</small></h3>";
    			echo "</div>";
    			}
    			echo "</div>";
    	} else {
    		if(empty($page)) {
    			?>
    			<h1>Maps</h1>
    			<hr>
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
    			</div>    			
                <div class="row">
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
                </div>
                <div class="row">
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
                </div>
    			<?php

    		} elseif($page == "StaffLogin") {
    			?>
    			<h1>Staff Login</h1>
    			<hr>
    			<?php
    			if($action == "Perform") {
    			$username = isset($_POST['username']) ? $_POST['username'] : false;
    			$password = isset($_POST['password']) ? $_POST['password'] : false;
    			if(empty($username) || empty($password)) {
    				echo "<div class='alert alert-danger'>You have to enter an username and a password.</div>";
    			} else {
    				$num = mysqli_num_rows($sql->query("SELECT * FROM staff WHERE username='".$username."';"));
    				if($num == 0) {
    					echo "<div class='alert alert-danger'>There is no user with this username.</div>";
    				} else {
    					$hash = hash('whirlpool',$password);
    					$db = $sql->query("SELECT * FROM staff WHERE username='".$username."'")->fetch_object();
    					if($hash != $db->password) {
    						echo "<div class='alert alert-danger'>Your password is wrong.</div>";
    					} else {
                            $_SESSION['username'] = $username;
    						echo "<script>location.href='index.php?page=Intern';</script>";
                            echo "<noscript>It looks like you don't have JS activated. <a href='index.php?page=Intern'>Click here to get forwarded</a></noscript>";
    					}
    				}
    			}
    		}
    		?>
    	<form role="form" method="POST" action="index.php?page=StaffLogin&action=Perform">
    				<div class="form-group">
    					<label for="username">Username</label>
    					<input type="text" name="username" placeholder="Username" class="form-control">
    				</div>
    				<div class="form-group">
    					<label for="password">Password</label>
    					<input type="password" name="password" placeholder="Password" class="form-control">
    				</div>
    	    <input type="submit" value="Login" class="btn btn-primary" />
    	</form>    		
    		<?php
    		} elseif($page == "Intern") {
                if(!isset($_SESSION['username'])) {
                            echo "<script>location.href='index.php';</script>";
                            echo "<noscript>You are not allowed to access this page, and you don't have JS activated. <a href='javascript:history.back(0);'>Click here to get back</a></noscript>";                    
                } else {
                ?>
                <center>
                    <div class="row">
                        <div class="col-lg-12">
                        <h2><a href="index.php?page=AddNade" style="text-decoration: none;">Add Nade</a></h2>
                        </div>

                    </div>
                </center>
                <?php
            }
            } elseif($page == "AddNade") {
                if(!isset($_SESSION['username'])) {
                    echo "<script>location.href='index.php';</script>";
                    echo "<noscript>You are not allowed to access this page, and you don't have JS activated. <a href='javascript:history.back(0);'>Click here to get back</a></noscript>";                          
                } else {            
                ?>
                    <h1>Add a Nade</h1>
                    <hr />
                    <br />

                    <?php
                    if($action == "Add") {
                        $nadeTitle     = isset($_POST['nadeTitle'])     ? $_POST['nadeTitle']     : false;
                        $nadeMap       = isset($_POST['nadeMap'])       ? $_POST['nadeMap']       : false;
                        $nadePopSpot   = isset($_POST['nadePopSpot'])   ? $_POST['nadePopSpot']   : false;
                        $nadeImgurLink = isset($_POST['nadeImgurLink']) ? $_POST['nadeImgurLink'] : false;   
                        if(empty($nadeTitle) || empty($nadeMap) || empty($nadePopSpot) || empty($nadeImgurLink)) {
                            echo "<div class='alert alert-danger'>You have to complete the form.</div>";
                        } else {
                            // v this should be replaced by preg_match()
                            if(!strstr($nadeImgurLink,"imgur.com/")) {
                                echo "<div class='alert alert-danger'>This is not an ImGur link.</div>";
                            } else {
                                $timestamp = date("Y-m-d");
                                $sql->query("INSERT INTO nades (nadeTitle,nadeMap,nadePopSpot,nadeImgurLink,timestamp,working) VALUES ('".$nadeTitle."','".$nadeMap."','".$nadePopSpot."','".$nadeImgurLink."','".$timestamp."',1)");
                                echo "<div class='alert alert-success'>Thanks for adding the Nade!</div>";
                            }
                        }
                    }
                    ?>

                    <form action="index.php?page=AddNade&action=Add" method="POST" role="form">
                        <div class="form-group">
                            <label for="nadeTitle">Nade Title</label>
                            <input type="text" name="nadeTitle" placeholder="Nade Title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="nadeMap">Nade Map</label>
                            <select class="form-control" name="nadeMap">
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
                            <label for="nadePopSpot">Nade Pop Spot</label>
                            <select class="form-control" name="nadePopSpot">
                                <option></option>
                                <option>A site</option>
                                <option>B Site</option>
                                <option>Mid</option>
                                <option>Other</option>
                            </select>   
                        </div> 
                        <div class="form-group">
                            <label for="nadeImgurLink">Nade ImGur Link</label>
                            <input type="text" name="nadeImgurLink" placeholder="Nade ImGur Link" class="form-control">
                        </div>  
                        <div class="form-group">
                            <input type="submit" value="Add Nade" class="btn btn-primary">
                        </div>                    
                    </form>
                <?php
            }
            } elseif($page == "Logout") {
                if(!isset($_SESSION['username'])) {
                    echo "<script>location.href='index.php';</script>";
                    echo "<noscript>You are not allowed to access this page, and you don't have JS activated. <a href='javascript:history.back(0);'>Click here to get back</a></noscript>";                          
                } else {
                    unset($_SESSION['username']);
                    echo "<script>location.href='index.php';</script>";
                    echo "<noscript>You don't have JS activated. <a href='index.php'>Click here to get forwarded</a></noscript>"; 
                }
            } elseif($page == "Maps") {
                $map = isset($_GET['map']) ? $_GET['map'] : false;
               	switch($map) {
               		default:
               			$map_check = "";
               		break;
               		case "Dust2":
               			$map_check = "Dust 2";
               		break;
               		case "Nuke":
               			$map_check = "Nuke";
               		break;
               		case "Mirage":
               			$map_check = "Mirage";
               		break;
               		case "Inferno":
               			$map_check = "Inferno";
               		break;
               		case "Cobblestone":
               			$map_check = "Cobblestone";
               		break;
               		case "Overpass":
               			$map_check = "Overpass";
               		case "Cache":
               			$map_check = "Cache";
               		break;
               		case "Train":
               			$map_check = "Train";
               		break;
               		case "NewSeason":
               			$map_check = "New Season";
               		break;
               		case "OldSeason":
               			$map_check = "Old Season";
               		break;
               		case "Sparity":
               			$map_check = "Sparity";
               		break;

               	}

    			if(empty($map)) {
    			$q_map = $sql->query("SELECT * FROM nades ORDER BY nadeID DESC");  	
    			$header = "<h1>All Listed Smokes</h1><hr>";
    			} else {               	
               	$q_map = $sql->query("SELECT * FROM nades WHERE nadeMap='".$map_check."' ORDER BY nadeID DESC");  
               	}

               	while($row = mysqli_fetch_object($q_map)) {
    		    	if($row->working == 1) { $working = "YES"; } else { $working = "NO"; }
    				echo "<div class='col-lg-3'>";
    				echo "<h3><a target='_blank' href='".$row->nadeImgurLink."'>".$row->nadeTitle."</a></h3><br />";
    				echo "<h3><small>Map: ".$row->nadeMap." &bull; Posted: ".$row->timestamp." &bull; Working: ".$working."</small></h3>";
    				echo "</div>";               		
               	}
            }
        }    
    ?>
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
        The <em>Counter-Strike: Global Offensive Nades and Smoke</em> Website is mainly made by <a href="http://steamcommunity.com/id/imnns/">NowNewStart</a> and its contributors.<br />
        <br />
        <strong>Staff members who are helping to have all smokes in the system:</strong><br />
        <a href="http://steamcommunity.com/id/imnns/">NowNewStart</a> <br />
        <a href="http://steamcommunity.com/profiles/76561198071213385/">falc0n</a><br />

        <br />

        <strong>Idea by <a href="http://reddit.com/u/gas4u">Gas4U</a></strong>
        <br /><br />

        <a href="http://blog.counter-strike.net"><em>Counter-Strike: Global Offensive</em></a> is made by Valve and Hidden Path Entertainment.

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
    </div>
   </div>
</div>

    <!-- jQuery Version 1.11.0 -->
    <script src="js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
