<?php 

require '../db/database.php';

$message = "";

if (!empty($_POST['username']) && /* !empty($_POST['email']) && */ !empty($_POST['password'])) {
    $sql = "INSERT INTO usuarios (username, /*email,*/ password) VALUES (:username, /*:email,*/ :password)";
    $stmt = $conn->prepare($sql); //realiza la consulta
    $stmt->bindParam(':username', $_POST['username']);
    // $stmt->bindParam(':email', $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);

    if ($stmt->execute()) { ?>
        <script>
            window.alert("Cuenta creada correctamente")
        </script>
        <?php header('Location: /divisas/admin/index.php');
    }else{?>
        <script>
            window.alert("Error al crear la cuenta")
        </script>
        <?php header('Location: /divisas/admin/index.php');
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Signup</title>
</head>
<body>
    
    <header>
        <a href="/divisas/index.php"><img src="../assets/img/cmercam.png" alt="Logo"></a>
    </header>

    <div class="form">

        <h2>Regístrate</h2>

        <?php if (!empty($message)): ?>
            <p><?= $message ?></p>
        <?php endif; ?>

        <span>o <a href="index.php">Inicia Sesión</a></span>

        <form action="signup.php" method="post">

            <input type="text" name="username" placeholder="Usuario" required maxlength="10" class="username-input">
            <!-- <input type="text" name="email" placeholder="Correo Electrónico" required> -->
            <input type="password" name="password" placeholder="Contraseña" required maxlength="15" class="password-input">
            <!-- <input type="password" name="confirm-password" placeholder="Confirmar Contraseña" required> -->
            <input type="submit" value="Registrarse">

        </form>

    </div>

</body>
</html>