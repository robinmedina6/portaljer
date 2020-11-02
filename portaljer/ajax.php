<?php

include("plano.php");
escribir("se envia datos para consultar municipio");

if(1==1){
	if(isset($_POST['operacion']) & isset($_POST['valor'])){
		$valor=rawurldecode(utf8_decode($_POST['valor']));
		$operacion=$_POST['operacion'];
		switch ($operacion){
		case "consultar_municipio":
		
		include('funciones.php');
		$sql="SELECT * FROM `municipio` WHERE nombre LIKE '%".$valor."%'";
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
						$info['elementos'][$cnt]['nombre']=$row['nombre'];
						$info['elementos'][$cnt]['id_departamento']=$row['id_departamento'];
						for($i=0;$i<$numcampos;$i++){
					}
					$cnt++;
				}
				echo json_encode($info);
			}else{echo"numero de columnas menor a 0";}
		}
		
		break;
		case "consultar_departamento":
		
		include('funciones.php');
		$sql="SELECT * FROM `municipio` WHERE nombre LIKE '%".$valor."%'";
		$result=ejecutarsql($sql);
		$num_rows = mysqli_num_rows($result);
			if ($num_rows > 0) {
				$info = array('municipios' => array());
				$numcampos=mysqli_num_fields($result);
				$cnt=0;
				while($row= mysqli_fetch_array($result)){
						ksort($row);
						array_slice($row,1,$numcampos,true);
						$info['municipios'][$cnt]['id']=$row['id'];
						$info['municipios'][$cnt]['nombre']=$row['nombre'];
						$info['municipios'][$cnt]['id_departamento']=$row['id_departamento'];
						for($i=0;$i<$numcampos;$i++){}
						$sql="SELECT * FROM `departamento` WHERE id =".$row['id_departamento']."";
						$result2=ejecutarsql($sql);
						if ($result2){
							  $num_rows2= mysqli_num_rows($result2);
							  if ($num_rows2 > 0) {
/*								  $info = array('departamentos' => array());*/
								  $numcampos2=mysqli_num_fields($result2);
								  while($row2= mysqli_fetch_array($result2)){
									  ksort($row2);
									  array_slice($row2,1,$numcampos2,true);
									  $info['departamentos'][$cnt]['id']=$row2['id'];
									  $info['departamentos'][$cnt]['nombre']=$row2['nombre'];
								  }
							  }else{echo"numero de columnas menor a 0";}
						}else{
						  echo"no consulta";		
						}
					$cnt++;
				}
				echo json_encode($info);
			}else{echo"numero de columnas menor a 0";}
		  
		
		
		break;
		}
		
	}
	
}

?>