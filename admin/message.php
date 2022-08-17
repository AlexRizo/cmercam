<?php

require '../db/database.php';

$sql = 'UPDATE mensaje SET idm = :idm, mensaje = :mensaje WHERE idm = :idm';
$stmt = $conn->prepare($sql); //realiza la consulta
// $stmt->bindParam(':moneda', $_POST['moneda']);
$stmt->bindParam(':idm', $_POST['idm']);
$stmt->bindParam(':mensaje', $_POST['mensaje']);

if ($stmt->execute()) { ?>
    <script>
        window.alert("Mensaje actualizado correctamente")
    </script>
    <?php header('Location: /divisas/admin/');
}else{?>
    <script>
        window.alert("Error al actualizar el mensaje")
    </script>
<?php } ?>