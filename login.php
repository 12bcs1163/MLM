<?php include("login_check.php"); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Slim">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/slim/img/slim-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/slim">
    <meta property="og:title" content="Slim">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/slim/img/slim-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/slim/img/slim-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title>User Login</title>

    <!-- vendor css -->
    <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="lib/Ionicons/css/ionicons.css" rel="stylesheet">   
    <link href="lib/rickshaw/css/rickshaw.min.css" rel="stylesheet">

    <!-- Slim CSS -->
    <link rel="stylesheet" href="css/slim.css">

  </head>
  <body style="background-image:linear-gradient(#aaecf7, #0d9fb84d);" >
<div class="signin-wrapper">
    


      <div class="signin-box">
      
            <?php include("showmessage.php"); ?>
        <h2 class="signin-title-primary" style="text-align: center;margin-bottom: 22px" >Sign in</h2>
       
<form action="" method="post">
        <div class="form-group">
          <input type="text" name="UserID" class="form-control" placeholder="Enter your user ID">
        </div><!-- form-group -->
        <div class="form-group mg-b-50">
          <input type="password" name="Password" class="form-control" placeholder="Enter your password">
        </div><!-- form-group -->
        <button class="btn btn-primary btn-block btn-signin" name="signin" style="background:#0d9fb8 ;border: none">Sign In</button>
       </form>
      </div><!-- signin-box -->

    </div>

    <script src="lib/jquery/js/jquery.js"></script>
    <script src="lib/popper.js/js/popper.js"></script>
    <script src="lib/bootstrap/js/bootstrap.js"></script>
    <script src="lib/jquery.cookie/js/jquery.cookie.js"></script>
    <script src="lib/d3/js/d3.js"></script>
    <script src="lib/rickshaw/js/rickshaw.min.js"></script>
    <script src="lib/Flot/js/jquery.flot.js"></script>
    <script src="lib/Flot/js/jquery.flot.resize.js"></script>
    <script src="lib/peity/js/jquery.peity.js"></script>

    <script src="../js/slim.js"></script>
    <script src="../js/ResizeSensor.js"></script>
    <script>
      $(function(){
        'use strict'

        var multibar = new Rickshaw.Graph({
          element: document.querySelector('#chartMultiBar1'),
          renderer: 'bar',
          stack: false,
          max: 60,
          series: [{
            data: [
              { x: 0, y: 20 },
              { x: 1, y: 25 },
              { x: 2, y: 10 },
              { x: 3, y: 15 },
              { x: 4, y: 20 },
              { x: 5, y: 40 },
              { x: 6, y: 15 },
              { x: 7, y: 40 },
              { x: 8, y: 25 }
            ],
            color: '#065381'
          },
          {
            data: [
              { x: 0, y: 10 },
              { x: 1, y: 30 },
              { x: 2, y: 45 },
              { x: 3, y: 30 },
              { x: 4, y: 42 },
              { x: 5, y: 20 },
              { x: 6, y: 30 },
              { x: 7, y: 15 },
              { x: 8, y: 20 }
            ],
            color: '#34B2E4'
          }]
        });

        multibar.render();

        // Responsive Mode
        new ResizeSensor($('.slim-mainpanel'), function(){
          multibar.configure({
            width: $('#chartMultiBar1').width(),
            height: $('#chartMultiBar1').height()
          });
          multibar.render();
        });

      });
    </script>
  </body>
</html>
