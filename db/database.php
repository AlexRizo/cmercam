<?php

$server = 'localhost';
$username = 'root';
$password = '';
$database = 'cmercam';

try { //Si hay un error con la conexión a la base de datos nos dará error.
    $conn = new PDO(
        "mysql:host=$server; 
        dbname=$database;",
        $username, 
        $password
    );
} catch (PDOException $e){
    die('Connected Failed: '.$e->getMessage());
}

?>