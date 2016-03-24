<?php
session_start();
session_destroy();

?>



    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <title>Krusty Kookies</title>

        <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">

        <link rel="stylesheet" href="css/reset.css">

        <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
        <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

        <link rel="stylesheet" href="../css/style.css">

    </head>

    <body>


        <!-- Mixins-->
        <!-- Pen Title-->
        <div class="pen-title">
            <h1>Krusty Kookies</h1>
        </div>
        <div class="container">
            <div class="card"></div>
            <div class="card">
                <h1 class="title">Logged out!</h1>

                <div class="button-container">
                    <button onclick="visitPage();">Back to login</button>
                </div>
            </div>

            <script>
                function visitPage() {
                    window.location = '../index.html';
                }
            </script>
        </div>
        </div>
        <!--
	  <a id="portfolio" href="http://andytran.me/" title="View my portfolio!"><i class="fa fa-link"></i></a>
	  <a id="codepen" href="http://codepen.io/andytran/" title="Follow me!"><i class="fa fa-codepen"></i></a>
		-->

        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    </body>

    </html>