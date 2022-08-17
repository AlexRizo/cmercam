<?php

require '../db/database.php';

$sql = 'UPDATE divisas SET id = :id, moneda = :moneda, compra = :compra, venta = :venta, tipo = :tipo WHERE id = :id;';
$stmt = $conn->prepare($sql); //realiza la consulta
// $stmt->bindParam(':moneda', $_POST['moneda']);
$stmt->bindParam(':id', $_POST['id']);
$stmt->bindParam(':moneda', $_POST['moneda']);
$stmt->bindParam(':compra', $_POST['compra']);
$stmt->bindParam(':venta', $_POST['venta']);
$stmt->bindParam(':tipo', $_POST['tipo']);

if ($stmt->execute()) { ?>
    <script>
        window.alert("Divisa actualizada correctamente")
    </script>
    <?php header('Location: /divisas/admin/');
}else{?>
    <script>
        window.alert("Error al actualizar la divisa")
    </script>
<?php } ?>