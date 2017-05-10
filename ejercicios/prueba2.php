<?php

	$conn = new mysqli("localhost" , "root" , "123456" , "colegio");

	$sql = "SELECT * FROM alumno";

	$result = $conn->query($sql);


	

	while ($fila = $result->fetch_assoc()) { 
	var_dump($fila);	
        };

	$conn->close();

?>

