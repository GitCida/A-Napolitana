<?php
include 'conexao.php';
include 'logarUsuario.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login A Napolitana</title>
    <link rel="stylesheet" href="assets/styleLogin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@400..800&display=swap" rel="stylesheet">
</head>
<body>
    <div id="caixaLogin">
        <div id="bgComLogo">
            <img src="assets/backgroundLogin.png" alt="logo da plataforma">
        </div>
        <div id="formLogin">
            <h1 id="tituloLogin">LOGIN</h1>
            <form action="logarUsuario.php" method="post">
                <label for="email" class="estilizacaoLabel">Email:</label>
                <div class="Input">
                    <input type="email" name="email" id="email" class="estilizacaoInput" placeholder="Ex.: Maria1234@gmail.com" autocomplete=off required value="<?php echo $_SESSION['emailPreenchido'] ?? ''; unset($_SESSION['emailPreenchido']);?>">
                </div>
                <label for="senha" class="estilizacaoLabel">Senha:</label>
                <div class="Input">
                    <input type="password" name="senha" id="senha" class="estilizacaoInput" placeholder="Ex.: Maria4321" required>    
                </div>
                <div id="divBtnLogin">
                <input type="submit" value="LOGIN" id="btnLogin">    
                </div>
            </form>
            <?php
                if (isset($_SESSION['mensagemErro'])) {
                    echo '<div id="mensagemErro">' . $_SESSION['mensagemErro'] . '</div>';
                    unset($_SESSION['mensagemErro']);
                }
            ?>
            <p>Novo aqui? <a href="http://localhost/aNapolitana/formCadastroUsuario.php" id="linkCadastro">Criar conta</a></p>
        </div>
    </div>
</body>
</html>