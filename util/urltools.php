	<?php
		function curPageName() {
			$parts = explode(".",substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1));
			$p_name = $parts[0];
			 return $p_name;
		}
		function currentURL() {
			$uri_parts = explode('?', $_SERVER['REQUEST_URI'], 2);
			return  'http://' . $_SERVER['HTTP_HOST'] . $uri_parts[0];
		}
	?>