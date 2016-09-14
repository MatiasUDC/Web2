<?php
function getConnection(){
    error_reporting(E_ALL);
//    ini_set("display_errors", true);
    header('Content - Type: text/html; charset-UTF-8');
    
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=clientes_db', 'clientes_app', 'K7ddJzzv2G4ERUBt');
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->exec("SET NAMES UTF8");
        
        return $pdo;
    } catch (PDOException $ex) {
        throw new Exception('Error de conexion de la DB: ' . $ex->getMessage());
    }
}
function getConnectionUser(){
    error_reporting(E_ALL);
//    ini_set("display_errors", true);
    header('Content - Type: text/html; charset-UTF-8');
    
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=usuario', 'clientes_app', 'K7ddJzzv2G4ERUBt');
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->exec("SET NAMES UTF8");
        
        return $pdo;
    } catch (PDOException $ex) {
        throw new Exception('Error de conexion de la DB: ' . $ex->getMessage());
    }
}