<?php 
session_start();
include 'conexao.php';

if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "save" && !empty($_POST["nomeUsuario"]) && !empty($_POST["email"]) && !empty($_POST["senha"])) {
    $nomeUsuario = trim($_POST['nomeUsuario']);
    $email = trim($_POST['email']);
    $senha = trim($_POST['senha']);

    try {
        $stmt = $conexao->prepare("SELECT * FROM usuarios WHERE email = :email OR nome_usuario = :nomeUsuario");
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':nomeUsuario', $nomeUsuario);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $_SESSION['mensagemErro'] = "Já existe um usuário com este e-mail ou nome de usuário.";
            $_SESSION['dadosPreenchidos'] = [
        'nomeUsuario' => $nomeUsuario,
        'email' => $email];
            header("Location: formCadastroUsuario.php");
            exit;
        }

        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

        $stmt = $conexao->prepare("INSERT INTO usuarios (nome_usuario, email, senha) VALUES (:nomeUsuario, :email, :senha)");
        $stmt->bindValue(':nomeUsuario', $nomeUsuario);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':senha', $senhaHash);

        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {
                $idUsuario = $conexao->lastInsertId();
                $_SESSION['id_usuario'] = $idUsuario;
                header("Location: telaInicial.php");
                exit;
            } else {
                echo "Erro ao efetivar cadastro.";
            }
        } else {
            throw new PDOException("Erro: Não foi possível executar a declaração SQL.");
        }

    } catch (PDOException $erro) {
        echo "Erro: " . $erro->getMessage();
    }
}
?>
