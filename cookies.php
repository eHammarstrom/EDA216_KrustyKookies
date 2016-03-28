<?php
session_start();

if (!isset($_SESSION['username'])) {
	die(header('location: index.html'));
}

require_once('php/database.php');
$database = new Database();
$query = 'SELECT * FROM cookies';
$cookies = $database->executeQuery($query);

?>




<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<meta name="description" content="">
		<meta name="author" content="">
        <link rel="icon" href="images/cookie1.png">

		<title>Krusty Kookies</title>

		<!-- Bootstrap core CSS -->
		<link href="dist/css/bootstrap.min.css" rel="stylesheet">

		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		<link href="assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

		<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
		<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
		<script src="assets/js/ie-emulation-modes-warning.js"></script>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

		<!-- Custom styles for this template -->
		<link href="css/carousel.css" rel="stylesheet">
	</head>
	<!-- NAVBAR
	 ================================================== -->
	 <body>
		 <div class="navbar-wrapper">
			 <div class="container">

				 <nav class="navbar navbar-inverse navbar-static-top navbar-custom">
					 <div class="container">
						 <div class="navbar-header">
							 <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
								 <span class="sr-only">Toggle navigation</span>
								 <span class="icon-bar"></span>
								 <span class="icon-bar"></span>
								 <span class="icon-bar"></span>
							 </button>
							 <a class="navbar-brand" href="home.php">Krusty Kookies</a>
						 </div>
						 <div id="navbar" class="navbar-collapse collapse">
							 <ul class="nav navbar-nav">
								 <li><a href="home.php">Home</a></li>
								 <li class="active"><a href="#">Cookies</a></li>
								 <li><a href="production.php">Production</a></li>
								 <li><a href="orders.php">Orders</a></li>
								 <li><a href="contact.php">Contact</a></li>
							 </ul>
							 <ul class="nav navbar-nav navbar-right">
								 <li><a href="php/logout.php">Logout</a></li>
							 </ul>
						 </div>
					 </div>
				 </nav>

			 </div>
		 </div>


		 <!-- Carousel
	   ================================================== -->
	   <div id="myCarousel" class="carousel slide" data-ride="carousel">
		   <!-- Indicators -->
		   <ol class="carousel-indicators">
			   <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			   <li data-target="#myCarousel" data-slide-to="1"></li>
			   <li data-target="#myCarousel" data-slide-to="2"></li>
		   </ol>
		   <div class="carousel-inner" role="listbox">
			   <div class="item active">
				   <img class="first-slide" src="images/cookie1.png" alt="First slide">
				   <div class="container">
					   <div class="carousel-caption">
						   <h1>Example headline.</h1>
						   <!--              <p>Note: If you're viewing this page via a <code>file://</code> URL, the "next" and "previous" Glyphicon buttons on the left and right might not load/display properly due to web browser security rules.</p>-->
						   <!--              <p><a class="btn btn-lg btn-primary" href="#" role="button" background-color>Sign up today</a></p>-->
					   </div>
				   </div>
			   </div>
			   <div class="item">
				   <img class="second-slide" src="images/cookie1.png" alt="Second slide">
				   <div class="container">
					   <div class="carousel-caption">
						   <h1>Another example headline.</h1>
						   <!--              <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>-->
						   <!--              <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>-->
					   </div>
				   </div>
			   </div>
			   <div class="item">
				   <img class="third-slide" src="images/cookie1.png" alt="Third slide">
				   <div class="container">
					   <div class="carousel-caption">
						   <h1>One more for good measure.</h1>
						   <!--              <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>-->
						   <!--              <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>-->
					   </div>
				   </div>
			   </div>
		   </div>
		   <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
			   <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			   <span class="sr-only">Previous</span>
		   </a>
		   <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
			   <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			   <span class="sr-only">Next</span>
		   </a>
	   </div><!-- /.carousel -->

	   <div class="container cookies">


		   <!-- Main jumbotron for a primary marketing message or call to action -->
		   <div class="jumbotron">
			   <h1>Cookies</h1>
			   <p>Here you can find our magical recipes.</p>
		   </div>    

<?php

foreach ($cookies as $cookie) {
	$query = 'SELECT * FROM cookieingredients WHERE cookiename = ?';
	$ingredients = $database->executeQuery($query, array($cookie['cookieName']));
    
    print '<hr class="featurette-divider">';
	print '<h3>' . $cookie['cookieName'] . ' <small>Best choice.</small></h3>';
	print '<table class="table table-striped">';
	print '<thead>';
	print '<tr>';
	print '<th>Ingredient</th>';
	print '<th>Amount</th>';
	//print '<th>Unit</th>';
	print '</tr>';
	print '</thead>';
	print '<tbody>';
	foreach ($ingredients as $ingredient) {
		print '<tr>';
		print '<td>' . $ingredient['ingredientName'] . '</td>';
		print '<td>' . $ingredient['ingredientAmount'] . ' ' . $ingredient['unit'] . '</td>';
		//print '<td>' . $ingredient['unit'] . '</td>';
		print '</tr>';
	}
	print '</tbody>';
	print '</table>';
}

print '<hr class="featurette-divider">';           
           
?>

		  <!-- EXAMPLE FOR FUTURE USE
		<table class="table table-striped">
		<thead>
		<tr>
		<th>#</th>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Username</th>
		</tr>
		</thead>
		<tbody>
		<tr>
		<th scope=row>1</th>
		<td>Mark</td>
		<td>Otto</td>
		<td>@mdo</td>
		</tr>
		<tr>
		<th scope=row>2</th>
		<td>Jacob</td>
		<td>Thornton</td>
		<td>@fat</td>
		</tr>
		<tr>
		<th scope=row>3</th>
		<td>Larry</td>
		<td>the Bird</td>
		<td>@twitter</td>
		</tr>
		</tbody>
		</table>
		  -->

		  <!-- FOOTER -->
		  <footer>
			  <p class="pull-right"><a href="#">Back to top</a></p>
			  <p>&copy; 2016 Krusty Kookies, AB. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
		  </footer>
	   </div><!-- /.container -->


	   <!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="/assets/js/vendor/jquery.min.js"><\/script>')</script>
		<script src="dist/js/bootstrap.min.js"></script>
		<!-- Just to make our placeholder images work. Don't actually copy the next line! -->
		<script src="assets/js/vendor/holder.min.js"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		<script src="assets/js/ie10-viewport-bug-workaround.js"></script>
	 </body>
</html>
