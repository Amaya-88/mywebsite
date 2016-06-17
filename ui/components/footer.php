<?php


function addFlag($language) {
	$current_language = "en";
	if(isset($_POST['l']))
		$current_language = $_POST['l'];
	$currentURL = currentURL();

	$extraclass = '';

	if($current_language == $language)
		$extraclass = 'activ';

	echo '<a class="flag '.$language.' '.$extraclass.'" id="'.$language.'" href="'.$currentURL.'?l='.$language.'"></a>';
	
}


 echo '<div id="footer">
   		<div class="footer_box">
   			<div>
		        Amaya Pascual Cajal';
				addFlag('en');
				addFlag('de');
				addFlag('es');       
echo '      </div>
        </div>
    </div>';
?>