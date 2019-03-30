<!DOCTYPE html>
<?php
session_start();
if(!empty($_SESSION)){
$username = $_SESSION["username"];
}
?>

<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><? echo $username." "?> PlaybeforeyouPay</title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/playbeforeyoupay.css">
  <link href="https://fonts.googleapis.com/css?family=Courgette" rel="stylesheet">
        <script src ="javascript/librarysongs.js"></script>
</head>
<body>
<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
<div class="container">
  <a class="navbar-brand" href="#"></i>Play before you Pay!</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <!-- changed the search box into a form to use the Get Method -->
 <form method="POST">
        <input type="text" placeholder="Search..." name="view" id="view">
<!--        <div id="display"></div>-->
        <input type="submit" />
 </form>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
		<li class="nav-item dropdown">
        	<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Hiya <? echo " " . $username ." "?> - My playlist(s)
        	</a>
       	 <div class="dropdown-menu" aria-labelledby="navbarDropdown">
       	 	<a class="dropdown-header">Playlist 1</a>
       	   <div class="dropdown-divider"></div>
      	    <a class="dropdown-item" href="#">View all playlists</a>
      	  </div>
      </li>      
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
          <a class="btn btn-default btn-lg" href='../Landingpage.php'>Logout <i class="fas fa-user"></i></a>
      </li>
    </ul>

  
</div>
</nav>



<div class="container">
	<div class="row justify-content-md-center">
<!--        <div class="col col-lg-12"></div>-->
<div>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Artist</th>
            <th scope="col">Song</th>
            <th scope="col">Genre</th>
            <th scope="col">Save to playlist</th>
          </tr>
        </thead>
        <tbody>
                            <br><br>
                        <?php                       
            const DB_DSN = 'mysql:host=localhost; dbname=song_library';
            const DB_USER = 'root';
            try {
                $pdo = new PDO(DB_DSN, DB_USER);
            }   catch (PDOException $e) {
                    DIE($e->GetMessage());
            }
            
            if (empty($_POST)){
                print "<br> Leave search-bar blank and press submit to show all songs";
            } else {
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $pdo->prepare(
                    "select artists.ArtistName as artist_name, songs.SongName, genres.GenreName as genre_name from songs
                                   join artists on songs.ArtistID = artists.ArtistID
                                   join genres on songs.GenreID = genres.GenreID
                                   order by songs.ArtistID;"
                );
                
                try {
                        $stmt->execute($_POST);
                    }   catch (PDOException $e) {
                        echo $e->getMessage();
                        $error = $e->errorInfo();
                        die();
                    }
                    
                $searchResults = $stmt->fetchAll();
                if (count($searchResults) > 0) {  
                  foreach ($searchResults as $song) {
                    print "<tr>"
                            . "<td>" . $song['artist_name'] . "</td>"
                            . "<td>" . $song['SongName'] . "</td>"
                            . "<td>" . $song['genre_name'] . "</td>"
                            . "<td>" . '<button><i class="fas fa-plus"></i></button>' . "</td>"
                        . "</tr>";
                  }
                } else {
                    print "<tr>" . "<td>" . "no songs with the search above" . "</td>" . "</tr>";
                }               
            }
            
                        ?>
        </tbody>
        </table>
</div>
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