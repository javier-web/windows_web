<?php

	echo "foobar";

	//echo "var_dump($_GET) contiene todos los campos";
	var_dump($_GET);

	//echo "$_GET['nombre'] contiene el campo nombre";
	var_dump($_GET['nombre']);
	
	//echo "$_GET['apellidos'] contiene el campo apellidos";
	var_dump($_GET['apellidos']);

	//echo "$_GET['date'] contiene el campo fecha";
	var_dump($_GET['date']);



	//echo "Insertamos en la tabla";
	
	$conn = new mysqli("localhost" , "root" , "" , "colegio");

	$sql = "INSERT INTO alumno (nombre, apellidos , fecha_nacimiento) VALUES ('" . $_GET['nombre'] . "' , '" . $_GET['apellidos'] . "' , '" . $_GET['date'] . "')";
	
	var_dump($conn);
	if ($conn -> connect_errno != 0) {
	echo "Lo sentimos. Contraseña incorrecta";
	} else {
	echo "Contraseña correcta";
	}

	var_dump($sql);

	
	
	
	$result = $conn->query($sql);
	
	$conn->close();


?>
