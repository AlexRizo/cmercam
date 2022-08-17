<?php

require '../db/database.php';

$sql = $conn->query('SELECT idm, mensaje FROM mensaje;');
$mensajes = $sql->fetchAll(PDO::FETCH_OBJ);


?>