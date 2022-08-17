<?php 

require '../db/database.php';

$id = $_GET['id'];

$sql = $conn->query("DELETE FROM divisas WHERE id = '$id';");
$monedas = $sql->fetchAll(PDO::FETCH_OBJ);

header('Location: /divisas/admin/');
?>