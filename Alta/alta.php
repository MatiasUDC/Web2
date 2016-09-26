<?php

require_once __DIR__ . '/../bibliotecas/db_connect.php';
require_once __DIR__ . '/../login/control_session.php';
if ($_SESSION['INSERT'] != true) {
    header('Location: ../login/denegado.php');
    die();
}
try {
    $pdo = getConnection();
    $sql = "SELECT id, nacionalidad "
            . "FROM nacionalidades";

    $stmt = $pdo->prepare($sql);

    //especid¿ficamos la salida como un array
    $stmt->setFetchMode(PDO::FETCH_ASSOC); //podria ser PDO::FETCH_OBJ
    //sustituir los parametros por los valores reales
    //ejecutamos la consulta
    $stmt->execute();

    //recuperamos los datos de el array asoc.
    $results = $stmt->fetchAll();
} catch (PDOException $ex) {
    echo "Error de conexion de la DB: " . $ex->getMessage();
}

$errores = [];
if (!empty($_POST)) {
    $valores = [];

    $apellido = $_POST["apellido"];
    $nombre = $_POST["nombre"];
    $Nacimiento = $_POST["Nacimiento"];
    $Nacionalidad = $_POST["Nacionalidad"];
    $activo = $_POST["Activo"];

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
 
        if ($activo == false)
            $valores["activo"] = 0;
        else {
            $valores["activo"] = 1;
        }
    
    if (count($errores) > 0) {
        require __DIR__ . '/Alta.php';
    } else {

        require __DIR__ . '/../controladores/ConexionAlta.php';
    }
}
require_once __DIR__ . '/Alta_vista.php';
