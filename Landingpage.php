<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PlaybeforeyouPay</title>
        <?php
        //this checks if any session is started and logs the user out
        session_start();
        //clear session
        session_unset();
        //destroy session
        session_destroy();
        //attempted autoloader
        spl_autoload_register(function ($classname) {
    $className = str_replace('\\', DIRECTORY_SEPARATOR, $classname);
    include "$className.php";
    });

    use \classes\users\{user, admin, cutomer};
    use \classes\{library, playlist, song};
        ?>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="design/css/playbeforeyoupay.css">
        <link href="https://fonts.googleapis.com/css?family=Courgette" rel="stylesheet">
        <style>
            body {
                background-image: url(https://images.unsplash.com/photo-1521192389986-637ffe547ee0?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=182b724a2b67ad1fe2c0a33dba9c6d66&auto=format&fit=crop&w=753&q=80);
            }
        </style>

</head>

<div class="container">
	<div class="row justify-content-md-center">
		<div class="col col-lg-12"></div>
			<div id="content">
				<h1>Play before you pay!</h1>
				<h3>Not the cat, the music &hearts; </h3>
				<hr>
<!-- the paragraph below only displays when the user is not logged in-->
                                 <p> <? if(empty($_SESSION)){
                echo "Hello guest - please log in or sign up!";
                } ?> </p>
                                <a class="btn btn-default btn-lg" href='design/loginpage.php'>Login </a>
                                <a class="btn btn-default btn-lg" href='design/signuppage.php'>Sign up</a>
			</div>
	</div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>

</body>
</html>