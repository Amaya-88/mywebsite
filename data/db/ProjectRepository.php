<?php  
// set mime type example for .mp4
$mtype = "application/json";

// set header
header("Content-Type: $mtype");
include_once( '../data/db/dbinfo.php' ); 
include_once( '../util/translation.php' ); 

class ProjectRepository {
	 
	public function getAllTags() {
		 global $dbhost;
		 global $dbuser;
		 global $dbpass;
		 global $dbname;


		$link = mysql_connect($dbhost, $dbuser, $dbpass)
		    or die('The connection fails: ' . mysql_error());
		
		mysql_select_db($dbname) or die("select db fails");
		
		$query = "SELECT name FROM tag";
		$result = mysql_query($query) or die("query fails: " . mysql_error());
		
		while($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
			$tags["result"][]=$row;
		}
		//$tags = mysql_fetch_array($result, MYSQL_ASSOC);
		mysql_free_result($result);
		mysql_close($link);
		return $tags;
	}
	
	
	public function getProjects($language, $tag=null) {
	    global $dbhost;
		global $dbuser;
		global $dbpass;
		global $dbname;

		$link = mysql_connect($dbhost, $dbuser, $dbpass)
	    or die('The connection fails: ' . mysql_error());
		
		mysql_select_db($dbname) or die("select db fails");	
	
		if($tag and strlen($tag)>0)
			$query = '
				SELECT p.name, p.description, p.role, p.technologies, p.link, p.code
				FROM proyect AS p 
				INNER JOIN proyect_tag AS pt ON p.id_proyect = pt.id_proyect
				INNER JOIN tag AS t ON pt.id_tag = t.id_tag AND t.name = "'.$tag.'"';
		else {
			$query = "
				SELECT name, description, role, technologies, link, code
				FROM proyect
				";	
		}
		

		$result = mysql_query($query) or die("query fails: " . mysql_error());
		
		$translation = new Translation($language,"../data/translationamayaweb.csv");
		
		while($r = mysql_fetch_array($result, MYSQL_ASSOC)) {
			$r["name"] = $translation->{'getTranslation'}($r["name"]);
			$r["description"] = $translation->{'getTranslation'}($r["description"]);
			$r["role"] = $translation->{'getTranslation'}($r["role"]);
			$r["technologies"] = $translation->{'getTranslation'}($r["technologies"]);
			
		    $rows["result"][] = $r;   
		}
		
		mysql_free_result($result);
		mysql_close($link);
		
		return $rows;
	}
}

	


?>