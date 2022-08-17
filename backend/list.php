<?php

require './db/database.php';

$sql = $conn->query('SELECT id, moneda, compra, venta FROM divisas WHERE tipo = "normal";');
$monedas = $sql->fetchAll(PDO::FETCH_OBJ);


?>
