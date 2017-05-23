<!DOCTYPE html>


<html lang="es">
    <head>
        <title>Modificar alumno</title>
        <link rel="stylesheet" href="estilos_formulario.css"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <meta charset="utf-8">
        <meta name="description" content="Formulario_alumno">
        <meta name="keywords" content="Formulario_alumno"/>
        <meta name="author" content="JFR">
    </head>

    <body>
        <h2 style="line-height: normal; width: 100%; color: white; background-color: #6699ff">Gestión de alumnos - modificación de datos del alumno</h2>
        <br>
        
        <?php
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);


        $db = new PDO('mysql:host=localhost;dbname=colegio;charset=utf8', 'root', '123456');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                
         if ($_FILES['foto']['error'] == 4) {
            $cadenacolumnaFoto = '';
            } else { 
                    $nombreArchivo = md5(uniqid());
                    move_uploaded_file($_FILES['foto']['tmp_name'], "uploads/" . $nombreArchivo);
                    $cadenacolumnaFoto = " , foto = '" . $nombreArchivo . "'";
                                    
                    }
        
        echo '<br>';

        $sql = "UPDATE alumno 
                SET      curso_id = '" . $_POST['curso'] . "' ,
                         nombre = '" . $_POST['nombre'] . "' ,
                         apellidos = '" . $_POST['apellidos'] . "' ,
                         fecha_nacimiento = '" . date("Y-m-d", strtotime($_POST['fecha_nacimiento'])) . "' ,
                         nota = " . str_replace(",",".",$_POST['nota']) .  
                         $cadenacolumnaFoto . 
                             
                " WHERE   id = " . $_POST['id'];
        

        
        
        try {
            $st = $db->prepare($sql);
            $st->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
        ?>

        <br>
        <div class="content">
            <br><br><br>
            <marquee height="100" direction="up" scrolldelay="100" behavior="slide">
                <h3 class="marquee" >Registro modificado correctamente</h3></marquee>
            <div class="botonera">   
                <a href="formulario_alumno.php"  class="nounderline" >
                    <input class="buttons" type="submit" value="Nuevo alumno" title="Añadir nuevos alumnos">
                </a>
                <a href="tabla_alumno.php"  class="nounderline" >
                    <input class="buttons" type="submit" value="Lista de alumnos" title="Ver lista de alumnos">
                </a>

            </div>
            <br><br>
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