<?php
include("plano.php");
include("funciones.php");
function getRealIP() {
if (!empty($_SERVER['HTTP_CLIENT_IP']))
return $_SERVER['HTTP_CLIENT_IP'];
if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
return $_SERVER['HTTP_X_FORWARDED_FOR'];
return $_SERVER['REMOTE_ADDR'];
}

$info=detect();
$info["ip"]=getRealIP();
/*
echo "Sistema operativo: ".$info["os"];
echo "</br>Navegador: ".$info["browser"];
echo "</br>Versión: ".$info["version"];
echo "</br>user:".$_SERVER['HTTP_USER_AGENT'];
*/
/**
 * Funcion que devuelve un array con los valores:
 *	os => sistema operativo
 *	browser => navegador
 *	version => version del navegador
 */
function detect()
{
	$browser=array("IE","OPERA","MOZILLA","NETSCAPE","FIREFOX","SAFARI","CHROME");
	$os=array("WIN","MAC","LINUX");
 
	# definimos unos valores por defecto para el navegador y el sistema operativo
	$info['browser'] = "OTHER";
	$info['os'] = "OTHER";
 
	# buscamos el navegador con su sistema operativo
	foreach($browser as $parent)
	{
		$s = strpos(strtoupper($_SERVER['HTTP_USER_AGENT']), $parent);
		$f = $s + strlen($parent);
		$version = substr($_SERVER['HTTP_USER_AGENT'], $f, 15);
		$version = preg_replace('/[^0-9,.]/','',$version);
		if ($s)
		{
			$info['browser'] = $parent;
			$info['version'] = $version;
		}
	}
 
	# obtenemos el sistema operativo
	foreach($os as $val)
	{
		if (strpos(strtoupper($_SERVER['HTTP_USER_AGENT']),$val)!==false)
			$info['os'] = $val;
	}
 
	# devolvemos el array de valores
	return $info;
}






if(isset($_COOKIE['equiponro'])){
$nequipo=$_COOKIE['equiponro'];
}else{
$nequipo=0;
}
echo $nequipo;
if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
$_SESSION['nombre']=$nequipo;
/**********************archivo plano**************************/

/****************** visitas contador *******************/
$urlarchivo="visitas.txt";
$visitas=0;
if($fp = fopen($urlarchivo,"r+")){
	    while(!feof($fp)) {
			$nvit = fgets($fp);
			if(intval($nvit) != intval(0)){
			    $visitas = $nvit;
			}
		}
		fclose($fp);
} else {
		die("Error de lectura");
}
$visitas=intval($visitas)+1;
if($fp = fopen($urlarchivo,"w")){
		fwrite($fp,$visitas);
		fclose($fp);
} else {
		die("Error de escritura");
}
$equiponro = $visitas;
$cadena_equipo=implode(";",$info);
if(isset($_COOKIE['equiponro'])){
$nequipo=$_COOKIE['equiponro'];
escribir("se recibe visita equipo: ".$nequipo."             info:".$cadena_equipo." info:");
}else{
setcookie("equiponro",$equiponro,time()+10*365*24*60*60);
escribir("se crea equipo nuevo visitante: ".$equiponro."             info:".$cadena_equipo." info:");
}
/*******************fin visitas******************/

/**************************cookie Nro Equipo**********************/

/**************************cookie Nro Equipo**********************/

/***********************************consulta nombre equipo***********************************/
$nombrepto="";
$sql="SELECT nombrepto from chat_grupal_eq where idportal=".$nequipo." order by(id) desc";
$nombrepto="".sqlretstring($sql);

?>
<html>
<head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-110014319-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-110014319-1');
</script>

<title>PORTALJER</title>
<link href='img/favicon.png' rel='shortcut icon' type='image/png'/>
<!-- Start WOWSlider.com HEAD section -->
<!-- Start WOWSlider.com HEAD section -->
<link rel="stylesheet" type="text/css" href="slide/engine1/style.css" />
<script type="text/javascript" src="slide/engine1/jquery.js"></script>
<!-- End WOWSlider.com HEAD section -->
<!-- End WOWSlider.com HEAD section -->
	<style>  
	

	 body{
		 background-repeat:repeat;
		 background-size:auto;
		 background-image:url(img/fondo.jpg);
		 min-width:1200px;
		 }
		 /*-----------------titulo-----------------*/
		 #encabezado{
			 font-size:20px;
			 color:#0030;
			 text-align:center;
			 background-color:rgba(200,225,255,0.5);
			 }
			 
		 /*-----------------titulo-----------------*/
		 /*-----------------contador de visitas-----------------*/
		 #contador_visitas{
			 position:absolute;
			 bottom:1px;
			 left:1px;
			 font-size:20px;
			 color:rgba(255,255,255,1);
			 text-align:center;
			 background-color:rgba(0,0,51,1);
			 border-radius:5px;
			 
			 }
			 
		 /*-----------------titulo-----------------*/		 
		 
		 /*------------------slide--------------*/
		 #wowslider-container1{
			 position:absolute;
			 top:50px;
			 left:15px;
			 display:inline-block;
			 display:none;
			 /*margin:30px 0px 0px 100px;*/
			 box-shadow:0px 0px 10px rgba(255,255,255,1);
			 
			 
			 }
			 #iframe{
				 position:absolute;
				 left:10px;
				 top:30px;
				 }
		 /*------------------slide--------------*/
		  /*------------------Logo JER--------------*/
		 #logojer{
	display: block;
	position: absolute;
	left: 434px;
	top: 292px;			 
			 
			 }
		 /*------------------Logo JER--------------*/
		 /*------------------Logo portal--------------*/
		 
		 /*------------------Logo portal--------------*/
		 
		 /*************************botones **************************/
		 
		 
		 /****************generales**************/
		 
		 .boton > img:hover{
				background-color:rgba(255,255,255,0.8);
				box-shadow:0px 0px 10px rgba(255,255,255,1);
				
				}
		 
		 
		 
		 #main_botones{
	position: absolute;
	left: 700px;
	top: 30px;
	border: rgba(0,0,0,1) 1px solid;
	border-radius: 10px;
	background-color: rgba(200,225,255,0.6);
	font-weight: bold;
			 }
		#main_botones .titulo{
			font-size:35px;
			 color:rgba(255,0,0,1);
			 font-family:"Comic Sans MS", cursive;
			}
		#main_botones td{
			font-size:15px;
			 color:rgba(255,0,0,1);
			 font-family:"Comic Sans MS", cursive;
			 text-align:center;
			}
		#main_botones .boton > img{
				width:57px;
				height:50px;
				margin:3px 3px;
				}
		
				/*************************simuladores*********************/
				
		#main_simuladores{
	position: absolute;
	left: 10px;
	top: 450px;
	border: rgba(0,0,0,1) 1px solid;
	border-radius: 10px;
	background-color: rgba(200,225,255,0.8);
	font-size: 30px;
	color: rgba(255,0,0,1);
	font-family: "Comic Sans MS", cursive;
	font-weight: bold;
			 }
		#main_simuladores .boton > img{
				width:60px;
				height:60px;
				margin:0px 0px;
				}
				
				/*************************simuladores*********************/
				/*************************pico y placa*********************/
				
		#main_pico_placa{
	position: absolute;
	left: 210px;
	top: 450px;
	border: rgba(0,0,0,1) 1px solid;
	border-radius: 10px;
	background-color: rgba(200,225,255,0.8);
	font-size: 30px;
	color: rgba(255,0,0,1);
	font-family: "Comic Sans MS", cursive;
	font-weight: bold;
			 }
		#main_pico_placa .boton > img{
				width:50px;
				height:60px;
				margin:0px 0px;
				}
				
				/*************************Pico y Placa*********************/
				/*************************plan de premios*********************/
				
		#main_plan_premios{
	position: absolute;
	left: 392px;
	top: 450px;
	border: rgba(0,0,0,1) 1px solid;
	border-radius: 10px;
	background-color: rgba(200,225,255,0.8);
	font-size: 30px;
	color: rgba(255,0,0,1);
	font-family: "Comic Sans MS", cursive;
	font-weight: bold;
			 }
		#main_plan_premios .boton > img{
				width:80px;
				height:60px;
				margin:0px 0px;
				}
		 /*************************fin plan de premis*********************/
		 /*************************resultados*********************/
				
		#main_resultados{
			 position:absolute;
			 left:700px;
			 top:300px;
			 border:rgba(0,0,0,1) 1px solid;
			 background-color:rgba(255,255,255,1);
			 font-size:28px;
			 color:rgba(0,102,204,1);
			 }
			#main_resultados th{
				font-family:"Palatino Linotype", "Book Antiqua", Palatino, serif;
				background-color:rgba(204,204,204,0.5);
				font-weight:bold;
				padding:10px 2px; 
				}
				#main_resultados div{
					display:inline-block;
					color:rgba(102,102,102,1);
					padding:0px 10px ;
				}
				#main_resultados a:hover{font-size:25px;}
		#main_resultados .loteriaicono{
				width:40px;
				height:40px;
				display:inline-block;
			
				}
				
				/*************************simuladores*********************/
/************************* main lista municipis *********************/
				
		#main_lista_municipios{
			 position:absolute;
			 left:730px;
			 top:320px;
			 border:rgba(0,0,0,1) 1px solid;
			 background-color:rgba(255,255,255,1);
			 font-size:20px;
			 color:rgba(0,102,204,1);
			 }
			#main_lista_municipios th{
				font-family:"Palatino Linotype", "Book Antiqua", Palatino, serif;
				background-color:rgba(204,204,204,0.5);
				font-weight:bold;
				padding:10px 50px; 
				}
				#main_lista_municipios div{
					display:inline-block;
					color:rgba(102,102,102,1);
					padding:0px 10px ;
				}
				
				/*************************lista municipios*********************/
/************************* main busqueda Nura *********************/
				
		#main_busqueda_nura{
	position: absolute;
	left: 1000px;
	top: 300px;
	border: rgba(0,0,0,1) 1px solid;
	background-color: rgba(255,255,255,1);
	font-size: 20px;
	color: rgba(0,102,204,1);
			 }
			#main_busqueda_nura th{
				font-family:"Palatino Linotype", "Book Antiqua", Palatino, serif;
				background-color:rgba(204,204,204,0.5);
				font-weight:bold;
				padding:10px 40px; 
				}
				#main_busqueda_nura div{
					display:inline-block;
					color:rgba(102,102,102,1);
					padding:0px 0px ;
				}
				
				/*************************lista busqueda Nura*********************/

		 /*************************plan  codigos nura*********************/
				
		#main_codigos_nura{
	position: absolute;
	left: 1000px;
	top: 448px;
	border: rgba(0,0,0,1) 1px solid;
	background-color: rgba(200,225,255,0.8);
	font-size: 20px;
	color: rgba(0,102,204,1);
			 }
		#main_codigos_nura img{
			margin:auto;
			display:block;
			}
		#main_codigos_nura .codigos{
			text-align:center;
			font-size:18px;				}
		 /*************************fin plan de premis*********************/
		 
		 
		 /*************************plan otros enlaces*********************/
				
		#main_otros_enlaces{
	position: absolute;
	left: 570px;
	top: 450px;
	border: rgba(0,0,0,1) 1px solid;
	border-radius: 10px;
	background-color: rgba(200,225,255,0.6);
	font-weight: bold;
			 }
		#main_otros_enlaces .titulo{
			font-size:30px;
			 color:rgba(255,0,0,1);
			 font-family:"Comic Sans MS", cursive;
			}
		#main_otros_enlaces td{
			font-size:15px;
			 color:rgba(255,0,0,1);
			 font-family:"Comic Sans MS", cursive;
			 text-align:center;
			}
		#main_otros_enlaces .boton > img{
				width:50px;
				height:58px;
				/*margin:3px 3px;*/
				}				
		 /*************************fin plan de premis*********************/
		 
		 
		 	 /*************************main nuevos enlaces*********************/
				
		#main_nuevos_enlaces{
	position: absolute;
	left: 700px;
	top: 165px;
	border: rgba(0,0,0,1) 1px solid;
	border-radius: 10px;
	background-color: rgba(200,225,255,0.6);
	font-weight: bold;
			 }
		#main_nuevos_enlaces .titulo{
	font-size: 24px;
	color: rgba(255,0,0,1);
	font-family: "Comic Sans MS", cursive;
			}
		#main_nuevos_enlaces td{
			font-size:15px;
			 color:rgba(255,0,0,1);
			 font-family:"Comic Sans MS", cursive;
			 text-align:center;
			}
		#main_nuevos_enlaces .boton > img{
				width:70px;
				height:70px;
				/*margin:3px 3px;*/
				}				
		 /*************************fin plan de premis*********************/
		 
		 
		 
		  /*************************plan  codigos nura*********************/
				
		#main_acercade{
			 position:fixed;
			 bottom:0px;
			 left:40%;
			 border:rgba(0,0,0,1) 1px solid;
			 background-color:rgba(0,0,0,1);
			 font-size:15px;
			 color:rgba(255,255,255,1);
			 }
			 
		#main_acercade img{
			
			width:10px;
			height:10px;
							}
		 /*************************fin plan de premis*********************/
		  /*************************resultados nuara*********************/
		  .btnstyle {
			   background:rgba(0,102,153,0.5);
			   color:rgba(0,0,0,1);
			   padding: 10px;
			   font-size: 18px;
			   border-radius: 5px;
			   box-sizing: border-box;
			   width:100px;
			   text-align:center;
			   margin:auto;
			   transition: all 500ms ease;
			  }
			 .btnstyle:hover{
				  background:rgba(0,102,51,0.5);
				  
				  }
		#div_main_resultados_nura{
			display:none;
			width:100%;
			height:100%;
			z-index:200;
			background-color:rgba(255,255,255,0.9);
			position:absolute;
			 left:2px;
			 top:0px;
			 border:rgba(0,0,0,1) 1px solid;
			}
		#main_tbl_resultados_nura{
			
			margin:auto;
			 position:relative;
			 
			 }
	    #main_tbl_resultados_nura th{
			 font-family:"Palatino Linotype", "Book Antiqua", Palatino, serif;
			 font-size: 20px;
			 color: rgba(0,102,204,1);
			 border:rgba(0,0,0,1) 1px solid;
			 background-color:rgba(204,204,204,0.5);
		}
		#main_tbl_resultados_nura tbody td{
				 
				 border-bottom:rgba(0,0,0,1) 1px solid;
				 border-right:rgba(0,0,0,1) 1px solid;
		}
		#main_tbl_resultados_nura tbody{
			
			background-color:rgba(250,250,250,0.9);
			}
			
			
			#div_main_chat_grupal{
				
			display:block;
			width:390px;
			
			/*height:100%;*/
			z-index:100;
			background-color:rgb(245,241,238);
			position:fixed;
			 bottom:0px;
			 right:0px;
			 border:rgba(0,0,0,1) 1px solid;
			  margin-bottom: 5px;
			  border-bottom: 1px solid silver;
			  font-weight: bold;
			  font-family: 'Mukta Vaani', sans-serif;
			  height:98%;
			  
			 
				}
				#div_main_chat_grupal #imgicongroup{
					border-radius:30px;
					}
				#table_chat_grupal #table_mensajes{
					 overflow:scroll;
					 display:inline-block;
					 height:450px;
					 width:385px;
					 background-color:rgba(255,255,255,0.2);
					 border-radius:1px;
					 border:rgb(204,204,204) thin solid;
					 background-color:rgba(255,255,255,0.99);
						background-image:url(img/chat/fondo.PNG);
						margin:px;
						padding:0px;
					}
				#div_main_chat_grupal tr{
					padding:50px;
					
				
					}
				#div_main_chat_grupal input#punto{
				width:70px;
				height: 30px;
				border: 1px solid gray;
				border-radius: 5px;
				}
				#div_main_chat_grupal textarea#mensaje{
				
				width:300px;
				height: 30px;
				border: 1px solid gray;
				border-radius: 5px;
				}
				#div_main_chat_grupal .punto{
					width:50px;
					color:#1C62C4;
					font-size:11px;
					font-family: 'Mukta Vaani', sans-serif;
					border-top:dashed #666666  thin;
					
					}
				#div_main_chat_grupal .mensaje{
					width:300px;
					font-size:15px;
					
					color:#666;
					border-top:solid #666666  thin;
					
					}
					#div_main_chat_grupal .si .mensaje div{
						padding:10px 10px;
						border-radius: 10px 10px 10px;
						background-color:rgb(220,248,198);
						display:inline-block;
						color: #262626;
						float:right;
						
						
						
						
						}
						#div_main_chat_grupal .no .mensaje div{
						padding:10px 10px;
						border-radius: 10px 10px 10px;
						background-color:rgb(255,255,255);
						display:inline-block;
						color: #262626;
						
						
						}
				#div_main_chat_grupal .hora{
					
					font-size:10px;
					color:#666;
					border-top:dashed #666666  thin;
					}

		 /*************************resultados nuara*********************/
	</style>
 
</head>
	<body>
<a target="_blank" href="redirect.php?url=https://www.dropbox.com/sh/jbxgslxw4o5sihz/AAAA-BT2etGHFOXi5JcBaViia?dl=0" >.</a>
	
	<!--<video  width="650" height ="330" style="display:block; position:absolute; z-index:100; top:10px; left:50px;" controls>
  
  <source src="video/b2b.gif" type="video/webm">
  <!--<source src="video/baloto.mp4" type="video/mp4">
 <!-- <source src="video/b2bpc.webm" type="video/webm">-->
<!--<source src="movie.ogg" type="video/ogg">
Your browser does not support the video tag.
</video>-->
    	<div id="encabezado">
        
        </div>
        <div id="contador_visitas"><div id="lectura">Visitantes</div><div id="numero"><?php echo $visitas.""; ?></div></div><!--[if IE]>
<iframe id="iframe" width="1200" scrolling="no" height="2850" frameborder="0" src="https://jer.com.co/televisor/" style="zoom: 0.65;">&nbsp;</iframe>
<![endif]-->
<!--[if !IE]> -->
<iframe id="iframe" width="1366" scrolling="no" height="720" frameborder="0" src="https://jer.com.co/televisor/" style="-moz-transform: scale(0.50);-moz-transform-origin: 0 0;-o-transform: scale(0.50);-o-transform-origin: 0 0;-webkit-transform: scale(0.50);-webkit-transform-origin: 0 0;transform: scale(0.50); transform-origin: 0 0;">&nbsp;</iframe>
<!-- <![endif]-->
                         
<!-- Start WOWSlider.com BODY section -->
                      <div id="wowslider-container1">
                      <div class="ws_images"><ul>
                              <li><img src="slide/data1/images/imagen1.jpg" alt="imagen1" title="imagen1" id="wows1_0"/></li>
                              <li><img src="slide/data1/images/imagen2.jpg" alt="imagen2" title="imagen2" id="wows1_1"/></li>
                              <li><img src="slide/data1/images/imagen3.jpg" alt="imagen3" title="imagen3" id="wows1_2"/></li>
                              <li><img src="slide/data1/images/imagen4.jpg" alt="imagen4" title="imagen4" id="wows1_3"/></li>
                              <li><a href="http://wowslider.net"><img src="slide/data1/images/imagen5.jpg" alt="jquery slider" title="imagen5" id="wows1_4"/></a></li>
                              <li><img src="slide/data1/images/imagen6.jpg" alt="imagen6" title="imagen6" id="wows1_5"/></li>
                          </ul></div>
                          <div class="ws_bullets"><div>
                              <a href="#" title="imagen1"><span>1</span></a>
                              <a href="#" title="imagen2"><span>2</span></a>
                              <a href="#" title="imagen3"><span>3</span></a>
                              <a href="#" title="imagen4"><span>4</span></a>
                              <a href="#" title="imagen5"><span>5</span></a>
                              <a href="#" title="imagen6"><span>6</span></a>
                          </div></div><div class="ws_script" style="position:absolute;left:-99%"><a href="http://wowslider.com">responsive slider</a> by WOWSlider.com v8.7</div>
                      <div class="ws_shadow"></div>
                      </div>	
                      <script type="text/javascript" src="slide/engine1/wowslider.js"></script>
                      <script type="text/javascript" src="slide/engine1/script.js"></script>
    <table id="main_botones" name="main_botones">
    <tr><td colspan="8" class="titulo">Enlaces</td></tr>
		<tr>
        	<td><a target="_blank" href="redirect.php?url=http://www.jer.com.co"><div class="boton" id="jerpagina"><img src="img/logojer.png" /></div></a></td>
            <td><a target="_blank" href="redirect.php?url=https://www.runt.com.co/portel/libreria/php/01.030518.html"><div class="boton" id="runt"><img src="img/runt.png"/></div></a></td>
            
            <td><a target="_blank" href="redirect.php?url=http://miclub.com.co/"><div class="boton" id="runt"><img src="img/miclub.png"/></div></a></td>
            <td><a target="_blank" href="redirect.php?url=https://https://www.procuraduria.gov.co/CertWEB/inicio.aspx?tpo=1"><div class="boton" id="runt"><img src="img/procuraduria.png"/></div></a></td>
            <td><a target="_blank" href="redirect.php?url=https://www.registraduria.gov.co/-Cedula-de-Ciudadania,3689-.html"><div class="boton" id="runt"><img src="img/registraduria.png"/></div></a></td>
            <td><a target="_blank" href="redirect.php?url=https://antecedentes.policia.gov.co:7005/WebJudicial/antecedentes.xhtml"><div class="boton" id="runt"><img src="img/policiaant.png"/></div></a></td>
            <td><a target="_blank" href="redirect.php?url=https://srvpsi.policia.gov.co/PSC/frm_cnp_consulta.aspx"><div class="boton" id="runt"><img src="img/conpolicia.png"/></div></a></td>
            <td><a target="_blank" href="redirect.php?url=http://www.ebsa.com.co/nue/fac/SitePages/Consulta%20e%20imprime%20tu%20factura.aspx"><div class="boton" id="runt"><img src="img/ebsalogo.png"/></div></a></td>
            <td><a target="_blank" href="redirect.php?url=https://www.axacolpatria.co/consulta-poliza/"><div class="boton" id="runt"><img src="img/colpatria.png"/></div></a></td>
        </tr>
    </table>
    
    <!--***************************************** main  simuladores *****************************************-->
    
    <table id="main_simuladores" name="main_simuladores">
    <tr><td colspan="6">Simulador</td></tr>
		<tr>
        	<td><a target="_blank" href="redirect.php?url=http://jer.com.co/index.php/resultados/simuladores"><div class="boton" id="chance"><img src="img/chance.png" /></div></a></td>
            <td><a target="_blank" href="redirect.php?url=http://jer.com.co/index.php/resultados/simuladores"><div class="boton" id="migiro"><img src="img/giros.png"/></div></a></td>
            <td><a target="_blank" href="redirect.php?url=http://jer.com.co/index.php/resultados/simuladores"><div class="boton" id="migiro"><img src="img/soat.png"/></div></a></td>
        </tr>
    </table>
    
    
        <!--***************************************** main  pico y placa *****************************************-->
    
    <table id="main_pico_placa" name="main_pico_placa">
    <tr><td colspan="6">Pico y Placa</td></tr>
		<tr>
        	<td><a target="_blank" href="redirect.php?url=http://www.comunidad-ola.com/portal/index.php/operadores/claro-colombia/pico-y-placa-claro"><div class="boton" id="chance"><img src="img/claro1.png"/></div></a></td>
            <td><a target="_blank" href="redirect.php?url=http://www.comunidad-ola.com/portal/index.php/todo-sobre-tigo-sp-924430574/dia-tigo-colombia"><div class="boton" id="migiro"><img src="img/tigo3.png"/></div></a></td>
            <td><a target="_blank" href="redirect.php?url=http://www.fullcarga.com.co/productos/promociones"><div class="boton" id="migiro"><img src="img/movistar2.png"/></div></a></td>
        </tr>
    </table>
    
    <!--***************************************** main  Pico y placa*****************************************-->
    
    <!--***************************************** main  PLAN PREMIOS *****************************************-->
    
    
    
    <table id="main_plan_premios" name="main_plan_premios">
    <tr><td colspan="6">Premios</td></tr>
		<tr>
            <td><a target="_blank" href="redirect.php?url=http://jer.com.co/index.php/resultados/plan-de-premios"><div class="boton" id="bogota"><img src="img/icono loterias.png"/></div></a></td>
            <td><a target="_blank" href="redirect.php?url=http://jer.com.co/index.php/portafolio/juegos-de-azar"><div class="boton" id="migiro"><img src="img/logojer.png"/></div></a></td>
        </tr>
    </table>
    
    <!--***************************************** main  resultados *****************************************-->
    
    <table id="main_resultados">
    <tr><th colspan="6">Paginas de Resultados</th></tr>
    <tr>
        <td><a target="_blank" href="redirect.php?url=http://jer.com.co/index.php/resultados"><img class="loteriaicono" src="img/logojer.png"/><div class="boton" id="astro">JER Resultados</div></a></td>
        </tr>
		<tr>
        <td><a target="_blank" href="redirect.php?url=http://resultadodelaloteria.com/colombia/"><img class="loteriaicono" src="img/resultadoloteria.png"/><div class="boton" id="chance">Resultado Loteria</div></a></td>
        </tr>
        <tr>
        <td><a target="_blank" href="redirect.php?url=http://www.loteriasdehoy.com/"><img class="loteriaicono" src="img/loteriasdehoy.png"/><div class="boton" id="astro">Loterias de hoy</div></a></td>
        </tr>
        <tr>
        <td><a target="_blank" href="redirect.php?url=http://www.lasdeportivas.com.co/"><img class="loteriaicono" src="img/resultadosdeportivas.png"/><div class="boton" id="astro">Las Deportivas</div></a></td>
        </tr>
        
    </table>
    
    <!--***************************************** fin main resultados *****************************************-->
    <!--***************************************** main  municipios *****************************************-->
    
    
    
    <!--***************************************** fin main  municipios *****************************************-->

    <!--***************************************** main  NURA *****************************************-->
    
    <table id="main_busqueda_nura">
    <tr><th colspan="6">Codigos Nura</th></tr>
    <tr>
        <td>Busqueda</td>
    </tr>
    <tr>
        <td>
        <input id="txt_vb_nura"  type="text" />
        <script charset="UTF-8">
		var varchatid=0;
		var varchatidini=9999999999999999999999999999999999;
		
		/********************utf8*************************/
		function encode_utf8(s) {
		  return unescape(encodeURIComponent(s));
		}
		
		function decode_utf8(s) {
		  return decodeURIComponent(escape(s));
		}
		/********************utf8*************************/
		
		function fn_traer_vb_nura(valb){
			  if(1==1){
				  $("#main_tbl_resultados_nura tbody").html("");
				  var url="ajax.php";
				  var valbus=valb;
				  $.ajax({
					  type: "POST",
					  dataType: "json",
					  encoding:"UTF-8",
					  url: url,
					  data:{operacion:"traer_vb_nura",valor:valbus}, // Adjuntar los campos del formulario enviado.
						success: function(data1){
							$("#div_main_resultados_nura").css('display','block');
							if(data1.error==1){
								$("#main_tbl_resultados_nura tbody").html("<tr><td colspan='7'>"+data1.msj+"</td></tr>");
								}
							setTimeout(ocultar_div_nura,60000);
							$.each(data1.elementos, function (index,value) {
							   $("#main_tbl_resultados_nura tbody").append("<tr><td>"+data1.elementos[index].codigo_nura+"</td><td>"+data1.elementos[index].empresa+"</td><td>"+data1.elementos[index].convenio+"</td><td>"+data1.elementos[index].sigla+"</td><td>"+data1.elementos[index].categoria+"</td><td>"+data1.elementos[index].dato_captura+"</td><td>"+data1.elementos[index].modalidad_captura+"</td>	</tr>");
							   $("#main_tbl_resultados_nura");
							});
						}
				  });
			  }
			}
			
			function fn_val_traer_vb_nura(){
			var valor=$("#txt_vb_nura").val();
			  if(valor.length>2){
				  fn_traer_vb_nura(valor);
				  }
			}
		function ocultar_div_nura(){
			$("#div_main_resultados_nura").css('display','none');
			}
		
		function  cargarchat(){
			
			var url="ajaxchat.php";
				  var valbus="";
				  $.ajax({
					  type: "POST",
					  dataType: "json",
					  encoding:"UTF-8",
					  url: url,
					  data:{operacion:"cargarchat",valor:valbus}, // Adjuntar los campos del formulario enviado.
					  success: function(data1){
						  $("#table_chat_grupal #table_mensajes tbody").html("");
						  $.each(data1.elementos, function (index,value) {
							  var valid=parseInt(data1.elementos[index].id);
							  if(valid>varchatid){varchatid=valid;}
							  if(valid<varchatidini){varchatidini=valid;}
							 $("#table_chat_grupal #table_mensajes  tbody").prepend("<tr class='"+data1.elementos[index].propio+"'><td class='punto'>"+data1.elementos[index].punto+"</td><td class='mensaje'><div>"+data1.elementos[index].mensaje+"</div></td><td class='hora'>"+data1.elementos[index].fecha+"</td></tr>");
							
						  });
						  $("#table_chat_grupal #table_mensajes").scrollTop(9999);
						  }
					});
			}
/******************************************************cargar chats anteriores ***************************/
function  cargarchatants(){
	/* nose limpia 		$("#table_chat_grupal #table_mensajes tbody").html(""); */
			var url="ajaxchat.php";
				  var valbus="";
				  $.ajax({
					  type: "POST",
					  dataType: "json",
					  encoding:"UTF-8",
					  url: url,
					  data:{operacion:"cargarchatants",valor:valbus,varchatidini:varchatidini}, // Adjuntar los campos del formulario enviado.
					  success: function(data1){
						  $.each(data1.elementos, function (index,value) {
							  var valid=parseInt(data1.elementos[index].id);
							  if(valid>varchatid){varchatid=valid;}
							  if(valid<varchatidini){varchatidini=valid;}
							 $("#table_chat_grupal #table_mensajes  tbody").prepend("<tr class='"+data1.elementos[index].propio+"'><td class='punto'>"+data1.elementos[index].punto+"</td><td class='mensaje'><div>"+data1.elementos[index].mensaje+"</div></td><td class='hora'>"+data1.elementos[index].fecha+"</td></tr>");
							
						  });
						  /*$("#table_chat_grupal #table_mensajes").scrollTop(99999);*/
						  }
					});
			}			
/**********************************fincargar chats anteriores*****************************************/			
function  cargarchatrecientes(){
	/* nose limpia 		$("#table_chat_grupal #table_mensajes tbody").html(""); */
			var url="ajaxchat.php";
				  var valbus="";
				  $.ajax({
					  type: "POST",
					  dataType: "json",
					  encoding:"UTF-8",
					  url: url,
					  data:{operacion:"cargarchatrecientes",valor:valbus,varchatactual:varchatid}, // Adjuntar los campos del formulario enviado.
					  success: function(data1){
						  $.each(data1.elementos, function (index,value) {
							  var valid=parseInt(data1.elementos[index].id);
							  if(valid>varchatid){varchatid=valid;}
							  if(valid<varchatidini){varchatidini=valid;}
							 $("#table_chat_grupal #table_mensajes  tbody").append("<tr class='"+data1.elementos[index].propio+"'><td class='punto'>"+data1.elementos[index].punto+"</td><td class='mensaje'><div>"+data1.elementos[index].mensaje+"</div></td><td class='hora'>"+data1.elementos[index].fecha+"</td></tr>");
							
						  });
						  $("#table_chat_grupal #table_mensajes").scrollTop(99999);
						  }
					});
			}			
			
		function  enviarmensaje(){
			var url="ajaxchat.php";
			
				  var vvalmensaje=$("textarea#mensaje").val();
				  var vvalpunto=$("input#punto").val();
				  if (vvalmensaje==""){alert("no hay mensaje");return ;}
				  if (vvalpunto==""){alert("ingrese porfavor el nombre del punto donse se encuentra en el campo PUNTO");return ;}
				  $("textarea#mensaje").val("")
				  $.ajax({
					  type: "POST",
					  dataType: "json",
					  encoding:"UTF-8",
					  url: url,
					  data:{operacion:"enviarmensaje",valor:"",valmensaje:vvalmensaje,valpunto:vvalpunto}, // Adjuntar los campos del formulario enviado.
					  success: function(data1){
						  varchatid=varchatid++;
						  console.log(data1.msj);
						  cargarchatrecientes();
						  }
					});
			}
			function  validmensaje(){
				/*para conocer el scroll*/
				var scrolltablemsj =$("#table_chat_grupal #table_mensajes").scrollTop();
				var altotablemsj=$("#table_chat_grupal #table_mensajes tbody").height()-433;
				if(altotablemsj==scrolltablemsj){}else{};
				
			var url="ajaxchat.php";
				  $.ajax({
					  type: "POST",
					  dataType: "json",
					  encoding:"UTF-8",
					  url: url,
					  data:{operacion:"validmensaje",valor:varchatid}, // Adjuntar los campos del formulario enviado.
					  success: function(data1){
						  varchatid=varchatid++;
						  console.log(data1.msjid);
						  if(parseInt(data1.msjid) > varchatid){
							  cargarchatrecientes();
							  }
						  }
					});
			}
        </script>
        </td>
    </tr>
    <tr>
        <td>
        <p class="btnstyle" onClick="fn_val_traer_vb_nura()">Buscar</p>
        </td>
    </tr>
        
    </table>
    
    <!--***************************************** fin main  NURA *****************************************-->


       <!--***************************************** main  codigos nura*****************************************-->
    
    <table id="main_codigos_nura">
    <tr><td colspan="6"><a target="_blank" href=""><img src="img/consulte aqui.fw.png"/></a></td></tr>
		
        <tr>
        	<td><a target="_blank" href="redirect.php?url=archivos.php?url=jer/Manuales"><div class="codigos" id="boyaca">Manuales</div></a></td>
        </tr>
        <tr>
        	<td><a target="_blank" href="redirect.php?url=archivos.php?url=jer/Guias_Rapidas"><div class="codigos" id="boyaca">Guias</div></a></td>
        </tr>
        
    </table>
    
    <!--***************************************** main  resultados *****************************************-->
       <!--***************************************** main otros enlaces*****************************************-->
    
    <table id="main_otros_enlaces">
		<tr>
	    <td colspan="2" class="titulo">Nuevo</td></tr>
		<tr>
        <tr>
        <td><a target="_blank" href="redirect.php?url=https://www.baloto.com/"><div class="boton" id="b2bbaloto"><img src="img/baloto.png" /></div></a></td>
        
        <td><a target="_blank" href="redirect.php?url=http://intranetjer.com/"><div class="boton" id="jerpagina"><img src="img/intranet.png" /></div></a></td>
        
        </tr>
        
    </table>
    
    <!--***************************************** main vert enlaces *****************************************-->
    
    
    <table id="main_nuevos_enlaces">
		<tr>
	    <td colspan="1" class="titulo">Nuevos</td><td></td><td></td><td></td><td></td><td></td><td>Ayuda</td><td></td></tr>
<td><a target="_blank" href="redirect.php?url=https://tienda.betplay.com.co"><div class="boton" id="runt"><img src="img/betplay.png"/></div></a></td>
        <td><a target="_blank" href="redirect.php?url=http://www.chancemillonario.com/"><div class="boton" id="btnchmillonario"><img src="img/juegosdeazarchancemillonario.png" /></div></a></td>

        <td><a target="_blank" href="redirect.php?url=https://www.baloto.com/"><div class="boton" id="btnbaloto"><img src="img/baloto.png" /></div></a></td>

<td><a target="_blank" href="redirect.php?url=https://capacitacion.sured.com.co/login/app"><div class="boton" id="sured"><img src="img/learningweb.fw.png" /></div></a></td>

	
    <td><a target="_blank" href="redirect.php?url=https://jer.com.co/admin_conecta"><div class="boton" id="btnconecta"><img src="img/jersos.fw.png" /></div></a></td>
    <td><a target="_blank" href="redirect.php?url=http://jer.matrixtech.com.co/sigapos"><div class="boton" id="btnsigapos"><img src="img/sigapos.png" /></div></a></td>
    <td><a target="_blank" href="redirect.php?url=http://190.69.156.140:2805/portaljer/jer/Manuales/Manual%20Primeros%20Auxilios.pdf"><div class="boton" id="ayuda"><img src="img/imgayuda.png" /></div></a></td>
    <td><a target="_blank" href="redirect.php?url=https://forms.gle/iYZfD3pmEsRUVYqd7"><div class="boton" id="blanco"><img src="img/promform.png" /></div></a></td>
        </tr>
        
    </table>
    
    <!--***************************************** main vert enlaces *****************************************-->
    
     <!--***************************************** main  ACERCA DE*****************************************-->
    
    <table id="main_acercade">
    <tr><td colspan="6"><a target="_blank" ><img src="img/favicon.png"/>Creacion: Robinson Medina</a></td></tr>
		<tr>
        </tr>
    </table>
    
    <!--***************************************** MAIN Acerca de *****************************************-->
    <!--***************************************** main  ACERCA DE*****************************************-->
    <div id="div_main_resultados_nura">
    <table id="main_tbl_resultados_nura">
    <thead><tr><th>Nura</th><th>Empresa</th><th>Convenio</th><th>Sigla</th><th>Categoria</th><th>Dato Captura</th><th>Modalidad captura</th></tr></thead>
    <tbody></tbody>
    <tfoot><td colspan="7"><div class="btnstyle" onClick="ocultar_div_nura()">Ocultar</div></td></tfoot>
    </table>
    </div>
    <!--***************************************** MAIN Acerca de *****************************************-->
    
    
    <script>
    </script>
	</body>
</html>
