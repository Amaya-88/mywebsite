<?php
ini_set('display_errors', 1);
switch ($_GET["functionname"]) {
    case 'getLog':
        session_start();
        if(isset($_SESSION['name'])) {
            echo getLogContent($_SESSION['date']);
        }
        break;
    default:
        break;
}

switch ($_POST["functionname"]) {
    case 'doChatLogin':
        session_start();
        if(isset($_POST['name']) && $_POST['name'] != ""){
            $_SESSION['name'] = stripslashes(htmlspecialchars($_POST['name']));
            $_SESSION['date'] = date("g:i:s A");
            echo $_SESSION['name'];
        } else {
            throw new InvalidArgumentException('not name given');
        }
        break;
    case 'doChatLogout':
        session_start();
        if(isset($_SESSION['name'])) {
            setLogLogout();
            session_destroy();
            echo 'user destroid';
        } else {
            echo 'not logged user';
        }
        break;
    case 'submitMessage':
        session_start();
        if(isset($_SESSION['name'])){
            setLogMessage($_POST['message']);
            echo json_encode('ok');
        } else {
            throw new Exception('no session');
        }
        break;
    default:
        break;
}


function getLogContent($fromDate = null) {
    $filePath = "log.json";
    $logArray = array();
    if(file_exists($filePath)) {
        $decodedContent = json_decode(file_get_contents($filePath));
        if(!$decodedContent) {
            $decodedContent = array();
        }
        if(!is_null($fromDate)) {
            foreach($decodedContent as $value) {
                if(strtotime($value->date) > strtotime($fromDate)) {
                    array_push($logArray, $value);
                }           
            }
        } else {
            $logArray = $decodedContent;
        }
    } else {
        throw new Exception('File not found: '.$filePath);
    }
    return json_encode($logArray);
}

function setLogMessage($message) {
    $filePath = "log.json";
    $content = getLogContent();
    $contentArray = array();
    $logEntry = array(
        'date' => date("g:i:s A"),
        'userName' => $_SESSION['name'],
        'message' => stripslashes(htmlspecialchars($message)),
        'type' => 'message'
        );
    if(strlen($content) > 0) {
        $contentArray = json_decode($content);
    }
    array_push($contentArray, $logEntry);
    if(!file_put_contents($filePath, json_encode($contentArray))) {
        throw new Exception('Error writing on file'.$filePath);
    }
}

function setLogLogout() {
    $filePath = "log.json";
    $content = getLogContent();
    $contentArray = array();
    $logEntry = array(
        'date' => date("g:i:s A"),
        'userName' => $_SESSION['name'],
        'type' => 'logout'
        );
    if(strlen($content) > 0) {
        $contentArray = json_decode($content);
    }
    array_push($contentArray, $logEntry);
    if(!file_put_contents($filePath, json_encode($contentArray))) {
        throw new Exception('Error writing on file'.$filePath);
    }
}

function setLogLogin() {
    $filePath = "log.json";
    $content = getLogContent();
    $contentArray = array();
    $logEntry = array(
        'date' => date("g:i:s A"),
        'userName' => $_SESSION['name'],
        'type' => 'login'
        );
    if(strlen($content) > 0) {
        $contentArray = json_decode($content);
    }
    array_push($contentArray, $logEntry);
    if(!file_put_contents($filePath, json_encode($contentArray))) {
        throw new Exception('Error writing on file'.$filePath);
    }
}

?>