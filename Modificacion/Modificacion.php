<?php

if (empty($_POST)) {
    $errores = [];

    $id_cliente = $_GET['id'];
    error_reporting(E_ALL);
    ini_set("display_errors", true);
    header('Content - Type: text/html; charset-UTF-8');

    try {
        $pdo = new PDO('mysql:host=localhost;dbname=clientes_db', 'root', '');

        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->exec("SET NAMES UTF8");

        //sql
        $sql = "SELECT c.id,c.apellido as apellido,c.nombre as nombre,c.fecha_nacimiento ,c.activo as activo,n.nacionalidad "
                . "FROM clientes c JOIN nacionalidades n "
                . "ON c.nacionalidad_id = n.id "
                . "WHERE c.id >= :id";

        $stmt = $pdo->prepare($sql);

        //especid¿ficamos la salida como un array
        $stmt->setFetchMode(PDO::FETCH_ASSOC); //podria ser PDO::FETCH_OBJ
        //sustituir los parametros por los valores reales
        $stmt->bindParam(':id', $id_cliente);

        //ejecutamos la consulta
        $stmt->execute();

        //recuperamos los datos de el array asoc.
        $results = $stmt->fetch();
    } catch (PDOException $ex) {
        echo "Error de conexion de la DB: " . $ex->getMessage();
    }
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=clientes_db', 'root', '');

        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->exec("SET NAMES UTF8");

        //sql
        $sql = "SELECT id, nacionalidad "
                . "FROM nacionalidades";

        $stmt = $pdo->prepare($sql);

        //especid¿ficamos la salida como un array
        $stmt->setFetchMode(PDO::FETCH_ASSOC); //podria ser PDO::FETCH_OBJ
        //sustituir los parametros por los valores reales
        //ejecutamos la consulta
        $stmt->execute();

        //recuperamos los datos de el array asoc.
        $resultado = $stmt->fetchAll();
    } catch (PDOException $ex) {
        echo "Error de conexion de la DB: " . $ex->getMessage();
    }

    require __DIR__ . '/Modificacion_Vista.php';
}
if (!empty($_POST)) {
    $errores = [];
    $valores = [];
    $id = $_POST["id"];
    $apellido = $_POST["apellido"];
    $nombre = $_POST["nombre"];
    $Nacimiento = $_POST["Nacimiento"];
    $Nacionalidad = $_POST["Nacionalidad"];
    $activo = $_POST["Activo"];
    if ($id == null) {
        $errores["id"] = "No existe ese id";
    } else {
        $valores["id"] = $id;
    }
    if ($apellido == null || $apellido == '') {
        $errores["apellido"] = "Debe ingresar un apellido valido";
    } else {
        $valores["apellido"] = $apellido;
    }
    if ($nombre == null || $nombre == '') {
        $errores["nombre"] = "Debe ingresar un nombre valido";
    } else {
        $valores["nombre"] = $nombre;
    }
    if ($Nacimiento == NULL) {
        $errores["Nacimiento"] = "Debe ingresar una fecha valida";
    } else {
        $valores["Nacimiento"] = $Nacimiento;
    }
    if ($Nacionalidad == null) {
        $errores["Nacionalidad"] = "Debe ingresar una nacionalidad valido";
    } else {
        $valores["Nacionalidad"] = $Nacionalidad;
    }
    if ($activo == NULL) {
        $errores["activo"] = $activo;
    } else {
        if ($activo == false)
            $valores["activo"] = 0;
        else {
            $valores["activo"] = 1;
        }
    }
    if (count($errores) > 0) {
        require __DIR__ . '/Modificacion.php';
    } else {

        require __DIR__ . '/Conexion.php';
    }

    require __DIR__ . '/Modificacion_Vista.php';
}
