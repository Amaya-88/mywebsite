<?php include "util/urltools.php"; ?>
	<?php include "util/translation.php"; 
		$c_idiom = "en";
		if(isset( $_GET['l']))
			$c_idiom= $_GET['l'];

		$translation = new Translation($c_idiom,"data/translationamayaweb.csv");
	?>
<!DOCTYPE html>
<html>
  <head>
	<?php include "metatags.php" ?>
    
    <link rel="stylesheet" type="text/css" href="styles/stylesheets/layout.css">

    <title>Map</title>
  </head>
  <body>
  	<?php include "ui/components/header.php"; ?>
  	<div id="content">
   	 <div class="center">
		<div class="main">
	      <ul>
	        <li><a href="index.php">Index</a></li>
	        <li><a href="curriculum.php">Curriculum</a></li>
	        <li> <a href="proyects.php">Proyects</a>
	         </li>
	        <li> <a href="blog.php">My blog</a>
	        </li>
	        <li> <a href="contact.php">Contact</a></li>
	        <li> <a href="impressum.php">Impressum</a></li>
	     </ul>
	    </div>
     </div>
   <?php include "ui/components/footer.php"; ?>
  </div>
    <script type="text/javascript" src="lib/js/jquery.js"></script>
    <script type="text/javascript" src="scripts/scripts.js"></script>
</body>
</html>