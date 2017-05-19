<!DOCTYPE html>
<html lang="es">
    <head>	
        <title>Tabla alumnos</title>

        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        <link rel="stylesheet" href="estilos_formulario.css"/>

        <meta charset="utf-8">



    </head>

    <br>

    <h2 style=" width: 100%; color: white; background-color: #6699ff; font-size:30px">Tabla de alumnos</h2>

    <body>

        <?php
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);


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


        echo '<div class="container" style="width: 1000px;">';
        echo '<table id="example" class="display" style="width: 950px;" cellspacing="0">';

        $primeraFila = $st->fetch(PDO::FETCH_ASSOC);

//echo 'Contenido de la variable $primeraFila = $result -> fetch_assoc(). ';
//var_dump($primeraFila);


        $nombreColumnas = array_keys($primeraFila);

//echo 'Contenido de la variable $nombreColumnas = array_keys($primeraFila). ';
//var_dump($nombreColumnas);



        echo '<a href="formulario_alumno.php"  class="nounderline">';
        echo '<input  type="submit" value="Volver al formulario"
                style=" width: 180px; height: 25px; font-size: 12px; margin:20px 10px; text-align: center;
                margin-left: 735px; background-color: #6699ff; color: white; box-shadow: 10px 5px 5px silver"></a>';
        echo '</div>';
        echo '<br>';

        echo '<thead>';
            echo '<tr>';
            foreach ($nombreColumnas as $nombreColumna) {
                if ($nombreColumna == 'curso_id') {
                    echo '<td style="background-color: #333333 ; color: white; font-size:16px">curso</td>';
                } else if ($nombreColumna == 'fecha_nacimiento') {
                    echo '<td style="background-color: #333333 ; color: white; font-size:16px">fecha nacimiento</td>';
                } else {
                    echo '<td style="background-color: #333333 ; color: white; font-size:16px">' . $nombreColumna . '</td>';
                }
            }

            echo '<td style="background-color: #333333 ; color: white; font-size:16px">acciones</td>';

            echo '</tr>';
        echo '</thead>';

        echo '<tbody>';
        echo '<tr>';

            foreach ($primeraFila as $clave => $valorColumna) {
                if ($clave == 'fecha_nacimiento') {
                    echo '<td style="width: 15px; text-align:center; font-size:13px">' . date("d-m-Y", strtotime($valorColumna)) . '</td>';
                } else if ($clave == 'nota') {
                    echo '<td style="width: 10px; text-align:center; font-size:13px">' . number_format($valorColumna, 2, ",", ".") . '</td>';
                } else if ($clave == 'foto') {
                    echo '<td style="font-size:13px; text-align:center; width: 140px;"><img src="uploads/' . $primeraFila ['foto'] . '" style="width: 60%;"></td>';
                } else {
                    echo '<td style="font-size:13px">' . $valorColumna . '</td>';
                }
            }
            
            echo '<td>';

            echo '<div class="botons1">';
                echo '<a href="mostrar_alumno.php?id=' . $primeraFila['id'] . '"  class="nounderline" ><input title="Ver alumno" type="button" value="Ver" name="submit"  ';
            //        style=" cursor: pointer; width: 35px; margin: 5px 20px; background-color: orange; box-shadow: 10px 5px 5px silver "> ';
                echo '<a href="editar_alumno.php"  class="nounderline" ><input title="Editar alumno" type="button" value="Editar" name="submit"  ';
            //        style=" cursor: pointer; width: 35px; margin: 5px 20px; background-color: #00ff66; box-shadow: 10px 5px 5px silver;"> ';
            echo '</div>';
        
            echo '</td>';
        
        echo '</tr>';


        while ($fila = $st->fetch(PDO::FETCH_ASSOC)) {

            echo '<tr>';
                echo '<td style="width: 5px; font-size:13px">' . $fila ['id'] . '</td>';
                echo '<td style="width: 5px; font-size:13px">' . $fila ['curso_id'] . '</td>';
                echo '<td style="font-size:13px">' . $fila ['nombre'] . '</td>';
                echo '<td style="font-size:13px">' . $fila ['apellidos'] . '</td>';
                echo '<td style="width: 15px; text-align:center; font-size:13px">' . date("d-m-Y", strtotime($fila ['fecha_nacimiento'])) . '</td>';
                echo '<td style="width: 5px; text-align:center; font-size:13px">' . number_format($fila ['nota'], 2, ",", ".") . '</td>';
                echo '<td style="font-size:13px; text-align:center" margin:0 auto;  width: 40px;"><img src="uploads/' . $fila ['foto'] . '" style="width: 60%"> ';
                echo'</td>';

                echo '<td>';
                    echo '<div class="botons2">';
                        echo '<a href="mostrar_alumno.php?id=' . $fila['id'] . '"  class="nounderline" ><input title="Ver alumno" type="button" value="Ver" name="submit" '; 
            //                style=" cursor: pointer; width: 35px; margin: 5px 20px; background-color: orange; box-shadow: 10px 5px 5px silver "> ';
                        echo '<a href="editar_alumno.php?id=' . $fila['id'] . '"  class="nounderline" ><input title="Editar alumno" type="button" value="Editar" name="submit"   ';
            //                style=" cursor: pointer; width: 35px; margin: 5px 20px; background-color: #00ff66; box-shadow: 10px 5px 5px silver;"> ';
                    echo '</div>';
                echo '</td>';

            echo '</tr>';
        }

        echo '</tbody>';
        echo '</table>';
        echo '<br>';
        echo '<br>';

        echo '<a href="formulario_alumno.php"  class="nounderline">';
        echo '<input  type="submit" value="Volver al formulario"
                style=" width: 180px; height: 25px; font-size: 12px; margin:20px 10px; text-align: center;
                margin-left: 735px; background-color: #6699ff; color: white; box-shadow: 10px 5px 5px silver"></a>';
        echo '</div>';
        echo '<br>';
        ?>


        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>    
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/colreorder/1.3.3/js/dataTables.colReorder.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js"></script>
        <script src="https://cdn.datatables.net/plug-ins/1.10.15/sorting/datetime-moment.js"></script>
        <script src="javascript_formulario.js"></script>

    </body>
</html>





