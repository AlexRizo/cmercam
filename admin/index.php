<?php 

require '../db/database.php';

session_start();

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

if (!empty($_POST['moneda']) && !empty($_POST['compra']) && !empty($_POST['venta'])) {
    $sql = "INSERT INTO divisas (moneda, compra, venta, tipo) VALUES (:moneda, :compra, :venta, :tipo)";
    $stmt = $conn->prepare($sql); //realiza la consulta
    $stmt->bindParam(':moneda', $_POST['moneda']);
    $stmt->bindParam(':compra', $_POST['compra']);
    $stmt->bindParam(':venta', $_POST['venta']);
    $stmt->bindParam(':tipo', $_POST['tipo']);


    if ($stmt->execute()) {
        $message = "Moneda añadida correctamente";
        header('Location: /divisas/admin/');
    }else{
        $message = "Hubo un problema al agregar la moneda.";
        header('Location: /divisas');
    }
}

$table = 0;

?>

<?php if(empty($user)):

    header('Location: /divisas');

else: ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../assets/css/style.css">
        <title>Cmercam - Admin</title>
    </head>

    <body>
        <header>
            <a href="/divisas/"><img src="../assets/img/cmercam.png" alt="Logo"></a>
        </header>
        <br>

        <?php require '../backend/mensaje-admin.php' ?>
            <?php foreach ($mensajes as $mensaje) {?>
            <div class="marquesina admin">
                    <marquee behavior="" direction="left"><?php echo $mensaje->mensaje ?></marquee>
            </div>
            <button type="button" class="btn-edit-message" data-bs-toggle="modal" data-bs-target="#editMessage"></button>
        <?php } ?>

        <a href="/divisas/login/logout.php"><button type="submit" class="logout-btn"></button></a>
        
            <table class="tabla">
                <thead>
                    <tr class="sub-title filas">
                        <th scope="col">DIVISAS</th>
                        <th scope="col" class="fondo-22 is-admin">COMPRA/BUY</th>
                        <th scope="col" class="is-admin">VENTA/SELL</th>
                        <th scope="col" class="fondo-22">OPCIONES</th>
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
                            <td class="fondo-22 is-admin"><?php echo '$ '.$moneda->compra ?></td>
                            <td class="fondo-2 is-admin"><?php echo '$ '.$moneda->venta ?></td>
                            <td class="fondo-22">
                                <a href="edit.php?id=<?php echo $moneda->id ?>"><button type="button" class="btn-edit"></button></a>
                                <button type="button" class="btn-delete" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $moneda->id ?>"></button>
                            </td>
                        <?php else:?>
                            <td class="fondo-1 coins-alignment"><?php 
                                selectLittleFlag($moneda->moneda);
                                echo $moneda->moneda;
                            ?></td>
                            <td class="fondo-11 is-admin"><?php echo '$ '.$moneda->compra ?></td>
                            <td class="fondo-1 is-admin"><?php echo '$ '.$moneda->venta ?></td>
                            <td class="fondo-11">
                                <a href="edit.php?id=<?php echo $moneda->id ?>"><button type="button" class="btn-edit"></button></a>   
                                <button type="button" class="btn-delete" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $moneda->id ?>"></button>
                            </td>
                        <?php endif; ?>
                    </tr>

                    <!-- Modal Borrar -->
                    <div class="modal fade" id="deleteModal<?php echo $moneda->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Eliminar Divisa</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            ¿Realmente deseas eleminar la divisa? <br>
                            Esta acción no se puede deshacer.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <a href="delete.php?id=<?php echo $moneda->id ?>"><button type="button" class="btn btn-danger">Eliminar</button></a>
                        </div>
                        </div>
                    </div>
                    </div>
                <?php } ?>
                </tbody>
            </table>



            <!-- Modal Editar Mensaje -->
            <div class="modal fade" id="editMessage" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Añadir Divisa</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!--Formulario-->
                        <form action="message.php" method="post"">
                            <div class="form-group">
                                
                                <input type="hidden" name="idm" class="form-control" value="<?php echo $mensaje->idm ?>">
                                <input type="text" name="mensaje" class="form-control" placeholder="Mensaje" required value="<?php echo $mensaje->mensaje ?>">
                                <br>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-warning">Guardar</button>
                            </div>
                            </form>
                    </div>
                    </div>
                </div>
                </div>



                <!-- Modal Añadir -->
                <div class="modal fade" id="insertModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Añadir Divisa</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!--Formulario-->
                        <form action="/divisas/admin/index.php" method="post"">
                            <div class="form-group">
                                <!-- <input type="text" name="moneda" placeholder="Divisa" class="form-control" required>
                                <br> -->
                                <select name="moneda" class="form-control" required>
                                    <!-- <option value="div">--DIVISAS--</option> -->
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

                                <input type="number" step="any" name="compra" placeholder="Compra" class="form-control" required>
                                <br>

                                <input type="number" step="any" name="venta" placeholder="Venta" class="form-control" required>
                                <br>

                                <select name="tipo" id="" class="form-control">
                                    <option value="destacado">Destacado</option>
                                    <option value="normal">Normal</option>
                                </select>
                                <br>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-warning">Añadir</button>
                            </div>
                            </form>
                    </div>
                    </div>
                </div>
                </div>
                
                <?php if ($table >= 10) : ?>
                <button type="button" class="add" data-bs-toggle="modal" data-bs-target="#insertModal" disabled="disabled">+</button>
                <?php else: ?>
                <button type="button" class="add" data-bs-toggle="modal" data-bs-target="#insertModal">+</button>
                <?php endif; ?>
</html>

<?php endif; ?>