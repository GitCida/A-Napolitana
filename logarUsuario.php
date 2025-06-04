<?php
session_start();
require_once 'functions.php';
require_once 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($_POST['email']) && empty($_POST['senha'])) {
        $_SESSION['mensagemErro'] = "Você não preencheu nenhum dado. Preencha-os antes de enviar.";
        $_SESSION['emailPreenchido'] = '';        
        header("Location: index.php");
        exit;

    } elseif (empty($_POST['email'])) {
        $_SESSION['mensagemErro'] = "Preencha o e-mail";
        $_SESSION['emailPreenchido'] = '';
        header("Location: index.php");
        exit;

    } elseif (empty($_POST['senha'])) {
        $_SESSION['mensagemErro'] = "Preencha a senha";
        $_SESSION['emailPreenchido'] = $_POST['email'];
        header("Location: index.php");
        exit;
    }

    $email = trim($_POST['email']);
    $senha = trim($_POST['senha']);

    $stmt = $conexao->prepare("SELECT id_usuario FROM usuarios WHERE email = :email AND senha = :senha");
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':senha', $senha);
    $stmt->execute();
    $usuario = $stmt->fetch();

    if ($usuario) {
        $_SESSION['id_usuario'] = $usuario['id_usuario'];
        header("Location: telaInicial.php");
        exit;
    } else {
        $_SESSION['mensagemErro'] = "Email ou senha incorretos. Tente novamente";
        $_SESSION['emailPreenchido'] = $_POST['email'];
        header("Location: index.php");
        exit;
    }
}
?>