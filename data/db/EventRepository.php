<?php  
// set mime type example for .mp4
$mtype = "application/json";

// set header
header("Content-Type: $mtype");
include_once( '../data/db/dbinfo.php' ); 
include_once( '../util/translation.php' ); 

class EventRepository {
	 
	public function getAllEvents() {
		 global $dbhost;
		 global $dbuser;
		 global $dbpass;
		 global $dbname;
		 
		$link = mysql_connect($dbhost, $dbuser, $dbpass)
		    or die('The connection fails: ' . mysql_error());
		
		mysql_select_db($dbname) or die("select db fails");
		
		$query = '
		SELECT e.event_name, e.event_description, e.event_date_in, e.event_date_fi, e.event_link, c.category_name
		FROM event AS e
		INNER JOIN category AS c ON e.event_category = c.id_category
		ORDER BY c.category_name';
		
		$result = mysql_query($query) or die("query fails: " . mysql_error());
		
		while($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
			$evts["result"][]=$row;
		}

		mysql_free_result($result);
		mysql_close($link);
		return $evts;
	}
}

	


?>