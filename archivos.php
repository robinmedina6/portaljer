<?php
if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(isset($_GET['url'])){
	$url=$_GET['url'];
}else{$url="";}
?>
<html>
<head></head>
<body>
<style>
body{
		 background-repeat:repeat;
		 background-size:auto;
		 background-image:url(img/fondo.jpg);
		 min-width:1000px;
		 }
		 /*-----------------titulo-----------------*/
		 #encabezado{
			 font-size:50px;
			 
			 color:rgba(0,51,153,1);
			 text-align:center;
			 background-color:rgba(200,225,255,0.5)
			 
			 }
			 #main_links{
				 background-color:rgba(255,255,255,0.7);
				 }
</style>
<div id="encabezado"><?php echo $url ;?></div>		
<div id="main_links">	 
<?php

$directorio = opendir("$url"); //ruta actual
while ($archivo = readdir($directorio)) //obtenemos un archivo y luego otro sucesivamente
{
    if (is_dir($archivo))//verificamos si es o no un directorio
    {
        echo "[".$archivo . "]<br />"; //de ser un directorio lo envolvemos entre corchetes
    }
    else
    {
        echo "<a href='$url/".rawurlencode($archivo)."'>".$archivo . "</a><br />";
    }
}
?>
</div>
</body>
</html>