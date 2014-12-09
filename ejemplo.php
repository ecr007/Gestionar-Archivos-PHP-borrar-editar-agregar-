<?php 
  function archivo($nombre, $tipo, $texto="", $tamanio="") {
		$tipo = strtolower($tipo);
		$permiso = array('leer'=>'r','sustituir'=>'w+','grabar'=>'a+', 'borrar'=>'0');
	
			if($permiso[$tipo] != '0'){
			if($permiso[$tipo] == 'r'){
				//leer
				$read = @file_get_contents($nombre);
			
				return $read;
			}else {
				//grabar
				$fp = fopen($nombre,$permiso[$tipo]);
				$read = fwrite($fp, $texto, $tamanio);
			
				fclose($fp);
				return $read;
			}
		}else {
			$read = unlink($nombre);
			return $read;
		}
	}
?>
