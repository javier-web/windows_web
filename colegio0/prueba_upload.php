<?php

	echo "foobar";

	//echo "var_dump($_POST) contiene todos los campos";
	var_dump($_POST);

	//echo "$_POST['nombre'] contiene el campo nombre";
	var_dump($_POST['nombre']);
	
	//echo "$_POST['apellidos'] contiene el campo apellidos";
	var_dump($_POST['apellidos']);

	//echo "$_POST['date'] contiene el campo fecha";
	var_dump($_POST['date']);


        //echo "$_POST['nota'] contiene el campo nota media";
	var_dump($_POST['nota']);

        //echo "$_POST['file'] contiene la imagen";
	var_dump($_POST['file']);




	//echo "Insertamos en la tabla";
	
	$conn = new mysqli("localhost" , "root" , "123456" , "colegio");

	$sql = "INSERT INTO alumno (curso_id, nombre, apellidos , fecha_nacimiento , nota, foto) 
                VALUES 
                        ('" . $_POST['curso'][id] . "' ,
                         '" . $_POST['nombre'] . "' ,
                         '" . $_POST['apellidos'] . "' ,
                         '" . $_POST['date'] . "' ,
                         '" . $_POST['nota'] . "' ,
                         '" . $_FILES['file'][name] . "')";
	
	var_dump($conn);
	if ($conn -> connect_errno != 0) {
	echo "Lo sentimos. Contraseña incorrecta";
	} else {
	echo "Contraseña correcta";
	}

	var_dump($sql);

        var_dump($_FILES);
        //var_dump($_FILES['tmp_name']);
        move_uploaded_file($_FILES['file']['tmp_name'] , '/tmp/foto_alumno');

	
	
	
	$result = $conn->query($sql);
	
	$conn->close();


?>
