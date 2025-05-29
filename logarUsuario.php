<?php
session_start();
require_once 'functions.php';
require_once 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $stmt = $conexao->prepare("SELECT id_usuario FROM usuarios WHERE email = :email AND senha = :senha");
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':senha', $senha);
    $stmt->execute();
    $usuario = $stmt->fetch();

    if ($usuario) {
        $_SESSION['usuario_id'] = $usuario['id_usuario'];
        header("Location: telaInicial.php");
        exit;
    } else {
        echo "Email ou senha incorretos!";
    }
}
?>