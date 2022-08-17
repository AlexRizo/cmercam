<?php

require 'db/database.php';

$sql = $conn->query('SELECT id, moneda, compra, venta FROM divisas WHERE tipo = "Destacado";');
$monedas = $sql->fetchAll(PDO::FETCH_OBJ);

?>

<table class="tabla-2">
    <thead>
        <?php require 'backend/select-flag.php' ?>
        <?php foreach ($monedas as $moneda) {?>
        <tr>
            <th class="divisa"><?php echo $moneda->moneda ?></th>
            <th class="divisor"></th>
            <th class="divisa">Compra/Buy</th>
            <th class="divisor"></th>
            <th class="divisa">Venta/Sell</th>
        </tr>
    </thead>
    <tbody class="">
        <tr class="">
            <td class="divisa-inf"><?php selectBigFlag($moneda->moneda) ?></td>
            <td class="divisor"></td>
            <td class="divisa-inf"><?php echo '$ '.$moneda->compra ?></td>
            <td class="divisor"></td>
            <td class="divisa-inf"><?php echo '$ '.$moneda->venta ?></td>
        </tr>
        <tr>
            <td class="margen"></td>
        </tr>
        <?php } ?>
    </tbody>    
</table>


