<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("plano.php");
function acomodartexto($texto,$cantidad){
	     $valtexto=$texto;
		 $largocadlin=$cantidad;
		  $cnt=0;
		  $largostrini=strlen($valtexto);
		  $largoactual=$largostrini;
		  $cadfinal="";
		  if ($largoactual<$largocadlin){$cadfinal=$valtexto;}else{
			while($largoactual>$largocadlin){
				$cadtemp=substr($valtexto,$cnt,$largocadlin);
				$numtemp=strripos($cadtemp," ");
				  if ($numtemp==false){
					  $cadfinal=$cadfinal.substr($valtexto,$cnt,$largocadlin)."<br \>";
					  $cnt=$cnt+$largocadlin;
					  $largoactual=$largoactual-$largocadlin;
				  }elseif($numtemp>=0){
					  $cadfinal=$cadfinal.substr($valtexto,$cnt,$numtemp)."<br \>";
					  $cnt=$cnt+$numtemp;
					  $largoactual=$largoactual-$numtemp;
				  };
			 }
			 if($largoactual>0){$cadfinal=$cadfinal.substr($valtexto,$cnt)."<br \>";}
		  }
	  return $cadfinal;
	}
if(1==1){
	if(isset($_POST['operacion']) & isset($_POST['valor'])){
		$valor=rawurldecode(utf8_decode($_POST['valor']));
		$operacion=$_POST['operacion'];
		switch ($operacion){
		
			
		case "cargarchat":
		escribir('se carga el chat');
		include('funciones.php');
		if(isset($_COOKIE['equiponro'])){
		$nequipo=$_COOKIE['equiponro'];
		}else{
		$nequipo=0;
		}
		$sql="SELECT * FROM `chat_grupal` WHERE 1 ORDER BY id DESC LIMIT 20";
		$result=ejecutarsql($sql);
		if ($result){
			$num_rows = mysqli_num_rows($result);
			if ($num_rows > 0) {
				$info = array('elementos' => array());
				$numcampos=mysqli_num_fields($result);
				for($i=0;$i<$numcampos;$i++){
				}
				$cnt=0;
				while($row= mysqli_fetch_array($result)){
						ksort($row);
						array_slice($row,1,$numcampos,true);
						$info['elementos'][$cnt]['id']=$row['id'];
						$info['elementos'][$cnt]['punto']=acomodartexto($row['punto'],10);
						$info['elementos'][$cnt]['mensaje']=acomodartexto($row['mensaje'],34);
						$info['elementos'][$cnt]['fecha']=substr($row['fecha'], 10, 6);
						$info['elementos'][$cnt]['ideqportal']=$row['ideqportal'];
						$propio=1;
						if($row['ideqportal']==$nequipo){$propio="si";}else{$propio="no";}
						$info['elementos'][$cnt]['propio']=$propio;
						for($i=0;$i<$numcampos;$i++){
					}
					$cnt++;
				}
				echo json_encode($info);
			}else{echo"numero de columnas menor a 0";}
		}
		
		break;
		
		
		case "cargarchatrecientes":
		escribir('se ejecuta la funcion de cargar los chats recientes');
		include('funciones.php');
		if(isset($_COOKIE['equiponro'])){
		$nequipo=$_COOKIE['equiponro'];
		}else{
		$nequipo=0;
		}
		if(isset($_POST['varchatactual'])){$varchatactual=$_POST['varchatactual'];}else{return "sin id chat actual";}
		$sql="SELECT * FROM `chat_grupal` WHERE id>".$varchatactual." ORDER BY id ASC";
		$result=ejecutarsql($sql);
		if ($result){
			$num_rows = mysqli_num_rows($result);
			if ($num_rows > 0) {
				$info = array('elementos' => array());
				$numcampos=mysqli_num_fields($result);
				for($i=0;$i<$numcampos;$i++){
				}
				$cnt=0;
				while($row= mysqli_fetch_array($result)){
						ksort($row);
						array_slice($row,1,$numcampos,true);
						$info['elementos'][$cnt]['id']=$row['id'];
						$info['elementos'][$cnt]['punto']=acomodartexto($row['punto'],10);
						$info['elementos'][$cnt]['mensaje']=acomodartexto($row['mensaje'],34);
						$info['elementos'][$cnt]['fecha']=substr($row['fecha'], 10, 6);
						$info['elementos'][$cnt]['ideqportal']=$row['ideqportal'];
						$propio=1;
						if($row['ideqportal']==$nequipo){$propio="si";}else{$propio="no";}
						$info['elementos'][$cnt]['propio']=$propio;
						for($i=0;$i<$numcampos;$i++){
					}
					$cnt++;
				}
				echo json_encode($info);
			}else{echo"numero de columnas menor a 0";}
		}
		
		break;
		

		case "cargarchatants":
		escribir('cargachatants');
		include('funciones.php');
		if(isset($_COOKIE['equiponro'])){
		$nequipo=$_COOKIE['equiponro'];
		}else{
		$nequipo=0;
		}
		if (isset($_POST['varchatidini'])){$valchatidini=$_POST['varchatidini'];}else{return "error";}
		$sql="SELECT * FROM `chat_grupal` WHERE id<".$valchatidini." ORDER BY id DESC LIMIT 10";
		$result=ejecutarsql($sql);
		if ($result){
			$num_rows = mysqli_num_rows($result);
			if ($num_rows > 0) {
				$info = array('elementos' => array());
				$numcampos=mysqli_num_fields($result);
				for($i=0;$i<$numcampos;$i++){
				}
				$cnt=0;
				while($row= mysqli_fetch_array($result)){
						ksort($row);
						array_slice($row,1,$numcampos,true);
						$info['elementos'][$cnt]['id']=$row['id'];
						$info['elementos'][$cnt]['punto']=acomodartexto($row['punto'],10);
						$info['elementos'][$cnt]['mensaje']=acomodartexto($row['mensaje'],34);
						$info['elementos'][$cnt]['fecha']=substr($row['fecha'], 10, 6);
						$info['elementos'][$cnt]['ideqportal']=$row['ideqportal'];
						$propio=1;
						if($row['ideqportal']==$nequipo){$propio="si";}else{$propio="no";}
						$info['elementos'][$cnt]['propio']=$propio;
						for($i=0;$i<$numcampos;$i++){
					}
					$cnt++;
				}
				echo json_encode($info);
			}else{echo"numero de columnas menor a 0";}
		}
		
		break;


		case "enviarmensaje":
		escribir('se recibe un mensaje y se guardara en la bd');
		include('funciones.php');
		if (isset($_POST['valpunto']) and isset($_POST['valmensaje'])){
		  $valpunto=$_POST['valpunto'];
		  $valmensaje=$_POST['valmensaje'];
		if(isset($_COOKIE['equiponro'])){
		$nequipo=$_COOKIE['equiponro'];
		}else{
		$nequipo=0;
		}
		$sqleq="INSERT INTO `chat_grupal_eq`(`id`, `idportal`, `nombrepto`) VALUES (null,'".$nequipo."','".$valpunto."')";
		$result=ejecutarsql($sqleq);
		  if ($result==1){$resultado="Exitoso pto";}else{$resultado="Negativo pto";}
		  $sql="INSERT INTO `chat_grupal`(`id`, `punto`, `mensaje`, `fecha`, `ideqportal`) VALUES (null,'".$valpunto."','".$valmensaje."','".date('Y-m-d G:i:s')."',".$nequipo.")";
		  $result=ejecutarsql($sql);
		  if ($result==1){$resultado="Exitoso";}else{$resultado="Negativo";}
		  $info['msj']=$resultado;
		  $info['error']="";
		  
			  echo json_encode($info);
		  
		}
		
		break;
		case "validmensaje":
		escribir('se valida mensaje');
		include('funciones.php');
		if (isset($_POST['valor'])){
		  $sql="select max(id) FROM chat_grupal";
		  $result=sqlretstring($sql);
		  $info['msjid']=$result;
		  $info['error']="";
		  
			  echo json_encode($info);
		  
		}
		
		break;
		
		
		
			
		case "traer_campos_nura":
		escribir('se consulta campos codigos nura');
		include('funciones.php');
		$sql="show fields from portaljer_codnura";
		$result=ejecutarsql($sql);
		if ($result){
			$num_rows = mysqli_num_rows($result);
			if ($num_rows > 0) {
				$info = array('elementos' => array());
				$numcampos=mysqli_num_fields($result);
				for($i=0;$i<$numcampos;$i++){
				}
				$cnt=0;
				while($row= mysqli_fetch_array($result)){
						ksort($row);
						array_slice($row,1,$numcampos,true);
						$info['elementos'][$cnt]['nombre']=$row['Field'];
						$info['elementos'][$cnt]['tipo']=$row['Type'];
						for($i=0;$i<$numcampos;$i++){
					}
					$cnt++;
				}
				echo json_encode($info);
			}else{echo"numero de columnas menor a 0";}
		}
		
		break;
		
		
		
		
		
		case "traer_vb_nura":
		escribir('se consultan codigos Nura');
		$error=0;
		$msj="";
		include('funciones.php');
		$sql="SELECT * FROM `portaljer_codnura` WHERE codigo_nura LIKE('%com%') OR empresa LIKE('%$valor%') OR convenio LIKE('%$valor%') OR sigla LIKE('%$valor%') OR categoria LIKE('%$valor%')";
		$result=ejecutarsql($sql);
		$info = array('elementos' => array());
		if ($result){
			$num_rows = mysqli_num_rows($result);
			
			if ($num_rows > 0) {
				$numcampos=mysqli_num_fields($result);
				for($i=0;$i<$numcampos;$i++){
				}
				$cnt=0;
				while($row= mysqli_fetch_array($result)){
						ksort($row);
						array_slice($row,1,$numcampos,true);
						$info['elementos'][$cnt]['id']=$row['id'];
						$info['elementos'][$cnt]['codigo_nura']=$row['codigo_nura'];
						$info['elementos'][$cnt]['empresa']=$row['empresa'];
						$info['elementos'][$cnt]['convenio']=$row['convenio'];
						$info['elementos'][$cnt]['sigla']=$row['sigla'];
						$info['elementos'][$cnt]['categoria']=$row['categoria'];
						$info['elementos'][$cnt]['dato_captura']=$row['dato_captura'];
						$info['elementos'][$cnt]['modalidad_captura']=$row['modalidad_captura'];
						for($i=0;$i<$numcampos;$i++){
					}
					$cnt++;
				}
				
			}else{$error=1;$msj="no se encontraron resultados para el criterio de busqueda";}
		}
		$info['msj']=$msj;
		$info['error']=$error;
		echo json_encode($info);
		break;
		

		
		
		}
		
	}
	
}

?>