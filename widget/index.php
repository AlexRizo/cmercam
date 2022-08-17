<?php 

require '../db/database.php';

if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, username, /*email,*/ password FROM usuarios WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
        $user = $results;
    }
}

$message = "";

$table = 0;

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../assets/css/style.css">
        <link rel="stylesheet" href="../assets/css/widget.css">
        <title>Cmercam</title>
    </head>

    <body>
        
            <table class="tabla widget">
                <thead>
                    <tr class="sub-title filas">
                        <th scope="col">DIVISAS</th>
                        <th scope="col" class="fondo-22">COMPRA/BUY</th>
                        <th scope="col" class="">VENTA/SELL</th>
                    </tr>
                </thead>
                <tbody>

                <?php require '../backend/list-admin.php'; ?>
                <?php require '../backend/select-flag.php'; ?>
                <?php foreach ($monedas as $moneda) {
                    $table++; ?>
                    <tr class="filas">
                        <?php if($table % 2 == 0): ?>
                            <td class="fondo-2 coins-alignment"><?php 
                                selectLittleFlag($moneda->moneda);
                                echo $moneda->moneda;
                            ?></td>
                            <td class="fondo-22"><?php echo '$ '.$moneda->compra ?></td>
                            <td class="fondo-2"><?php echo '$ '.$moneda->venta ?></td>
                        <?php else:?>
                            <td class="fondo-1 coins-alignment"><?php 
                                selectLittleFlag($moneda->moneda);
                                echo $moneda->moneda;
                            ?></td>
                            <td class="fondo-11"><?php echo '$ '.$moneda->compra ?></td>
                            <td class="fondo-1"><?php echo '$ '.$moneda->venta ?></td>
                            </td>
                        <?php endif; ?>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </body>
</html>