<?php
require __DIR__.'/../bibliotecas/db_connect.php';
error_reporting(E_ALL);
ini_set("display_errors", true);
header('Content - Type: text/html; charset-UTF-8');

try {
    $pdo = getConnection();
    $sql = "INSERT INTO "
            . "clientes"
            . "(apellido,nombre,fecha_nacimiento,activo,nacionalidad_id)"
            . "VALUES"
            ."(:apellido,:nombre,:fecha , :activo, :nacionalidad)";
    
    
    $stmt = $pdo->prepare($sql);
    
    //especid¿ficamos la salida como un array
    $stmt->setFetchMode(PDO::FETCH_ASSOC);//podria ser PDO::FETCH_OBJ
    
    //sustituir los parametros por los valores reales
    $stmt->bindParam(':apellido', $valores["apellido"]);
    $stmt->bindParam(':nombre', $valores["nombre"]);
    $stmt->bindParam(':fecha', $valores["Nacimiento"]);
    $stmt->bindParam(':activo', $valores["activo"]);
    $stmt->bindParam(':nacionalidad', $valores["Nacionalidad"]);
    
    //die(print_r($valores));
    //ejecutamos la consulta
    $stmt->execute();
    
    //recuperamos los datos de el array asoc.
    require __DIR__.'/Conexion_vista.php';
    
} catch (PDOException $ex) {
    echo "Error de conexion de la DB: " . $ex->getMessage();
}
    

