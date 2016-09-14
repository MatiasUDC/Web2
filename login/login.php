<?php

require_once __DIR__ . '/../bibliotecas/db_connect.php';
//iniciamos session
session_start();

if (array_key_exists('logueado', $_SESSION) && $_SESSION['logueado'] == true) {
    header('Location: ../index.php');
    die();
}

if (!empty($_POST)) {
    $errores = [];
    //recibir valores
    $nombre_usuario = $_POST['nombre'];
    $contrasenia = $_POST['contrasenia'];
    $errores = [];

    //buscar el usuario en la base de datos
    if (strlen($nombre_usuario) == 0) {
        $errores['nombre'] = "El nombre de usuario es requerido";
    }
    if (strlen($contrasenia) == 0) {
        $errores['contraseña'] = "La contraseña es requerido";
    }
    if (!empty($errores)) {
        require 'login_vista.php';
        die();
    }
    try {
        $pdo = getConnectionUser();
        $sql = "SELECT id, nombre FROM usuario WHERE nombre = :nombre AND contrasenia = SHA1( :contrasenia ) AND estado = 1";
        $stmt = $pdo->prepare($sql);
        //especid¿ficamos la salida como un array
        $stmt->setFetchMode(PDO::FETCH_ASSOC); //podria ser PDO::FETCH_OBJ
        $stmt->bindParam(':nombre', $nombre_usuario, PDO::PARAM_STR);
        $stmt->bindParam(':contrasenia', $contrasenia,  PDO::PARAM_STR);
        //ejecutamos la consulta
        $stmt->execute();
        $results = $stmt->fetch();
        if (isset($results['nombre'])) { //si encuentra el usuario
            //setear variable de session
            //recuperar permisos y roles                
            $_SESSION['logueado'] = true;
            $_SESSION['nombre_usuario'] = $nombre_usuario;
            $_SESSION['id_usuario'] = $results['id'];
            $sql = "SELECT p.descripcion as descripcion
                        FROM usuario u
                            JOIN rol_usuario ru
                            ON u.id = ru.id_usuario
                            JOIN rol r 
                            ON r.id = ru.id_rol
                            JOIN permiso_rol pr 
                            on pr.id_rol = r.id
                            JOIN permiso p 
                            ON p.id = pr.id_permiso
                            WHERE u.id = :id ";
            $stmt = $pdo->prepare($sql);
            //especid¿ficamos la salida como un array
            $stmt->setFetchMode(PDO::FETCH_ASSOC); //podria ser PDO::FETCH_OBJ
            $stmt->bindParam(':id', $_SESSION['id_usuario']);
            $stmt->execute();
            $results = $stmt->fetchAll();

            //permisos de roleres del usuario
            foreach ($results as $value) {
                echo $value['descripcion'] . '<br/>';
                if (strcmp($value['descripcion'], 'INSERT') == 0) {
                    $_SESSION['INSERT'] = true;
                }
                if (strcmp($value['descripcion'], 'DELETE') == 0) {
                    $_SESSION['DELETE'] = true;
                }
                if (strcmp($value['descripcion'], 'UPDATE') == 0) {
                    $_SESSION['UPDATE'] = true;
                }
            }
            $results = NULL;

            $sql = "SELECT permiso.descripcion FROM permiso JOIN permiso_usuario ON permiso.id = permiso_usuario.id_permiso JOIN usuario ON usuario.id = permiso_usuario.id_usuario WHERE usuario.id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->setFetchMode(PDO::FETCH_ASSOC); //podria ser PDO::FETCH_OBJ
            $stmt->bindParam(':id', $_SESSION['id_usuario']);

            $stmt->execute();
            $results = $stmt->fetchAll();
            //permisos del usuario
            foreach ($results as $value) {
                echo $value['descripcion'] . '<br/>';
                if (strcmp($value['descripcion'], 'INSERT') == 0) {
                    $_SESSION['INSERT'] = true;
                }
                if (strcmp($value['descripcion'], 'DELETE') == 0) {
                    $_SESSION['DELETE'] = true;
                }
                if (strcmp($value['descripcion'], 'UPDATE') == 0) {
                    $_SESSION['UPDATE'] = true;
                }
            }

            //redireccion a index
            header('Location: ../index.php');
            die();
        } else {

            $errores['login'] = "La combinación de usuario y contraseña no es correcta.";
            require 'login_vista.php';
            die();
        }
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
} else {
    header('Location: login_vista.php');
    die();
}