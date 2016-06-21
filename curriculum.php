<?php include "util/urltools.php"; ?>
	<?php include "util/translation.php"; 
		$translation = new Translation();
	?>
<!DOCTYPE html>
<html>
  <head>
    <?php include "metatags.php" ?>
    <link rel="icon" href="/images/site_icon.png" />
    <link rel="stylesheet" type="text/css" href="styles/stylesheets/layout.css">

    <title>Curriculum - Amaya Pascual Cajal</title>
  </head>
  <body>

  	<?php include "ui/components/header.php"; ?>
  <div id="content">
    <div class="center">
	  <div class="main">

          	<a class="download_link" href="data/pdf/Lebenslauf.pdf"><?php echo $translation->{'getTranslation'}("DOWNLOAD_ALL_TEXT")?></a>
      	</div>
	  </div>

    </div>
    <?php include "ui/components/footer.php"; ?>
    
      <script type="text/javascript" src="lib/js/jquery.js"></script>
      <script type="text/javascript" src="scripts/scripts.js"></script>
        <script type="text/javascript">$( window ).load(function() {$('#header #curriculum_li').addClass('menuFirst')})</script>
  </body>
</html>

