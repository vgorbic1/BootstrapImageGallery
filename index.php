<?php include("class.ImageGallery.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Image Gallery Demo</title>   
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1"> 
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
</head>
<body>
<div class="container">
  <div class="col-sm-12">
    <h2>Exhibition Image Gallery</h2>
		<?php 
			$exhibition = new ImageGallery("exhibition");
			$exhibition->showAll(); 
		?>
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>