<!DOCTYPE html>
<html lang="es">
    <head>	

        <title>Tabla de  alumnos</title>
        <link rel="stylesheet" href="estilos_formulario.css"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.0.47/jquery.fancybox.min.css" />
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>    
        <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.0.47/jquery.fancybox.min.js"></script>
        <meta charset="utf-8">


    </head>
    <body>

        

        <h2 style=" width: 100%; color: white; background-color: #6699ff; font-size:30px; font-family: arial;">Tabla de alumnos</h2>
        
        <?php
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);


        $db = new PDO('mysql:host=localhost;dbname=colegio;charset=utf8', 'root', '123456');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //Calculo de el numero total de filas
        $sql = "SELECT COUNT(*) FROM alumno";
        try {
            $st = $db->prepare($sql);
            $st->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
        
        $filasTotales = $st->fetch(PDO::FETCH_ASSOC)['COUNT(*)'];
        //var_dump($filasTotales);
        
        //Se limita a 5 el numero de filas por pagina
        $filasPorPagina = 5;
        
        //Calculo del numero total de paginas
        $numeroPaginas = $filasTotales / $filasPorPagina;
        
        $totalPaginas = ceil ($numeroPaginas);
        //var_dump($numeroPaginas);
        //var_dump($totalPaginas);
        
        //Caculo de la pagina actual
        $numeroPaginaActual = isset ($_GET['pagina']) ? $_GET['pagina'] : 1;
        //var_dump($_GET['pagina']);
        //var_dump($numeroPaginaActual);
        
        //Calculo del OFFSET
        $offset = ($numeroPaginaActual - 1) * $filasPorPagina;
        //var_dump($offset);
        
        
        //Ordenamiento por defecto
        $colunmaOrden = isset ($_GET['columna_orden']) ? $_GET['columna_orden'] : "nombre";
        $ordenLista = isset ($_GET['orden']) ? $_GET['orden'] : "ASC";
        //y lo incluimos en el ORDER BY de la sentencia SQL
        
        
        
        $sql = " SELECT * FROM alumno 
                 ORDER BY " . $colunmaOrden . ' ' . $ordenLista . "  
                 LIMIT " . $filasPorPagina . " OFFSET " . $offset ;

        try {
            $st = $db->prepare($sql);
            $st->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }


        echo '<br>';



        $primeraFila = $st->fetch(PDO::FETCH_ASSOC);


        $nombreColumnas = array_keys($primeraFila);

        ?>



        <div class="container" style="width: 1000px;">
        
        <a href="formulario_alumno.php"  class="nounderline">
        <input  class="botones_tabla"  type="submit" value="Introducir nuevo alumno"></a>
        
        
        <table class="table" style="width: 960px;" cellspacing="0">
        <thead>
        <!--creamos los enlaces para la las cabeceras-->
        <tr>
           <?php foreach ($primeraFila as $nombreColumna => $datoPrimeraFila) { ?>
            
            <!-- generamos la cadena con los parametros URL-->
            <?php 
                if ($nombreColumna == $colunmaOrden) {
                    $ordenEnlace = $ordenLista == 'ASC' ? 'DESC' : 'ASC';
                } else {
                    $ordenEnlace = 'ASC';
                }
                $parametrosUrl = 'columna_orden=' . $nombreColumna . '&' . 'orden=' . $ordenEnlace;
                //var_dump('parametros = ' .$parametrosUrl);
                //var_dump('nombrecolumna = ' .$nombreColumna);
            ?>
                       
            <th>
                <!-- generamos la url -->
                <a href="tabla_alumno.php?<?php echo $parametrosUrl ?>">
                    
                    <!-- generamos elnombre del enlace -->
                    <?php
                    if ($nombreColumna == 'curso_id') {
                                   echo'curso';
                        } else if ($nombreColumna == 'fecha_nacimiento') {
                                  echo'fecha nacimiento';
                        } else {
                                   echo " $nombreColumna " ; 
                    };
                    ?>
                </a>
            </th>
           <?php } ?>
            
            <th style="background-color: #333333 ; color: orange; font-size:16px; text-align: center">acciones</th>
        
        </tr>
        
        </thead>
        
        
        <?php
        
        echo '<tbody>';
        echo '<tr>';

        foreach ($primeraFila as $clave => $valorColumna) {
            if ($clave == 'fecha_nacimiento') {
                echo '<td style="width: 15px; text-align:center; font-size:13px">' . date("d-m-Y", strtotime($valorColumna)) . '</td>';
            } else if ($clave == 'nota') {
                echo '<td style="width: 10px; text-align:center; font-size:13px">' . number_format($valorColumna, 2, ",", ".") . '</td>';
            } else if ($clave == 'foto') {
                echo '<td style="font-size:13px; text-align:center;"><a data-fancybox="gallery" href="uploads/' . $primeraFila ['foto'] . '"><img src="uploads/' . $primeraFila ['foto'] . '" title="alumno" alt="alumno"></td>';
            } else {
                echo '<td style="font-size:13px">' . $valorColumna . '</td>';
            }
        }

        echo '<td>';

        echo '<div class="botons1">';
        echo '<a href="mostrar_alumno.php?id=' . $primeraFila['id'] . '"  class="nounderline" ><input title="Ver alumno" type="button" value="&nbsp&nbsp&nbsp&nbsp Ver &nbsp&nbsp&nbsp&nbsp&nbsp" name="submit">  ';
        //        style=" cursor: pointer; width: 35px; margin: 5px 20px; background-color: orange; box-shadow: 10px 5px 5px silver "> ';
        echo '<a href="editar_alumno.php?id=' . $primeraFila['id'] . '"  class="nounderline" ><input title="Editar alumno" type="button" value="&nbsp&nbsp Editar &nbsp&nbsp&nbsp" name="submit"  style="color: green;"> ';
        //        style=" cursor: pointer; width: 35px; margin: 5px 20px; background-color: #00ff66; box-shadow: 10px 5px 5px silver;"> ';
        echo '<a href="visualizar_alumno.php?id=' . $primeraFila['id'] . '"  class="nounderline" ><input title="Eliminar alumno" type="button" value="&nbsp Eliminar &nbsp" name="submit"  style="color: brown;"> ';
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
                echo '<td style="font-size:13px; text-align:center; margin:0 auto; width:20%"><a data-fancybox="gallery" href="uploads/' . $fila ['foto'] . '"><img src="uploads/' . $fila ['foto'] . '"> ';
                echo'</td>';

                echo '<td style="  width:10%">';
                    echo '<div class="botons2">';
                        echo '<a href="mostrar_alumno.php?id=' . $fila['id'] . '"  class="nounderline" ><input title="Ver alumno" type="button" value="&nbsp&nbsp&nbsp&nbsp Ver &nbsp&nbsp&nbsp&nbsp&nbsp" name="submit"></a> '; 
            //                style=" cursor: pointer; width: 35px; margin: 5px 20px; background-color: orange; box-shadow: 10px 5px 5px silver "> ';
                        echo '<a href="editar_alumno.php?id=' . $fila['id'] . '"  class="nounderline" ><input title="Editar alumno" type="button" value="&nbsp&nbsp Editar &nbsp&nbsp&nbsp" name="submit" style="color: green;">   ';
            //                style=" cursor: pointer; width: 35px; margin: 5px 20px; background-color: #00ff66; box-shadow: 10px 5px 5px silver;"> ';
                           echo '<a href="visualizar_alumno.php?id=' . $fila['id'] . '"  class="nounderline" ><input title="Eliminar alumno" type="button" value="&nbsp Eliminar &nbsp" name="submit" style="color: brown;">   ';
            //                style=" cursor: pointer; width: 35px; margin: 5px 20px; background-color: #00ff66; box-shadow: 10px 5px 5px silver;"> ';
                    echo '</div>';
                echo '</td>';

            echo '</tr>';
        }

        echo '</tbody>';

        echo '</table>';
        
        ?>
        <a href="formulario_alumno.php"  class="nounderline">
        <input  class="botones_tabla"  type="submit" value="Introducir nuevo alumno"></a>
        <?php
        //Paginacion

/*        
        var_dump('columna_orden = '.$columnaOrden);
        var_dump('orden_lista = '.$ordenLista);
        var_dump('total_paginas = '.$totalPaginas);
 
 */
        ?>
        <div class="paginacion">
            
            
            <?php 
            $parametrosUrlEnlacePagina  = 'columna_orden=' . $nombreColumna . '&' . 'orden=' . $ordenEnlace; ?>
            
            <a href="tabla_alumno.php?<?php echo $parametrosUrlEnlacePagina ?>&pagina=1"> << &nbsp</a>
            <a href="tabla_alumno.php?<?php echo $parametrosUrlEnlacePagina ?>&pagina=<?php echo $numeroPaginaActual-1 ?>">&nbsp < &nbsp</a>
            
            <?php for ($i=1; $i<= $totalPaginas; $i++) { ?>
                <a href="tabla_alumno.php?<?php echo $parametrosUrlEnlacePagina ?>&pagina=<?php echo $i ?>">&nbsp<?php echo $i ?>&nbsp</a>
            <?php } ?>
            
            <a href="tabla_alumno.php?<?php echo $parametrosUrlEnlacePagina ?>&pagina=<?php echo $numeroPaginaActual+1 ?>">&nbsp > &nbsp</a>
            <a href="tabla_alumno.php?<?php echo $parametrosUrlEnlacePagina ?>&pagina=<?php echo $totalPaginas ?>">&nbsp >> &nbsp</a>
            
            </div>
        <br>
        </div>

       
        

        
        <script>
            $('.eliminar').on('click', function () { 
                return confirm ('¿Borrar el registro?');
            });
        </script>

        
    </body>
</html>



