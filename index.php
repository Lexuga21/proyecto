<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once 'login/functionLogin.php';
require_once 'funciones/claseEmpleado.php';

if (isset($_SESSION['id'])) {
    header('location: vistas/home.php');
    exit();
}

$iniciosesion = new Login();

if (isset($_POST['submit'])) {
    $usuario = trim($_POST['Usuario']);
    $contrasena = trim($_POST['Contrasena']);

    if (!empty($usuario) && !empty($contrasena)) {
        $resultado = $iniciosesion->IniciarSesion($usuario, $contrasena);

        if ($resultado == 1) {
            $_SESSION['iniciosesion'] = true;
            $_SESSION['id'] = $iniciosesion->IdUsuario();
            $cargo = $iniciosesion->obtenerCargo($_SESSION['id']);

            if ($cargo == 1 || $cargo == 2) {
                header('location: vistas/home.php');
            } else {
                header('location: home2.php');
            }
            exit();
        } else {
            $error = "Usuario o contraseña incorrectos.";
        }
    } else {
        $error = "Por favor, complete todos los campos.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>-Inicio de Sesion-</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="estilos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <form action="" method="POST">
        <h1>LOGIN</h1>
        <hr>
        <?php if (isset($error)): ?>
            <p style="color: red;"><?php echo $error; ?></p>
        <?php endif; ?>
        <i class="fa-solid fa-user"></i>
        <label>Usuario</label>
        <input type="text" name="Usuario" placeholder="Nombre de usuario" required>
        <i class="fa-solid fa-key"></i>
        <label>Contraseña</label>
        <input type="password" name="Contrasena" placeholder="Contraseña" required>
        <hr>
        <button type="submit" name="submit">Iniciar Sesion</button>
    </form>
    <br>
    <br>
    <!--Recuerda borrar el marquee-->
    <div>
        <marquee behavior="" direction="up" scrollamount="7">
            <i class="fa-solid fa-ghost"></i>
        </marquee>
    </div>
</body>
</html>