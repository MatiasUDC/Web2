<?php
error_reporting(E_ALL);
ini_set("display_errors", true);
$edad_cliente = $_GET['edad'];
header('Content - Type: text/html; charset-UTF-8');

try {
    $pdo = new PDO('mysql:host=localhost;dbname=clientes_db', 'root','');
    
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("SET NAMES UTF8");
    
    //sql
    $sql = "SELECT apellido, nombre, edad FROM clientes WHERE edad >= :edad";
    
    $stmt = $pdo->prepare($sql);
    
    //especid¿ficamos la salida como un array
    $stmt->setFetchMode(PDO::FETCH_ASSOC);//podria ser PDO::FETCH_OBJ
    
    //sustituir los parametros por los valores reales
    $stmt->bindParam(':edad', $edad_cliente);
    
    //ejecutamos la consulta
    $stmt->execute();
    
    //recuperamos los datos de el array asoc.
    $results = $stmt->fetchAll();
    
} catch (PDOException $ex) {
    echo "Error de conexion de la DB: " . $ex->getMessage();
}
echo sprintf('<h1>Clientes mayores de %d años </h1>', $edad_cliente);

foreach ($results as $fila)
{
    printf("%s %s (%d años)<br/>",
        $fila['apellido'],
        $fila['nombre'],
        $fila['edad']);
}