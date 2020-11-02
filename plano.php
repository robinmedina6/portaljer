<?php
date_default_timezone_set('America/Bogota');
if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
setlocale(LC_ALL,"es_CO");
function escribir($cadena){
	$time=time();
	if(isset($_COOKIE['equiponro'])){
	$nequipo=$_COOKIE['equiponro'];
	}else{$nequipo=0;}
$file = fopen("logs/log - ".date("Y-m-d").".txt", "a");
fwrite($file, date("H:i:s", $time)."_"."_"."_Equipo:$nequipo"." --> ". $cadena ."<--". PHP_EOL);
fclose($file);
}
?>