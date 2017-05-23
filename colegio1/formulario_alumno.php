<!DOCTYPE html>


<html lang="es">
    <head>
        <title>Formulario alumno</title>
        <link rel="stylesheet" href="estilos_formulario.css"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <meta charset="utf-8">
        <meta name="description" content="Formulario_alumno">
        <meta name="keywords" content="Formulario_alumno"/>
        <meta name="author" content="JFR">




    </head>

    <body>
        
        <h2 style="line-height: normal; width: 100%; color: white; background-color: #6699ff">Formulario de gestión de alumnos</h2>
        <br>
        
        <div class="container" style="width: 58%; height: 570px">
            <h4 style="color: #999999; background-color: #ffffff; height: 50px; margin-bottom: 40px"><br>Introduzca la información que se solicita a continuación:</h4>
            <form class="form" id="myForm" action="nuevo_alumno.php" method = "post" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="nombre">Nombre del alumno:</label>
                    <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Nombre del alumno" required>
                </div>

                <div class="form-group">
                    <label for="apellidos">Apellidos:</label>
                    <input type="text" name="apellidos" class="form-control" id="apellidos" placeholder="Apellidos del alumno" required>
                </div>

                <div class="form-group">
                    <label for="fecha_nacimiento">Fecha de nacimiento:</label>
                    <input type="date" name="date"  class="form-control" id="fecha_nacimiento" placeholder="Fecha de nacimiento">
                </div>

                <div>
                    <label for="curso" required>Curso: </label>
                </div>

                <?php
                
                ini_set('display_errors', 1);
                ini_set('display_startup_errors', 1);
                error_reporting(E_ALL);
                
                $db = new PDO('mysql:host=localhost;dbname=colegio;charset=utf8','root','123456');
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
                
                $sql = "SELECT * FROM curso";

                try {
                    $st = $db->prepare($sql);
                    $st->execute();
            
                } catch (PDOException $e) {
                    echo $e->getMessage();
                    return false;
                }
                
                

                echo '<select name="curso">';
                echo '<option value="" disable>Seleccionar&nbsp</option>';
                while($fila = $st->fetch(PDO::FETCH_ASSOC)) {
                    echo '<option value = "' . $fila['id'] . '">' . $fila['nombre'] . '</option>';
                }
                
                
                echo '</select>';

                
                ?>

                <div class="form-group">
                    <br><label for="nota">Nota media:</label>
                    <input type="date" name="nota"  class="form-control" id="nota" placeholder="Nota media" style=" width: 150px">
                </div>

                <div class="form-group">
                    <label for="foto">Fotografía:</label>
                    <input type="file" name="file" id="foto"><br>
                </div>
                
                <div class="botones_formulario" style=" width: 185px;">
                    <input  type="button" onclick="myFunction()" value="Borrar" style=" cursor: pointer; width: 80px; 
                            background-color: #ff9999; box-shadow: 10px 5px 5px silver ">

                    <input  type="submit" value="Enviar" name="submit" style=" cursor: pointer; width: 80px;
                            background-color: #00ff66; box-shadow: 10px 5px 5px silver;  margin-left: 15px">
                    
                    <a href="tabla_alumno.php"  class="nounderline" ><input title="Ver lista de alumnos" type="button" value="Tabla de alumnos" name="submit" 
                            style="cursor: pointer; width: 180px; color: white; background-color: #6699ff; 
                            margin-top: 12px; height: 25px; text-align: center; box-shadow: 10px 5px 5px silver;"></a>
                   
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

        <script>
                        function myFunction() {
                            document.getElementById("myForm").reset();
                        }
        </script>
    </body>
</html>