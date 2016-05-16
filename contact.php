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
    <title><?php echo curPageName(); ?> - Amaya Pascual Cajal</title>
  </head>
  <body>

  	<?php include "ui/components/header.php"; ?>
  	<div id="content"> 
	    <div class="center">
	      <div class="main">

	        <div class="impressum">          
	            <p>
	              Amaya Pascual Cajal<br />
	              Ringenstr. 51<br />
	              51067 Köln (Holweide)<br />
	
	            <p>
	              <a href="&#109;&#97;&#105;&#108;&#116;&#111;&#58;&#97;&#109;&#97;&#121;&#97;&#112;&#97;&#115;&#99;&#117;&#97;&#108;&#99;&#97;&#106;&#97;&#108;&#64;&#103;&#109;&#97;&#105;&#108;.&#99;&#111;&#109;">Email</a>
	            </p>
	            <br />
	            
	
	        </div>
	      </div>
      </div>
    </div>
         <?php include "ui/components/footer.php"; ?>
      <script type="text/javascript" src="lib/js/jquery.js"></script>
      <script type="text/javascript" src="scripts/scripts.js"></script>
        <script type="text/javascript">$( window ).load(function() {$('#header #contact_li').addClass('menuFirst')})</script>
  </body>
</html>

