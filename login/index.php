<?php

session_start();


if (isset($_SESSION['user_id'])) {
    header('Location: /divisas/admin/');
}

require '../db/database.php';

if (!empty($_POST['username']) && !empty($_POST['password'])) {
    $records = $conn->prepare("SELECT id, username, password FROM usuarios WHERE username =:username");
    $records->bindParam(':username', $_POST['username']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = "";

    if (isset($results['username']) && password_verify($_POST['password'], $results['password'])) {
        $_SESSION['user_id'] = $results['id'];
        header('Location: /divisas/admin');
    }else{
        $message = "Correo y/o contraseña incorrectos.";
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
    <title>Iniciar Sesión</title>
</head>
<body>

<header>
        <a href="/divisas/"><img src="../assets/img/cmercam.png" alt="Logo"></a>
</header>

    <div class="form">

        <h2 class="form-title">Iniciar Sesión</h2>

        <?php if (!empty($message)): ?>
            <p class="login-message"><?= $message ?></p>
        <?php endif; ?>

        <form action="/divisas/login/" method="post">
        
            <input type="text" name="username" placeholder="Usuario" required maxlength="10" class="username-input">
            <input type="password" name="password" placeholder="Contraseña" required maxlength="15" class="password-input">
            <input type="submit" value="Ingresar">
    
            <!-- <span hidden>¿No tienes una cuenta? <a class="register" href="signup.php">Regístrate</a></span> -->
    </div>



</body>
</html>