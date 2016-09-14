<?php
require_once __DIR__.'/bibliotecas/db_connect.php';
try {
    $pdo = getConnection();
    //sql
    $sql = "SELECT "
            . "clientes.id, "
            . "CONCAT(clientes.apellido, ', ' , clientes.nombre) as nombre, "
            . "TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) as edad, "
            . "clientes.activo , nacionalidades.nacionalidad "
            . "FROM clientes JOIN nacionalidades "
            . "on  clientes.nacionalidad_id = nacionalidades.id";

    $stmt = $pdo->prepare($sql);

    //especid¿ficamos la salida como un array
    $stmt->setFetchMode(PDO::FETCH_ASSOC); //podria ser PDO::FETCH_OBJ
    //sustituir los parametros por los valores reales
    $stmt->bindParam(':edad', $edad_cliente);

    //ejecutamos la consulta
    $stmt->execute();

    //recuperamos los datos de el array asoc.
    $results = $stmt->fetchAll();
} catch (PDOException $ex) {
    echo "Error de conexion de la DB: " . $ex->getMessage();
}
require_once __DIR__ . '/Index_Vista.php';
