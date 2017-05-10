<?php

	$conn = new mysqli("localhost" , "root" , "123456" , "colegio");

	echo 'Contenido de la variable $conn = new mysqli("localhost" , "root" , "123456" , "colegio"). ';
	var_dump($conn);
	

	$sql = "SELECT * FROM alumno";

	echo 'Contenido de la variable $sql = SELECT * FROM alumno. ';
	var_dump($sql);
	

	$result = $conn->query($sql);

	echo 'Contenido de la variable $result = $conn->query($sql). ';
	var_dump($result);

	while ($fila = $result -> fetch_assoc()) {
		var_dump($result -> fetch_assoc());
		var_dump($fila);
	}

	$conn->close();

?>

