<?php

	




	//echo "mostramos en la tabla";
	
	$conn = new mysqli("localhost" , "root" , "123456" , "colegio");

	$sql = "SELECT * FROM curso";

        $result = $conn->query($sql);

        
	echo 'mostramos var_dump($conn):';
	var_dump($conn);

	if ($conn -> connect_errno != 0) {
	echo "Lo sentimos. Contraseña incorrecta";
	} else {
	echo "Contraseña correcta";
	}
        
        echo '<br>';
        echo '<br>';
        echo 'mostramos var_dump($sql):';
	var_dump($sql);
        
        echo '<br>';
        echo 'mostramos var_dump($_POST):';
        var_dump($_POST);

        echo '<table class="display" width="100%" cellspacing="0">';
        $primeraFila = $result -> fetch_assoc();
        $nombreColumnas = array_keys($primeraFila);


        echo '<thead style="color:green">';
		echo '<tr>';
		foreach ($nombreColumnas as $nombreColumna) {
		echo '<td>' . $nombreColumna . '</td>'; 
		}
		echo '</tr>';
	echo '</thead>';

	echo '<tbody>';
		echo '<tr>';
		foreach ($primeraFila as $elementosprimeraFila) {
		echo '<td>' . $elementosprimeraFila . '</td>'; 
		}
		echo '</tr>';
	

		while ($fila = $result -> fetch_assoc()) {
	
			echo '<tr>';
			echo '<td>' . $fila ['id'] . '</td>' ;
			echo '<td>' . $fila ['nombre'] . '</td>' ;
			echo '</tr>';


		}

	echo '</tbody>';

        echo '</table>';
        

	
	
	
	$result = $conn->query($sql);
	
	$conn->close();


?>
