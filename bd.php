<?php
/***********************************INFORMACIÓN OBTENIDA DE LA BASE DE DATOS INSECTA******************** */
/*Todas ellas son conexiones a la base de datos para obtener datos característicos de la zona donde se va a volcar el contenido ya sea cabeza, órdenes etc..*/ 

/*Con esta función aprovechamos la semejanza en el diseño html para mostrar los datos y en la configuración de la las tablas de la base de datos para con un parámetro obtener la información de cada parte del cuerpo. Así optimizamos el código */
function datos_cuerpo($partecuerpo) {
	$cadena_conexion='mysql:dbname=insecta;host=127.0.0.1';
    $usuario='root';
    $clave='';
	
	try{
		//guardo en un parámetro el array del error  
		$paramConn = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
		$bd = new PDO($cadena_conexion, $usuario, $clave, $paramConn);
		//buscamos los datos de todas las partes de las categorias que corresponden a cabeza
		$ins = "SELECT c.nombre_".$partecuerpo.", cat.nombre_categoria, cu.nombre, cu.ruta, cu.descripcion
		FROM ".$partecuerpo." c
		INNER JOIN categoria cat ON c.fkid_categoria = cat.id_categoria
		INNER JOIN cuerpo cu ON c.id_parte = cu.id_parte";
		
		$resul = $bd->query($ins);	
		if($resul){		
			return $resul->fetchAll(PDO::FETCH_ASSOC);		
		}else{
			return FALSE;
		}
	}catch(PDOException $e){
		echo "PDO error".$e->getMessage();
	}
}

/*Para las tablas que no están en relación con ninguna dentro de la base de datos, vamos a utilizar esta función que obtendrá todos los datos de la tabla seleccionada. Así evitamos hacer una función para cada una de ellas.*/
function datos_tabla($tabla){
	$cadena_conexion='mysql:dbname=insecta;host=127.0.0.1';
    $usuario='root';
    $clave='';
	
	try{
		//guardo en un parámetro el array del error  
		$paramConn = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
		$bd = new PDO($cadena_conexion, $usuario, $clave, $paramConn);
		//buscamos los datos de todas las partes de las categorias que corresponden a abdomen
		$ins = "SELECT * FROM ".$tabla;
		$resul = $bd->query($ins);	
		if($resul){		
			return $resul->fetchAll(PDO::FETCH_ASSOC);		
		}else{
			return FALSE;
		}
	}catch(PDOException $e){
		echo "PDO error".$e->getMessage();
	}
}

