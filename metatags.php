	
	<?php
		echo '<meta http-equiv="content-type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0,user-scalable=no"> 
		<meta name="language" content="'.$translation->{'getLanguage'}.'">
		<meta name="keywords" content="'.$translation->{'getTranslation'}("META_KEYWORDS_".strtoupper(curPageName())).'">
		<meta name="description" content="'.$translation->{'getTranslation'}("META_DESCRIPTION_".strtoupper(curPageName())).'">
		<meta name="author" content="Amaya Pascual Cajal">
		<meta name="robots" content="index, follow">
	    <meta name="distribution" content="global">';
	?>