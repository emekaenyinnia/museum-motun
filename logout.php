<?php
     
    include_once('dbsettings.php');
     

	if (isset($_SERVER['HTTP_COOKIE'])) {
    $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
    foreach($cookies as $cookie) {
        $parts = explode('=', $cookie);
        $name = trim($parts[0]);
        setcookie($name, '', time()-1000);
        setcookie($name, '', time()-1000, '/');
    }
	}
    session_start();
   session_unset();
    session_destroy();

    if(!isset($_SESSION['user_id'])){
        echo'<script>window.location="index.php";</script>';

    }

	header ("Expires: ".gmdate("D, d M Y H:i:s", time())." GMT");  
    header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");  
    header ("Cache-Control: no-cache, must-revalidate");  
    header ("Pragma: no-cache");

    // echo'<script>window.location="'.$site_url.'";</script>';
    
?>