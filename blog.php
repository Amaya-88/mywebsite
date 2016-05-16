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
    <link rel="icon" href="/images/site_icon.png" />
    <link rel="stylesheet" type="text/css" href="styles/stylesheets/layout.css">
    <title>Amaya Pascual Cajal - Blog</title>
  </head>
  <body>
  	<?php include "ui/components/header.php"; ?>
  <div id="content">
    <div class="center">
		<div class="main">

			<h2>Próximamente ;)</h2>
	      </div>
	    </div>
    </div>
<?php include "ui/components/footer.php"; ?>
      <script type="text/javascript" src="lib/js/jquery.js"></script>
      <script type="text/javascript" src="scripts/scripts.js"></script>
      <script type="text/javascript">$( window ).load(function() {$('#header #blog_li').addClass('menuFirst')})</script>
  </body>
</html>