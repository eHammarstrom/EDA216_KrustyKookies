<?php
session_start();

if (!isset($_SESSION['username'])) {
	die(header('location: index.html'));
}

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



		<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
		<script src="sorting/src/tablefilter.js"></script>



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
								 <li><a href="cookies.php">Cookies</a></li>
								 <li><a href="production.php">Production</a></li>
								 <li class="active"><a href="orders.html">Orders</a></li>
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

	   <div id="container">

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
		   </div>

	   </div>

	   <!-- /.carousel -->


	   <!-- Marketing messaging and featurettes
		================================================== -->
		<!-- Wrap the rest of the page in another container to center all the content. -->

		<div class="container marketing">

			<!-- START THE FEATURETTES -->

			<!-- Main jumbotron for a primary marketing message or call to action -->
			<div class="jumbotron">
				<h1>Orders</h1>
				<p>Here you can see all orders, both current and delivered order.</p>
			</div>

			<hr class="featurette-divider">

			<div>
				<div id="jquery-script-menu">
					<div class="jquery-script-center">
						<div class="jquery-script-clear"></div>
					</div>
				</div>
<script>
$(document).ready(function () {

	$('table[name=example-table]').tableFilter({

	//input : "input[type=search]", Default element

	trigger: {

	event: "keyup", //element : "button[name=btn-filtro]"
},

	//timeout: 80,

	sort: true,

	//caseSensitive : false, Default

	callback: function () { /* Callback após o filtro */

	},

	notFoundElement: ".not-found"
});

});
</script>



				<div class="row">
					<div class="col-md-6">
						<h1>Current Orders - Example data</h1>
						<div class="well">
							<p> All current orders are listed below.</p>
						</div>
						<div class="row">
							<div class="col-md-10">
								<input type="search" class="form-control" placeholder="Filter">
							</div>
							<div class="col-md-2">
								<button type="button" class="btn btn-primary btn-block" name="btn-filtro">Search</button>
							</div>
						</div>
					</div>
				</div>

				<hr>

				<div class="row">
					<div class="col-md-12">
						<div class="not-found" style="display: none;">No Result Found</div>

						<table name="example-table" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th data-tsort-type="cookie">Customer</th>
									<th data-tsort-type="number">Order ID</th>
									<th data-tsort-type="address">Address</th>
									<th data-tsort-type="date">Delivery Date</th>
								</tr>
							</thead>

							<tr>
								<td>Bjudkakor AB</td>
								<td>21</td>
								<td>Ystad</td>
								<td>2016-05-10</td>
							</tr>
							<tr>
								<td>Kalaskakor AB</td>
								<td>22</td>
								<td>Trelleborg</td>
								<td>2016-05-10</td>
							</tr>
							<tr>
								<td>Finkakor AB</td>
								<td>23</td>
								<td>Helsingborg</td>
								<td>2016-05-10</td>
							</tr>
							<tr>
								<td>Gastkakor AB</td>
								<td>24</td>
								<td>Hässleholm</td>
								<td>2016-05-10</td>
							</tr>
							<tr>
								<td>Partykakor AB</td>
								<td>25</td>
								<td>Kristianstad</td>
								<td>2016-05-10</td>
							</tr>
							<tr>
								<td>Gastkakor AB</td>
								<td>26</td>
								<td>Hässleholm</td>
								<td>2016-05-10</td>
							</tr>


							</tbody>

						</table>

					</div>

				</div>
			</div>



			<div class="row">
				<div class="col-md-6">
					<h1>Delivered Orders - Example data</h1>
					<div class="well">
						<p> All delivered orders are listed below.</p>
					</div>
					<div class="row">
						<div class="col-md-10">
							<input type="search" class="form-control" placeholder="Filter">
						</div>
						<div class="col-md-2">
							<button type="button" class="btn btn-primary btn-block" name="btn-filtro">Search</button>
						</div>
					</div>
				</div>
			</div>

			<hr>

			<div class="row">
				<div class="col-md-12">
					<div class="not-found" style="display: none;">No Result Found</div>

					<table name="example-table" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th data-tsort-type="cookie">Customer</th>
								<th data-tsort-type="number">Order ID</th>
								<th data-tsort-type="address">Address</th>
								<th data-tsort-type="date">Delivery Date</th>
							</tr>
						</thead>
						<tr>
							<td>Finkakor AB</td>
							<td>1</td>
							<td>Helsingborg</td>
							<td>2016-03-20</td>
						</tr>
						<tr>
							<td>Kaffebrod AB</td>
							<td>2</td>
							<td>Landskrona</td>
							<td>2016-03-20</td>
						</tr>
						<tr>
							<td>Finkakor AB</td>
							<td>3</td>
							<td>Helsingborg</td>
							<td>2016-03-20</td>
						</tr>
						<tr>
							<td>Skanekakor AB</td>
							<td>4</td>
							<td>Perstorp</td>
							<td>2016-03-20</td>
						</tr>
						<tr>
							<td>Partykakor AB</td>
							<td>5</td>
							<td>Kristianstad</td>
							<td>2016-03-20</td>
						</tr>
						<tr>
							<td>Finkakor AB</td>
							<td>6</td>
							<td>Helsingborg</td>
							<td>2016-03-20</td>
						</tr>
						<tr>
							<td>Kaffebrod AB</td>
							<td>7</td>
							<td>Landskrona</td>
							<td>2016-03-20</td>
						</tr>
						<tr>
							<td>Finkakor AB</td>
							<td>8</td>
							<td>Helsingborg</td>
							<td>2016-03-20</td>
						</tr>
						<tr>
							<td>Skanekakor AB</td>
							<td>9</td>
							<td>Perstorp</td>
							<td>2016-03-20</td>
						</tr>
						<tr>
							<td>Partykakor AB</td>
							<td>10</td>
							<td>Kristianstad</td>
							<td>2016-03-20</td>
						</tr>
						<tr>
							<td>Finkakor AB</td>
							<td>11</td>
							<td>Helsingborg</td>
							<td>2016-03-20</td>
						</tr>
						<tr>
							<td>Kaffebrod AB</td>
							<td>12</td>
							<td>Landskrona</td>
							<td>2016-03-20</td>
						</tr>
						<tr>
							<td>Finkakor AB</td>
							<td>13</td>
							<td>Helsingborg</td>
							<td>2016-03-20</td>
						</tr>
						<tr>
							<td>Skanekakor AB</td>
							<td>14</td>
							<td>Perstorp</td>
							<td>2016-03-20</td>
						</tr>
						<tr>
							<td>Partykakor AB</td>
							<td>15</td>
							<td>Kristianstad</td>
							<td>2016-03-20</td>
						</tr>
						<tr>
							<td>Finkakor AB</td>
							<td>16</td>
							<td>Helsingborg</td>
							<td>2016-03-20</td>
						</tr>
						<tr>
							<td>Kaffebrod AB</td>
							<td>17</td>
							<td>Landskrona</td>
							<td>2016-03-20</td>
						</tr>
						<tr>
							<td>Finkakor AB</td>
							<td>18</td>
							<td>Helsingborg</td>
							<td>2016-03-20</td>
						</tr>
						<tr>
							<td>Skanekakor AB</td>
							<td>19</td>
							<td>Perstorp</td>
							<td>2016-03-20</td>
						</tr>
						<tr>
							<td>Partykakor AB</td>
							<td>20</td>
							<td>Kristianstad</td>
							<td>2016-03-20</td>
						</tr>

						</tbody>

					</table>

				</div>

			</div>

<script>
$(function () {
	var i = 1;
	$('#calc:first').find('.input-group-addon').html(i);
	$(document).on('click', '.btn-add', function (e) {
		e.preventDefault();

		var controlForm = $('#calc:first')
			, currentEntry = $(this).parent('.entry:first')
			, newEntry = $(currentEntry.clone()).appendTo(controlForm);
		$(newEntry).find('.input-group-addon').html(++i);

		newEntry.find('input').val('');
		controlForm.find('.entry:not(:last) .btn-add')
			.removeClass('btn-add').addClass('btn-remove')
			.removeClass('btn-success').addClass('btn-danger')
			.html('<span class="glyphicon glyphicon-minus"></span>');
	}).on('click', '.btn-remove', function (e) {
		i--;
		$(this).parent().nextAll('.entry').each(function () {
			$(this).find('.input-group-addon').html($(this).find('.input-group-addon').html() - 1);
		});
		$(this).parents('.entry:first').remove();

		e.preventDefault();
		return false;
	});
});
</script>

			<hr class="featurette-divider">

			<!-- FOOTER -->
			<footer>
				<p class="pull-right"><a href="#">Back to top</a></p>
				<p>&copy; 2016 Krusty Kookies, AB. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
			</footer>
		</div>
		<!-- /.container -->

		<!-- Bootstrap core JavaScript
	  ================================================== -->
	  <!-- Placed at the end of the document so the pages load faster -->
	  <script src="js/jquery.searchable-1.0.0.min.js"></script>
<script>
window.jQuery || document.write('<script src="/assets/js/vendor/jquery.min.js"><\/script>');
</script>
<script src="dist/js/bootstrap.min.js"></script>
<!-- Just to make our placeholder images work. Don't actually copy the next line! -->
<script src="assets/js/vendor/holder.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="assets/js/ie10-viewport-bug-workaround.js"></script>
	 </body>
</html>
