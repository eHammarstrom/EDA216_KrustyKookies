<?php
session_start();

if (!isset($_SESSION['username'])) {
	die(header('location: index.html'));
}

require_once('php/database.php');
$database = new Database();
$query = 'SELECT * FROM pallets';
$pallets = $database->executeQuery($query);

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
    <link rel="icon" href="../../favicon.ico">

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
              <a class="navbar-brand" href="#">Krusty Kookies</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li class="active"><a href="home.html">Home</a></li>
                <li><a href="cookies.php">Cookies</a></li>
                <li><a href="production.php">Production</a></li>
                <li><a href="#orders">Orders</a></li>
                <li><a href="#contact">Contact</a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li role="separator" class="divider"></li>
                    <li class="dropdown-header">Nav header</li>
                    <li><a href="#">Separated link</a></li>
                    <li><a href="#">One more separated link</a></li>
                  </ul>
                </li>
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
        <h1>Production</h1>
        <p>You can search, create and block pallets. Here you are the source of power.</p>
      </div>
        
    <div>   
      <div id="jquery-script-menu">
        <div class="jquery-script-center">
            <div class="jquery-script-clear"></div>
            </div>
        </div>
		<script>
			$(document).ready(function() {

				$('table[name=example-table]').tableFilter({
				
					//input : "input[type=search]", Default element
					
					trigger : {
					
						event 	: "keyup",
						//element : "button[name=btn-filtro]"
					},

					//timeout: 80,

					sort : true,

					//caseSensitive : false, Default

					callback : function() { /* Callback após o filtro */

					},
					
					notFoundElement : ".not-found"
				});

			});


		</script>
	
       
      
        <div class="row" style="margin-top:3%">	
			<div class="col-md-6">
				<h1>Available Pallets</h1>
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
        
			<hr>
			
			<div class="row">	
				<div class="col-md-12">
					<div class="not-found" style="display: none;">No Result Found</div>             
                    
                    <table name="example-table" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th data-tsort-type="cookie">Cookie</th>
								<th data-tsort-type="barcode">Barcode</th>
								<th data-tsort-type="dateCreated">Date Created</th>
								<th>Blocked</th>
							</tr>
						</thead>
                        
                        
                        <?php 
                        
                            if (is_array($pallets)) {
                                foreach ($pallets as $pallet) {
                                    print '<tr>';
                                    print '<td>' . $pallet['cookie'] . '</td>';
                                    print '<td>' . $pallet['barcode'] . '</td>';
                                    print '<td>' . $pallet['dateCreated'] . '</td>';
                                    print '<td>' . $pallet['blocked'] . '</td>';
                                    print '</tr>';
                                }
                            } 
                        ?>
                        
						</tbody>
					
					</table>
				
				</div>
			
			</div>     
        </div> 
        
<h1>Create Pallets</h1> 
      
      <br>
      
    <div id="calc" class="row text-left">
        <form class="entry form-group" method="post" id="formCreatePallet">
            <div class="form-group">
                <label>Cookie</label>
                <div class="form-group">
                    
                    <input type="hidden" name="action" value="submit" />
                    
                    <select class="form-control" id="cookie" name="cookie">
                        <option>Nut cookie</option>
                        <option>Nut ring</option>
                        <option>Amneris</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label>Number of pallets</label>
                <select class="form-control" id="numberOfPallets" name="numberOfPallets">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                    <option>7</option>
                    <option>8</option>
                    <option>9</option>
                    <option>10</option>
                </select>
            </div>
           
            <button type="submit" class="btn btn-lg btn-primary" value="Submit"  id="createPallet">Submit</button>
            
        </form>
    </div>
      
    <script>
      
    $('#createPallet').click(function() {
	console.log('clicked create button');
	$.ajax({
		type: 'POST',
		url: '../php/createPallet.php',
		data: $('#formCreatePallet').serialize(),
		dataType: 'json',
		success: function(data) {    
			if (data.error == true) {
                 alert(data.msg);
			} else {
			     alert(data.msg);
			}
		},
        
		beforeSend: function() {

		},
		complete: function() {
			// alert('ajax call completed');
		},
		error: function(exception) {
			// alert("error" . exception);
		}
	});
	return false;
});

        
    </script>  
      
      
        
    <br>    
    


    <div class="container" style="display:none;" id="myAlert">
        <div class="alert alert-success alert-dismissable" id="myAlert2">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Pallets created succesfuly!
        </div>

    </div>
            
<script>
        
function showAlert(){
  if($("#myAlert").find("div#myAlert2").length==0){
    $("#myAlert").append("<div class='alert alert-success alert-dismissable' id='myAlert2'> <button type='button' class='close' data-dismiss='alert'  aria-hidden='true'>&times;</button>Created pallets succesfully!</div>");
  }
  $("#myAlert").css("display", "");
}
    
</script>        
        
        
        
<script>

$(function()
{   var i=1;
    $('#calc:first').find('.input-group-addon').html(i);
    $(document).on('click', '.btn-add', function(e)
    {
        e.preventDefault();

        var controlForm = $('#calc:first'),
            currentEntry = $(this).parent('.entry:first'),
            newEntry = $(currentEntry.clone()).appendTo(controlForm);
            $(newEntry).find('.input-group-addon').html(++i);

        newEntry.find('input').val('');
        controlForm.find('.entry:not(:last) .btn-add')
            .removeClass('btn-add').addClass('btn-remove')
            .removeClass('btn-success').addClass('btn-danger')
            .html('<span class="glyphicon glyphicon-minus"></span>');
    }).on('click', '.btn-remove', function(e)
    {   i--;
        $(this).parent().nextAll('.entry').each(function() {
            $(this).find('.input-group-addon').html($(this).find('.input-group-addon').html()-1); 
        });
		$(this).parents('.entry:first').remove();	

        

		e.preventDefault();
		return false;
	});
});
  
</script>      
        
        
<div class="page-header">
        <h1>Block Pallet</h1>
      </div>
      <p>
        <button type="button" class="btn btn-lg btn-danger">Block pallet</button>
    
      </p>
        
       <div class="row">
        <div class="col-md-6">
    		<h1>Search for pallet</h1>
            <div id="custom-search-input">
                <div class="input-group col-md-12">
                    <input type="text" class="form-control input-lg" placeholder="ID" />
                    <span class="input-group-btn">
                        <button class="btn btn-info btn-lg" type="button">
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                    </span>
                </div>
            </div>
        </div>
	</div> 
        
	

      <div class="page-header">
        <h1>Alerts</h1>
      </div>
      <div class="alert alert-success" role="alert">
        <strong>Well done!</strong> You successfully read this important alert message.
      </div>
      <div class="alert alert-info" role="alert">
        <strong>Heads up!</strong> This alert needs your attention, but it's not super important.
      </div>
      <div class="alert alert-warning" role="alert">
        <strong>Warning!</strong> Best check yo self, you're not looking too good.
      </div>
      <div class="alert alert-danger" role="alert">
        <strong>Oh snap!</strong> Change a few things up and try submitting again.
      </div>


    

      <div class="page-header">
        <h1>List groups</h1>
      </div>
      <div class="row">
        <div class="col-sm-4">
          <div class="list-group">
            <a href="#" class="list-group-item active">
              Cras justo odio
            </a>
            <a href="#" class="list-group-item">Dapibus ac facilisis in</a>
            <a href="#" class="list-group-item">Morbi leo risus</a>
            <a href="#" class="list-group-item">Porta ac consectetur ac</a>
            <a href="#" class="list-group-item">Vestibulum at eros</a>
          </div>
        </div><!-- /.col-sm-4 -->
      </div>




      <div class="page-header">
        <h1>Wells</h1>
      </div>
      <div class="well">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sed diam eget risus varius blandit sit amet non magna. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Cras mattis consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Aenean lacinia bibendum nulla sed consectetur.</p>
      </div>
      

      <!-- /END THE FEATURETTES -->


      <!-- FOOTER -->
      <footer>
        <p class="pull-right"><a href="#">Back to top</a></p>
        <p>&copy; 2016 Krusty Kookies, AB. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
      </footer>

    </div><!-- /.container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.searchable-1.0.0.min.js"></script>
    <script>window.jQuery || document.write('<script src="/assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="assets/js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>


</html>
