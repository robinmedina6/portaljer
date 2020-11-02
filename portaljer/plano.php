<?php
session_start();
setlocale(LC_ALL,"es_CO");
function escribir($cadena){
	$time=time();
$file = fopen("logs/log - ".date("Y-m-d").".txt", "a");
fwrite($file, date("H:i:s", $time)."_".$_SESSION['nombre']."_"." --> ". $cadena ."<--". PHP_EOL);
fclose($file);
}
?>