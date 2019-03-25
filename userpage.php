<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PlaybeforeyouPay</title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="playbeforeyoupay.css">
  <link href="https://fonts.googleapis.com/css?family=Courgette" rel="stylesheet">
</head>
<body>

<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
<div class="container">
  <a class="navbar-brand" href="#"></i>Play before you Pay!</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <!-- changed the search box into a form to use the Get Method -->
 <form method="GET">
<input type="text" placeholder="Search.." name="method">
<input type="submit" />
 </form>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
<!--       <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li> -->
		<li class="nav-item active"> <a class="nav-link" href="#">Advanced search <span class="sr-only">(current)</span></a></li>
		<li class="nav-item dropdown">
        	<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> My playlist(s)
        	</a>
       	 <div class="dropdown-menu" aria-labelledby="navbarDropdown">
       	 	<h6 class="dropdown-header">Playlist 1</h6>
      	    <a class="dropdown-item" href="#"><i class="fab fa-facebook-square"></i></a>
      	    <a class="dropdown-item" href="#"><i class="fab fa-instagram"></i></a>
      	    <a class="dropdown-item" href="#"><i class="fab fa-twitter"></i></a>
       	   <div class="dropdown-divider"></div>
      	    <a class="dropdown-item" href="#">View all playlists</a>
      	  </div>
      </li>      
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <button type="submit" class="nav-link" href="#">Logout <i class="fas fa-user"></i></a>
      </li>
    </ul>

  </div>
</div>
</nav>



<div class="container">
	<div class="row justify-content-md-center">
		<div class="col col-lg-12"></div>
			<div id="content">
                      <!-- code for showing search in new content box-->
                        <div id="search">
                            <br><br>
                        <?php 
                        include 'songsarray.php';
                           
                        if(isset($_GET['method'])){
                        if(array_key_exists($_GET['method'], $search)){
                            echo $search[$_GET['method']];
                        }
                        else {
                            echo 'Cannot find data';
                        }
                        }  
                        ?>
                        </div>
			</div>
	</div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>

</body>
</html>