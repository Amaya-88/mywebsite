<?php
 	include( '../data/db/ProjectRepository.php' );
	include( '../data/db/EventRepository.php' );
	switch ($_GET["functionname"]) {
		case 'getAllTags':
			$obj = new ProjectRepository();
			echo json_encode($obj->getAllTags());
			break;
		case 'getAllEvents':
			$obj = new EventRepository();
			echo json_encode($obj->getAllEvents());
			break;
		case 'getProjects':
			$obj = new ProjectRepository();
			echo json_encode($obj->getProjects($_GET["language"], $_GET["tag"]));
			break;
		default:
			break;
	}

    switch ($_POST["functionname"]) {
        default:
			break;
    }

?>