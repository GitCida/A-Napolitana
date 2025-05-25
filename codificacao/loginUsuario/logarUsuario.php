<?php 
if(isset ($_POST['email']) && !empty($_POST['email']) && isset ($_POST['senha']) && !empty($_POST['senha'])) {
    include_once 'conexao.php';
    include_once 'UsuarioClass.php';
    $u = new Usuario();
    $email = TRIM($_POST['email']);
    $senha = TRIM($_POST['senha']);
    if ($u->login($email, $senha) == true) {
        if(isset($_SESSION['IDuser'])){
            header("Location: ../telaInicial/index.php");
            exit();
        }
        else {
            header("Location: formLoginUsuario.php");
            exit();
        }
    }
    else {
        header("Location: formLoginUsuario.php");
        exit();
    }
}
else {
    header("Location: formLoginUsuario.php");
    exit();
}
?>