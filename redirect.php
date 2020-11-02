<?php
if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
include("plano.php");
if(isset($_GET['url'])){
	$url=$_GET['url'];
escribir("se redirecciona a $url");
header("location:$url");
}
?>