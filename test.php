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
    <title><?php echo curPageName(); ?> - Amaya Pascual Cajal</title>
</head>
<body>
	<?php include "ui/components/header.php" ?>
 <div id="content"> 
 	 <div class="center">
  	  <div class="main">

      <div id="seitenbox">
        <img src="images/amaya.png" alt="Amaya Pascual Cajal" title="Amaya Pascual Cajal" width="189" height="303"/>
      </div>  
      <h1>
        <?php echo $translation->{'getTranslation'}("INTRODUCTION_TITLE_1")?>
      </h1>
        <p>
        	<?php echo 
	        	preg_replace(
		        	"/\[\[(.+?)\]\]/", 
		        	"<a class='tec' href='projects.php?l=".$c_idiom."#$1'>$1</a>", 
		        	$translation->{'getTranslation'}("INTRODUCTION_MYWORK")
				);
			?>

        </p>
        <p>
        	<?php echo $translation->{'getTranslation'}("INTRODUCTION_HOBBIES")?>
        </p>
        <h1>
        	<?php echo $translation->{'getTranslation'}("INTRODUCTION_TITLE_2")?>
      	</h1>
      	<p>
        	<?php echo $translation->{'getTranslation'}("INTRODUCTION_OFFER")?>
        </p>
        
        <!--a id="maplink" href="map.php">Map</a-->
    </div>
    </div>
  </div>
     <?php include "ui/components/footer.php"; ?>

  <script type="text/javascript" src="lib/js/jquery.js"></script>
  <script type="text/javascript" src="scripts/scripts.js"></script>
  <script type="text/javascript"></script>
</body>
</html>