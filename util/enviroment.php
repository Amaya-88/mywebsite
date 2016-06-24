<?php
    function isDev() {
        return strrpos($_SERVER['HTTP_HOST'], "localhost") != false;
    }

    function isProd() {
        return strrpos($_SERVER['HTTP_HOST'], "localhost") == false;
    }

    if(isProd()) {
        ini_set('display_errors', 'off');
        ini_set('log_errors', 'on');
    }
    error_reporting(E_STRICT);

?>