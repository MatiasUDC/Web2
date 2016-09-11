<?php
    require __DIR__.'/../bibliotecas/db_connect.php';
    require __DIR__ . '/../login/control_session.php';
    if($_SESSION['UPDATE'] != true ) {
        header('Location: ../denegado.php');
        die();
    }
    try {
        $pdo = getConnection();
        //sql
        $sql = "UPDATE clientes SET apellido=:apellido,"
                . " nombre=:nombre, fecha_nacimiento=:fecha,"
                . "activo=:activo, nacionalidad_id=:nacionalidad "
                . "WHERE id = :id";

        $stmt = $pdo->prepare($sql);

        //especid¿ficamos la salida como un array
        $stmt->setFetchMode(PDO::FETCH_ASSOC); //podria ser PDO::FETCH_OBJ
        //sustituir los parametros por los valores reales
        $stmt->bindParam(':id', $valores["id"]);
        $stmt->bindParam(':apellido', $valores["apellido"]);
        $stmt->bindParam(':nombre', $valores["nombre"]);
        $stmt->bindParam(':fecha', $valores["Nacimiento"]);
        $stmt->bindParam(':activo', $valores["activo"]);
        $stmt->bindParam(':nacionalidad', $valores["Nacionalidad"]);

        //ejecutamos la consulta
        $stmt->execute();

        //recuperamos los datos de el array asoc.
        require __DIR__.'/conexion_vista.php';

    } catch (PDOException $ex) {
        echo "Error de conexion de la DB: " . $ex->getMessage();
    }
        
