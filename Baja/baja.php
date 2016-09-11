<?php
require __DIR__.'/../bibliotecas/db_connect.php';
require __DIR__ . '/../login/control_session.php';
    if($_SESSION['DELETE'] != true ) {
        header('Location: ../login/denegado.php');
        die();
    }
$id_cliente = $_GET["id"];
try {
    $pdo = getConnection();
    $sql = "DELETE FROM "
            . "clientes "
            . "WHERE clientes.id = :id";


    $stmt = $pdo->prepare($sql);

    //especid¿ficamos la salida como un array
    $stmt->setFetchMode(PDO::FETCH_ASSOC); //podria ser PDO::FETCH_OBJ
    //sustituir los parametros por los valores reales
    $stmt->bindParam(':id', $id_cliente);

    //ejecutamos la consulta
    $stmt->execute();

    //recuperamos los datos de el array asoc.
    

    require __DIR__ . '/Baja_vista.php';
} catch (PDOException $ex) {
    echo "Error de conexion de la DB: " . $ex->getMessage();
}
