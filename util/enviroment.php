<?php
    function isDev() {
        return strrpos($_SERVER['HTTP_HOST'], "localhost") != false;
    }

    function isProd() {
        return strrpos($_SERVER['HTTP_HOST'], "localhost") == false;
    }
?>