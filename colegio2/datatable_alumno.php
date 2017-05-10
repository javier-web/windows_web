<!DOCTYPE html>
<html lang="es">
    <head>	
        <title>Alumno_Datatable</title>
        <link rel="stylesheet" href="estilos_formulario.css"/>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        <meta charset="utf-8">



    </head>

    <br>

    <h2 style="line-height: normal; width: 100%; color: white; background-color: #6699ff">Tabla de alumnos</h2>

    <body>

        <?php
        $db = new PDO('mysql:host=localhost;dbname=colegio;charset=utf8', 'root', '');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT * FROM alumno";

        try {
            $st = $db->prepare($sql);
            $st->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }


        echo '<br>';


        echo '<div class="container" style="width: 950px;">';
        echo '<table id="example" class="display" style="width: 900px;" cellspacing="0">';

        $primeraFila = $st->fetch(PDO::FETCH_ASSOC);

//echo 'Contenido de la variable $primeraFila = $result -> fetch_assoc(). ';
//var_dump($primeraFila);

        $nombreColumnas = array_keys($primeraFila);

//echo 'Contenido de la variable $nombreColumnas = array_keys($primeraFila). ';
//var_dump($nombreColumnas);


        echo '<br>';
        echo '<br>';
        echo '<thead>';
        echo '<tr>';
        foreach ($nombreColumnas as $nombreColumna) {
            echo '<td style="background-color: #333333 ; color: white; font-size:16px">' . $nombreColumna . '</td>';
        }
        echo '</tr>';
        echo '</thead>';

        echo '<tbody>';
        echo '<tr>';
        foreach ($primeraFila as $clave => $elementosprimeraFila) {
            if ($clave == 'fecha_nacimiento') {
                echo '<td style="width: 15px; text-align:center; font-size:13px">' . date("d-m-Y", strtotime($elementosprimeraFila)) . '</td>';
            } else if ($clave == 'nota') {
                echo '<td style="width: 10px; text-align:center; font-size:13px">' . number_format($elementosprimeraFila, 2, ",", ".") . '</td>';
            } else {
                echo '<td style="font-size:13px">' . $elementosprimeraFila . '</td>';
            }
        }

        echo '</tr>';


        while ($fila = $st->fetch(PDO::FETCH_ASSOC)) {

            echo '<tr>';
            echo '<td style="width: 5px font-size:13px">' . $fila ['id'] . '</td>';
            echo '<td style="width: 5px font-size:13px">' . $fila ['curso_id'] . '</td>';
            echo '<td style="font-size:13px">' . $fila ['nombre'] . '</td>';
            echo '<td style="font-size:13px">' . $fila ['apellidos'] . '</td>';
            echo '<td style="width: 15px; text-align:center; font-size:13px">' . date("d-m-Y", strtotime($fila ['fecha_nacimiento'])) . '</td>';
            echo '<td style="width: 5px; text-align:center; font-size:13px">' . number_format($fila ['nota'], 2, ",", ".") . '</td>';
            echo '<td style="font-size:13px">' . $fila ['foto'] . '</td>';
            echo '</tr>';
        }

        echo '</tbody>';
        echo '</table>';
        echo '<br>';
        echo '<br>';

        echo '<a href="formulario_alumno.php" >';
        echo '<input  type="submit" value="Volver al formulario"
                style=" width: 180px; margin:10px 10px; background-color: #00ff66; color: blue; box-shadow: 10px 5px 5px silver">
    </a>';

        echo '</div>';


        echo '<br>';
        ?>



        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>    
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js"></script>
        <script src="https://cdn.datatables.net/plug-ins/1.10.15/sorting/datetime-moment.js"></script>
        <script src="javascript_formulario.js"></script>
         
    </body>
</html>





