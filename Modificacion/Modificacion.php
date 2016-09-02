<?php
$id_cliente=$_GET['id'];
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
    $sql = "SELECT id,apellido,nombre,fecha_nacimiento,activo,n.nacionalidad "
         . "FROM clientes c JOIN nacionalidades n "
         . "ON c.nacionalidad_id = n.id "
         . "WHERE id >= :id";
    
    $stmt = $pdo->prepare($sql);
    
    //especid¿ficamos la salida como un array
    $stmt->setFetchMode(PDO::FETCH_ASSOC);//podria ser PDO::FETCH_OBJ
    
    //sustituir los parametros por los valores reales
    $stmt->bindParam(':id', $id_cliente);
    
    //ejecutamos la consulta
    $stmt->execute();
    
    //recuperamos los datos de el array asoc.
    $results = $stmt->fetchAll();
    
} catch (PDOException $ex) {
    echo "Error de conexion de la DB: " . $ex->getMessage();
}
try {
    $pdo = new PDO('mysql:host=localhost;dbname=clientes_db', 'root','');
    
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("SET NAMES UTF8");
    
    //sql
    $sql = "SELECT id, nacionalidad "
            . "FROM nacionalidades";
    
    $stmt = $pdo->prepare($sql);
    
    //especid¿ficamos la salida como un array
    $stmt->setFetchMode(PDO::FETCH_ASSOC);//podria ser PDO::FETCH_OBJ
    
    //sustituir los parametros por los valores reales
    
    //ejecutamos la consulta
    $stmt->execute();
    
    //recuperamos los datos de el array asoc.
    $results = $stmt->fetchAll();
    
} catch (PDOException $ex) {
    echo "Error de conexion de la DB: " . $ex->getMessage();
}
if(!empty($_POST)){
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
    $sql = "UPDATE clientes SET id,apellido=:apellido,"
         . "nombre=:nombre,fecha_nacimiento=:fecha,"
         . "activo=:activo,nacionalidad_id=:nacionalidad" 
         . "WHERE id >= :id";
    
    $stmt = $pdo->prepare($sql);
    
    //especid¿ficamos la salida como un array
    $stmt->setFetchMode(PDO::FETCH_ASSOC);//podria ser PDO::FETCH_OBJ
    
    //sustituir los parametros por los valores reales
    $stmt->bindParam(':id', $id_cliente);
    $stmt->bindParam(':apellido', $valores["apellido"]);
    $stmt->bindParam(':nombre', $valores["nombre"]);
    $stmt->bindParam(':fecha', $valores["Nacimiento"]);
    $stmt->bindParam(':activo', $valores["activo"]);
    $stmt->bindParam(':nacionalidad', $valores["Nacionalidad"]);
    
    //ejecutamos la consulta
    $stmt->execute();
    
    //recuperamos los datos de el array asoc.
    $results = $stmt->fetchAll();
    
} catch (PDOException $ex) {
    echo "Error de conexion de la DB: " . $ex->getMessage();
}    
}