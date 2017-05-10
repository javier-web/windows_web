<!DOCTYPE html>


<html lang="es">
    <head>
        <title>Nuevo_alumno</title>
        <link rel="stylesheet" href="estilos_formulari.css"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <meta charset="UTF-8">
        <meta name="description" content="Formulario_alumno">
        <meta name="keywords" content="Formulario_alumno"/>
        <meta name="author" content="JFR">
    </head>

    <body>

        <?php
        
        
        $db = new PDO('mysql:host=localhost;dbname=colegio;charset=utf8','root','');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	

                
        move_uploaded_file($_FILES['file']['tmp_name'], 'C:/xampp/htdocs/colegio2/foto_alumno.jpg');

        echo '<br>';

        $sql = "INSERT INTO alumno (curso_id, nombre, apellidos , fecha_nacimiento , nota, foto) 
                VALUES  ('" . $_POST['curso'] . "' ,
                         '" . $_POST['nombre'] . "' ,
                         '" . $_POST['apellidos'] . "' ,
                         '" . $_POST['date'] . "' ,
                         '" . $_POST['nota'] . "' ,
                         '" . $_FILES['file']['name'] . "')";

        try {
            $st = $db->prepare($sql);
            $st->execute();
            
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
        


       
        ?>
        
        <br>
        <h4 style=" width: 383px; text-align: center; margin:10px 10px; background-color:#00ff99 ; box-shadow: 10px 5px 5px silver">Registro introducido correctamente</h4>
        <a href="datatable_alumno.php" >
            <input  type="submit" value="Tabla de alumnos"
            style=" width: 180px; margin:10px 10px; background-color: #99ffcc; box-shadow: 10px 5px 5px silver">
        </a>
        <a href="formulario_alumno.php" >
            <input  type="submit" value="Formulario"
            style=" width: 180px; margin:10px 10px; background-color: #99ffcc; box-shadow: 10px 5px 5px silver">
        </a>
        <br>
        
        
        
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