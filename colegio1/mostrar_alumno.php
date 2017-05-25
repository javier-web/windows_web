<!DOCTYPE html>


<html lang="es">
    <head>
        <title>Mostrar alumno</title>
        <link rel="stylesheet" href="estilos_formulario.css"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.0.47/jquery.fancybox.min.css">
        <meta charset="utf-8">
        <meta name="description" content="Formulario_alumno">
        <meta name="keywords" content="Formulario_alumno"/>
        <meta name="author" content="JFR">




    </head>

    <body>

        <h2 style="line-height: normal; width: 100%; color: white; background-color: #6699ff">Formulario de gestión de alumnos</h2>
        <br>


        <div class="container" style="width: 58%; height: 570px">
            <h4 style="color: #999999; background-color: #ffffff; height: 50px; margin-bottom: 40px"><br>Detalle de información del alumno:</h4>
            <form class="form" id="myForm" action="editar_alumno.php" method = "post" enctype="multipart/form-data">

                <?php
                ini_set('display_errors', 1);
                ini_set('display_startup_errors', 1);
                error_reporting(E_ALL);


                $db = new PDO('mysql:host=localhost;dbname=colegio;charset=utf8', 'root', '123456');
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql = "SELECT nombre, apellidos, fecha_nacimiento, curso_id, nota, foto, id FROM alumno WHERE id=".$_GET['id'];

                try {
                    $st = $db->prepare($sql);
                    $st->execute();
                } catch (PDOException $e) {
                    echo $e->getMessage();
                    return false;
                }

                $columnas = $st->fetch(PDO::FETCH_ASSOC);

                foreach ($columnas as $clave => $columna) {
                    if ($clave == "nombre") {

                        echo '<div class = "form-group">';
                        echo '<label for = "nombre">Nombre del alumno:</label>';
                        echo '<input class = "form-control" type = "text" name = "' . $clave . '" value = "' . $columna . '" disabled>';
                        echo '</div>';
                    } else if ($clave == "apellidos") {

                        echo '<div class = "form-group">';
                        echo '<label for = "apellidos">Apellidos:</label>';
                        echo '<input class = "form-control" type = "text" name = "' . $clave . '" value = "' . $columna . '" disabled>';
                        echo '</div>';
                    } else if ($clave == 'fecha_nacimiento') {

                        echo '<div class = "form-group">';
                        echo '<label for = "fecha_nacimiento">Fecha de nacimiento:</label>';
                        echo '<input class = "form-control" type = "date" name = "' . $clave . '" value = "' . $columna . '" disabled>';
                        echo '</div>';
                    } else if ($clave == 'curso_id') {

                        echo '<div>';
                        echo '<label for = "curso">Curso: </label>';
                        echo '</div>';

                        ini_set('display_errors', 1);
                        ini_set('display_startup_errors', 1);
                        error_reporting(E_ALL);


                        $db = new PDO('mysql:host=localhost;dbname=colegio;charset=utf8', 'root', '123456');

                        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        $sql = "SELECT * FROM curso";

                        try {
                            $st = $db->prepare($sql);
                            $st->execute();
                        } catch (PDOException $e) {
                            echo $e->getMessage();
                            return false;
                        }


                        echo '<select name = "curso" disabled>';
                        echo '<option value = "" disable>Seleccionar&nbsp</option>';
                        while ($fila = $st->fetch(PDO::FETCH_ASSOC)) {
                            if ($columna == $fila['id']) {
                                echo '<option selected="selected" value = "' . $fila['id'] . '">' . $fila['nombre'] . '</option>';
                            } else {
                                echo '<option value = "' . $fila['id'] . '">' . $fila['nombre'] . '</option>';
                            }
                        }
                        echo '</select>';
                    } else if ($clave == 'nota') {

                        echo '<div class = "form-group">';
                        echo '<br><label for = "nota">Nota media:</label>';
                        echo '<input class = "form-control" type = "date" name = "' . $clave . '" value = "' . $columna . '" style = " width: 150px" disabled>';
                        echo '</div>';
                    } else if ($clave == 'foto') {

                        echo '<div class = "mostrar-foto-alumno">';
                            echo'<a data-fancybox="gallery" href="uploads/' . $columna . '"><img src="uploads/' . $columna . '" id="fotografia" width="50%">';
                        echo '</div>';
                    }
                }
                
                
                ?>

                <div class="botones_mostrar" style=" width: 185px;">
                    <a href="formulario_alumno.php"  class="nounderline" >
                        <input title="Volver a formulario" type="button" value="Formulario de alumnos" name="submit">
                    </a> 
                                  
                  
                    <a href="tabla_alumno.php"  class="nounderline" >
                        <input title="Ver lista de alumnos" type="button" value="Tabla de alumnos" name="submit">
                    </a> 
                                  
                                  
                    <a href="editar_alumno.php?id=<?php echo $_GET['id'] ?>" class="nounderline" >
                        <input title="Ver lista de alumnos" type="button" value="Modificar datos de alumno" name="submit">
                    </a> 
                                  
        </div>  

    </form>           
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/1.10.15/sorting/datetime-moment.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.0.47/jquery.fancybox.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>    
<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="patron.js"></script>


</body>
</html>