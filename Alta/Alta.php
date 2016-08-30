<?php

$nacionalidades = ['Argentina', 'Uruguay', 'Brasil', 'Colombia'];



if (!empty($_POST)) {
    $valores=[];
    $errores = [];
    $apellido = $_POST["apellido"];
    $nombre = $_POST["nombre"];
    $Nacimiento = $_POST["Nacimiento"];
    $Nacionalidad = $_POST["Nacionalidad"];
    $activo = $_POST["activo"];
    
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
    if ($Nacimiento <= 0 || $Nacimiento = NULL) {
        $errores["edad"] = "Debe ingresar una edad valida";
    } else {
        $valores["Nacimiento"] = $Nacimiento;
    }
    if ($Nacionalidad == null) {
        $errores["nacionalidad"] = "Debe ingresar una nacionalidad valido";
    } else {
        $valores["nacionalidad"] = $Nacionalidad;
    }
    
    if (count($errores) > 0) {
        require __DIR__. '/Alta.php';
    } else {
        
        require __DIR__ . '/Conexion.php';
    }
}
require __DIR__ . '/Alta_vista.php';
