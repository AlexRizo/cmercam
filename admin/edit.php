<?php

session_start();
require '../db/database.php';

$id = $_GET['id'];
$sql = $conn->query("SELECT id, moneda, compra, venta, tipo FROM divisas WHERE id = '$id';");
$monedas = $sql->fetchAll(PDO::FETCH_OBJ);

foreach ($monedas as $moneda) {}

?>
<?php if (!isset($_SESSION['user_id'])) {
    header('Location: /divisas/');
}else{?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Cmercam - Editar divisa</title>
</head>
<body>

    <header>
        <a href="divisas/"><img src="../assets/img/cmercam.png" alt="Logo"></a>
    </header>

    <form action="/divisas/backend/actualizar.php" method="post" >
        <div class="form-edit-fa">
            <h5 class="modal-title fomr-edit-title" id="exampleModalLabel"><?php echo $moneda->moneda ?></h5>
            <nav class="divider"></nav>

            <input type="hidden" name="id" value="<?php echo $moneda->id ?>">

            <select name="moneda" id="" class="form-control margen-sup" required>
                <option value="<?php echo $moneda->moneda ?>"><?php echo $moneda->moneda ?></option>
                <option value="Dólar USD">Dólar USD</option>
                <option value="Euro">Euro</option>
                <option value="Dólar Canadiense">Dólar Canadiense</option>
                <option value="Libra Esterlina">Libra Esterlina</option>
                <option value="Peso Colombiano">Peso Colombiano</option>
                <option value="Dólar Australiano">Dólar Australiano</option>
                <option value="Franco Suizo">Franco Suizo</option>
                <option value="Yuan Chino">Yuan Chino</option>
                <option value="Plata">Plata</option>
                <option value="Oro">Oro</option>

            </select>
            <br>
            <input type="number" step="any" name="compra" placeholder="Compra" class="form-control" value="<?php echo $moneda->compra ?>" required>
            <br>

            <input type="number" step="any" name="venta" placeholder="Venta" class="form-control" value="<?php echo $moneda->venta ?>" required>
            <br>

            <select name="tipo" id="" class="form-control">
                <option value="<?php echo $moneda->tipo ?>"><?php echo $moneda->tipo ?></option>
                <option value="Destacado">Destacado</option>
                <option value="Normal">Normal</option>
            </select>
            <br>
            <nav class="divider"></nav>
            <div class="action-buttons">
                <a href="index.php"><button type="button" class="cancel-button">Cancelar</button></a>
                <button type="submit" class="save-button">Guardar</button>
            </div>
        </div>
    </form>
</body>
</html>

<?php } ?>