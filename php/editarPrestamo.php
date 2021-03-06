<?php
    include 'conexion.php';
    session_start();
    $idUsuario=$_SESSION["user"]["Usuario"];
    $tipoUsuario=$_SESSION["user"]["Tipo"];
    date_default_timezone_set('UTC');
    if(isset($_POST) && $_POST['tag']=='mostrarPrestamos'){
        if($tipoUsuario==1){
            $sql = "SELECT * FROM prestamos INNER JOIN prestatario WHERE ID_Prestatario=Prestatario_FK";
        }else{
            $sql = "SELECT * FROM prestamos INNER JOIN prestatario WHERE ID_Prestatario=Prestatario_FK AND No_control='$idUsuario'";
        }
        $result = $con->query($sql);
        if($result->num_rows > 0){ 
            while($row = $result->fetch_assoc()){
                $alumno = $row['Nombres']." ".$row['ApellidoP']." ".$row['ApellidoM'];
                $status = "";
                $button = "";
                if($row['Tipo_FK'] == 1){
                    $button2 = "<button type='button' class='btn btn-danger eliminarPrestamo' id='btnEliminarPrestamo'><i class='fa fa-trash' aria-hidden='true'></i> Eliminar</button>";
                }
                if($row['status']==0){
                    $status = "Devuelto";
                    $button = "<button type='button' class='btn btn-primary editarPrestamo' id='btnEditarPrestamo' disabled><i class='fa fa-cog' aria-hidden='true'></i> Editar</button>";
                }
                if($row['status']==1){
                    $status = "Activo";
                    if($tipoUsuario == 1){
                    $button = "<button type='button' class='btn btn-primary editarPrestamo' id='btnEditarPrestamo'><i class='fa fa-cog' aria-hidden='true'></i> Editar</button>";
                    } else {
                        $button = "<button type='button' class='btn btn-primary editarPrestamo' id='btnEditarPrestamo'><i class='fa fa-cog' aria-hidden='true'></i> Ver</button>";
                    }
                }
                if($row['status']==2){
                    $status = "Pagado";
                    $button = "<button type='button' class='btn btn-primary editarPrestamo' id='btnEditarPrestamo' disabled><i class='fa fa-cog' aria-hidden='true'></i> Editar</button>";
                }
                $hoy = date('Y-m-d');
                if($hoy>$row['Fecha_Fin'] && $row['status']==1){
                    $status = "Vencido";
                    $button = "<button type='button' class='btn btn-success pagarPrestamo' id='btnPagarPrestamo' data-toggle='modal' data-target='#modalPagarAdeudo'><i class='fa fa-credit-card' aria-hidden='true'></i> Pagar Adeudo</button>";
                    $button2 = "<button type='button' class='btn btn-danger eliminarPrestamo' id='btnEliminarPrestamo' disabled><i class='fa fa-trash' aria-hidden='true'></i> Eliminar</button>";
                }
                echo  "<tr>
                            <td>$row[ID_Prestamo]</td>
                            <td>$row[Fecha_Inicio]</td>
                            <td>$row[Fecha_Fin]</td>
                            <td>$alumno</td>
                            <td>$status</td>
                            <td>
                                $button
                            </td>";
                            if($row['Tipo_FK'] == 1){
                            echo "<td>
                                $button2
                            </td>";
                            }
                        echo "</tr>";
            }
        }
    }
    if(isset($_POST) && $_POST['tag']=='editarPrestamo'){
        $id = mysqli_real_escape_string($con,$_POST['id']);
        $sql = "SELECT * FROM prestamos,prestatario,tipo_prestatario,carrera WHERE Prestatario_FK=ID_Prestatario AND ID_Prestamo=$id AND  Carrera_FK=ID_Carrera
         AND Tipo_FK=ID_Tipo";
        $result = $con->query($sql);
        $respuesta = new StdClass();
        if($result->num_rows > 0){
            if($row = $result->fetch_assoc()){
                $alumno = $row['Nombres']." ".$row['ApellidoP']." ".$row['ApellidoM'];
                $respuesta->numControl = $row['No_Control'];
                $respuesta->alumno = $alumno;
                $respuesta->carrera = $row['Carrera'];
                $respuesta->tipo = $row['Tipo'];
                $respuesta->tipoUsuario = $tipoUsuario;
                echo json_encode($respuesta);
            }
        }
    }
    if(isset($_POST) && $_POST['tag']=='detallePrestamo'){
        $id = mysqli_real_escape_string($con,$_POST['id']);
        $sql = "SELECT * FROM prestamos_detalle,libros_detalle,libros WHERE Libro_FK=ID_Detalle AND Libros_FK=ID_Libro AND Prestamo_FK=$id";
        $result = $con->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo " <tr>
                <td>$row[Codigo_Barras]</td>
                <td>$row[ISBN]</td>
                <td>$row[ID_Detalle]</td>
                <td>$row[Titulo]</td>";
                if($row['Tipo_FK'] == 1){
                echo "<td><button type='button' class='btn btn-danger eliminarDetalleLibro'><i class='fa fa-trash' aria-hidden='true'></i> Eliminar</button></td>";
                }
                echo "</tr>";
            }
        }
    }
    if(isset($_POST) && $_POST['tag']=='regresarPrestamo'){
        $id = mysqli_real_escape_string($con,$_POST['id']);
        $sql = "SELECT * FROM prestamos_detalle,libros_detalle WHERE Libro_FK=ID_Detalle AND Prestamo_FK=$id";
        $result = $con->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $sql2 = "UPDATE libros_detalle SET status=0 WHERE ID_Detalle=$row[Libro_FK]";
                $con->query($sql2);
            }
        }
        $sql3 = "UPDATE prestamos SET status=0 WHERE ID_Prestamo=$id";
        if($con->query($sql3)==TRUE){
            echo 1;
        }else{
            echo 0;
        }
    }
    if(isset($_POST) && $_POST['tag']=='eliminarPrestamo'){
        $id = mysqli_real_escape_string($con,$_POST['id']);
        $sql = "DELETE FROM prestamos_detalle WHERE  Prestamo_FK=$id";
        if($con->query($sql)){
            $sql2 = "DELETE FROM prestamos WHERE ID_Prestamo=$id";
            if($con->query($sql2)){
                echo 1;
            }
        }else{
            echo 0;
        }
    }
    if(isset($_POST) && $_POST['tag']=='actualizarPrestamo'){
        $id = mysqli_real_escape_string($con,$_POST['id']);
        $sql = "DELETE FROM prestamos_detalle WHERE  Prestamo_FK=$id";
        $datosDetalle = $_POST['datos'];
        if($con->query($sql)){
            foreach($datosDetalle as $datos){
                $libro = $datos['libro'];
                $prestamo = $datos['prestamo'];
                $sql2 = "INSERT INTO prestamos_detalle VALUES(null,$libro,$prestamo)";
                $con->query($sql2);
            }
            echo 1;
        }else{
            echo 0;
        }
    }
    if(isset($_POST) && $_POST['tag']=='librosDetalle'){
        $id = mysqli_real_escape_string($con,$_POST['id']);
        $sql = "SELECT * FROM prestamos_detalle WHERE  Prestamo_FK=$id";
        $result = $con->query($sql);
        $num = 0;
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $num++;
            }
            echo $num;
        }
    }
    if(isset($_POST) && $_POST['tag']=='adeudos'){
        $id = mysqli_real_escape_string($con,$_POST['id']);
        $cantidad = mysqli_real_escape_string($con,$_POST['cantidad']);
        $sql = "INSERT INTO adeudos VALUES(null,$id,$cantidad,1)";
        if($con->query($sql) == TRUE){
            echo 1;
        }else{
            echo 0;
        }
    }
    if(isset($_POST) && $_POST['tag']=='actualizarDetalle'){
        $id = mysqli_real_escape_string($con,$_POST['id']);
        $datosDetalle = $_POST['datos'];
        $sql = "DELETE FROM prestamos_detalle WHERE Prestamo_FK=$id";
        if($con->query($sql)){
            foreach($datosDetalle as $datos){
                $libro = $datos['libro'];
                $prestamo = $datos['prestamo'];
                $sql2 = "INSERT INTO prestamos_detalle VALUES(null,$libro,$prestamo)";
                $con->query($sql2);
            }
            echo 1;
        }else{
            echo 0;
        }
    }
?>