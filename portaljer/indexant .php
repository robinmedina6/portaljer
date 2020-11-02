<?php
session_start();
$_SESSION['nombre']="anonimo";
/****************** visitas contador *******************/
$urlarchivo="visitas.txt";
$visitas=0;
if($fp = fopen($urlarchivo,"r+")){
	    while(!feof($fp)) {
			$visitas = fgets($fp);
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
/*******************fin visitas******************/
?>
<html>
<head>
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
		 min-width:1000px;
		 }
		 /*-----------------titulo-----------------*/
		 #encabezado{
			 font-size:20px;
			 color:#0030;
			 text-align:center;
			 background-color:rgba(200,225,255,0.5)
			 
			 }
			 
		 /*-----------------titulo-----------------*/
		 /*-----------------contador de visitas-----------------*/
		 #contador_visitas{
			 position:absolute;
			 left:1180px;
			 top:10px;
			 font-size:20px;
			 color:rgba(255,255,255,1);
			 text-align:center;
			 background-color:rgba(0,0,51,1);
			 border-radius:5px;
			 
			 }
			 
		 /*-----------------titulo-----------------*/		 
		 
		 /*------------------slide--------------*/
		 #wowslider-container1{
			 display:inline-block;
			 margin:30px 0px 0px 100px;
			 box-shadow:0px 0px 10px rgba(255,255,255,1);
			 
			 
			 }
		 /*------------------slide--------------*/
		  /*------------------Logo JER--------------*/
		 #logojer{
			 display:block;
			 position:absolute;
			 left:1050px;
			 top:50px;
			 
			 
			 }
		 /*------------------Logo JER--------------*/
		 /*------------------Logo portal--------------*/
		 #logoportal{
			 display:block;
			 position:absolute;
			 left:820px;
			 top:20px;
			 
			 
			 }
		 /*------------------Logo portal--------------*/
		 
		 /*************************botones **************************/
		 
		 
		 /****************generales**************/
		 
		 .boton > img:hover{
				background-color:rgba(255,255,255,0.8);
				box-shadow:0px 0px 10px rgba(255,255,255,1);
				
				}
		 
		 
		 
		 #main_botones{
			 position:absolute;
			 left:80px;
			 top:340px;
			 border:rgba(0,0,0,1) 1px solid;
			 border-radius:10px;
			 background-color:rgba(200,225,255,0.6);
			 font-size:45px;
			 color:rgba(255,0,0,1);
			 font-family:"Comic Sans MS", cursive;
			 font-weight:bold;
			 }
		#main_botones .boton > img{
				width:80px;
				height:50px;
				margin:3px 3px;
				}
		
				/*************************simuladores*********************/
				
		#main_simuladores{
			 position:absolute;
			 left:80px;
			 top:475px;
			 border:rgba(0,0,0,1) 1px solid;
			 border-radius:10px;
			 background-color:rgba(200,225,255,0.8);
			 font-size:45px;
			 color:rgba(255,0,0,1);
			 font-family:"Comic Sans MS", cursive;
			 font-weight:bold;
			 }
		#main_simuladores .boton > img{
				width:60px;
				height:60px;
				margin:0px 0px;
				}
				
				/*************************simuladores*********************/
				/*************************plan de premios*********************/
				
		#main_plan_premios{
			 position:absolute;
			 left:350px;
			 top:475px;
			 border:rgba(0,0,0,1) 1px solid;
			 border-radius:10px;
			 background-color:rgba(200,225,255,0.8);
			 font-size:45px;
			 color:rgba(255,0,0,1);
			 font-family:"Comic Sans MS", cursive;
			 font-weight:bold;
			 }
		#main_plan_premios .boton > img{
				width:100px;
				height:60px;
				margin:0px 0px;
				}
		 /*************************fin plan de premis*********************/
		 /*************************resultados*********************/
				
		#main_resultados{
			 position:absolute;
			 left:800px;
			 top:200px;
			 border:rgba(0,0,0,1) 1px solid;
			 background-color:rgba(255,255,255,1);
			 font-size:20px;
			 color:rgba(0,102,204,1);
			 }
			#main_resultados th{
				font-family:"Palatino Linotype", "Book Antiqua", Palatino, serif;
				background-color:rgba(204,204,204,0.5);
				font-weight:bold;
				padding:10px 50px; 
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
			 left:1120px;
			 top:200px;
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

		 /*************************plan  codigos nura*********************/
				
		#main_codigos_nura{
			 position:absolute;
			 left:800px;
			 top:470px;
			 border:rgba(0,0,0,1) 1px solid;
			 background-color:rgba(200,225,255,0.8);
			 font-size:20px;
			 color:rgba(0,102,204,1);
			 }
		#main_codigos_nura .codigos{
			text-align:center;
			font-size:18px;				}
		 /*************************fin plan de premis*********************/
	</style>
 
</head>
	<body>
    	<div id="encabezado">
        
        </div>
        <div id="contador_visitas"><div id="lectura">Visitantes</div><div id="numero"><?php echo $visitas.""; ?></div></div>             
                      
                         
<!-- Start WOWSlider.com BODY section -->
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
                      <!-- End WOWSlider.com BODY section 
<!-- End WOWSlider.com BODY section -->
<!-- ++++++++++++++++++ logo jer +++++++++++++++++++  -->
<div id="logojer"><img src="img/logojer.png"></div>
<div id="logoportal"><img src="img/logoportal.png"></div>
<!-- ++++++++++++++++++ logo jer +++++++++++++++++++  -->

    <table id="main_botones">
    <tr><td colspan="6">Enlaces</td></tr>
		<tr>
        	<td><a target="_blank" href="http://www.jer.com.co"><div class="boton" id="jerpagina"><img src="img/logojer.png" /></div></a></td>
            <td><a target="_blank" href="https://www.runt.com.co/portel/libreria/php/01.030518.html"><div class="boton" id="runt"><img src="img/runt.png"/></div></a></td>
            <td><a target="_blank" href="http://190.131.218.87:9080/sigapos/jsp/login.jsp"><div class="boton" id="runt"><img src="img/sigapos.png"/></div></a></td>
            <td><a target="_blank" href="http://jer.com.co/miclub/login.html"><div class="boton" id="runt"><img src="img/miclub.png"/></div></a></td>
            <td><a target="_blank" href="http://siri.procuraduria.gov.co:8086/certWEB/Certificado.aspx?tpo=2"><div class="boton" id="runt"><img src="img/procuraduria.png"/></div></a></td>
            <td><a target="_blank" href="https://www.axacolpatria.co/consulta-poliza/"><div class="boton" id="runt"><img src="img/colpatria.png"/></div></a></td>
        </tr>
    </table>
    
    <!--***************************************** main  simuladores *****************************************-->
    
    <table id="main_simuladores">
    <tr><td colspan="6">Simuladores</td></tr>
		<tr>
        	<td><a target="_blank" href="http://jer.com.co/index.php/resultados/simuladores"><div class="boton" id="chance"><img src="img/chance.png" /></div></a></td>
            <td><a target="_blank" href="http://jer.com.co/index.php/resultados/simuladores"><div class="boton" id="astro"><img src="img/astro.png"/></div></a></td>
            <td><a target="_blank" href="http://jer.com.co/index.php/resultados/simuladores"><div class="boton" id="migiro"><img src="img/giros.png"/></div></a></td>
            <td><a target="_blank" href="http://jer.com.co/index.php/resultados/simuladores"><div class="boton" id="migiro"><img src="img/soat.png"/></div></a></td>
        </tr>
    </table>
    
    <!--***************************************** main  PLAN PREMIOS *****************************************-->
    
    <table id="main_plan_premios">
    <tr><td colspan="6">Plan Premios</td></tr>
		<tr>
            <td><a target="_blank" href="http://jer.com.co/index.php/resultados/plan-de-premios"><div class="boton" id="bogota"><img src="img/icono loterias.png"/></div></a></td>
            <td><a target="_blank" href="http://jer.com.co/index.php/portafolio/juegos-de-azar"><div class="boton" id="migiro"><img src="img/logojer.png"/></div></a></td>
        </tr>
    </table>
    
    <!--***************************************** main  resultados *****************************************-->
    
    <table id="main_resultados">
    <tr><th colspan="6">Paginas de Resultados</th></tr>
    <tr>
        <td><a target="_blank" href="http://jer.com.co/index.php/resultados"><img class="loteriaicono" src="img/logojer.png"/><div class="boton" id="astro">JER Resultados</div></a></td>
        </tr>
		<tr>
        <td><a target="_blank" href="http://resultadodelaloteria.com/colombia/"><img class="loteriaicono" src="img/resultadoloteria.PNG"/><div class="boton" id="chance">Resultado Loteria</div></a></td>
        </tr>
        <tr>
        <td><a target="_blank" href="http://www.loteriasdehoy.com/"><img class="loteriaicono" src="img/loteriasdehoy.PNG"/><div class="boton" id="astro">Loterias de hoy</div></a></td>
        </tr>
        <tr>
        <td><a target="_blank" href="http://www.lasdeportivas.com.co/"><img class="loteriaicono" src="img/resultadosdeportivas.png"/><div class="boton" id="astro">Las Deportivas</div></a></td>
        </tr>
        
    </table>
    
    <!--***************************************** fin main resultados *****************************************-->
    <!--***************************************** main  municipios *****************************************-->
    
    <table id="main_lista_municipios">
    <tr><th colspan="6">Municipios</th></tr>
    <tr>
        <td>
        Municipio
        </td>
    </tr>
    <tr>
        <td>
        <input id="txt_nom_municipio"  value=""  onKeyUp="validar_t_municipios()" onChange="traer_municipios()" onSelect="traer_departamento()" on list="listamunicipios" />
        <script charset="UTF-8">
		/********************utf8*************************/
		function encode_utf8(s) {
		  return unescape(encodeURIComponent(s));
		}
		
		function decode_utf8(s) {
		  return decodeURIComponent(escape(s));
		}
		/********************utf8*************************/
		
		
		function validar_t_municipios(){
			var valor=$("#txt_nom_municipio").val();
			  if(valor.length>2 && (valor.length%2)==1){
				  traer_municipios();
				  }
			  
			}
		function traer_municipios(){
			  var valor= encode_utf8($("#txt_nom_municipio").val());
			  if(1==1){
				  $("#listamunicipios").html("");
				  var url="ajax.php";
				  $.ajax({
					  type: "POST",
					  dataType: "json",
					  encoding:"UTF-8",
					  url: url,
					  data:{operacion:"consultar_municipio",valor:valor}, // Adjuntar los campos del formulario enviado.
						success: function(data1){
							$.each(data1.elementos, function (index,value) {
							   $("#listamunicipios").append("<option>"+data1.elementos[index].nombre+"</option>");
							});
							traer_departamento();
						}
				  });
			  }
			}
		function traer_departamento(){
			
			  var valor=encode_utf8($("#txt_nom_municipio").val());
			  if(valor.length>2){
				  $("#divdepartamento").html("");
				  var url="ajax.php";
				  $.ajax({
					  type: "POST",
					  dataType: "json",
					  encoding:"UTF-8",
					  url: url,
					  data:{operacion:"consultar_departamento",valor:valor}, // Adjuntar los campos del formulario enviado.
						success: function(data){
							   $("#divdepartamento").html(data.departamentos);
							   $.each(data.departamentos, function (index,value) {
							   $("#divdepartamento").append("<div>"+data.departamentos[index].nombre+"</div><br>");
							});
						}
				  });
			  }
			}
		
        </script>
        </td>
    </tr>
    <tr>
        <td>
        Departamento
        </td>
    </tr>
    <tr>
        <td>
        <datalist id="listamunicipios"></datalist>
        <div id="divdepartamento"></div>
        </td>
    </tr>
        
    </table>
    
    <!--***************************************** fin main  municipios *****************************************-->
       <!--***************************************** main  codigos nura*****************************************-->
    
    <table id="main_codigos_nura">
    <tr><td colspan="6"><a target="_blank" href=""><img src="img/consulte aqui.fw.png"/></a></td></tr>
		<tr>
        	<td><a target="_blank" href=""><div class="codigos" id="boyaca">Codigos Nura</div></a></td>
        </tr>
    </table>
    
    <!--***************************************** main  resultados *****************************************-->
	</body>
</html>