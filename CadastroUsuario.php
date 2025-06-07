<?php
include 'conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de usuário A Napolitana</title>
    <link rel="stylesheet" href="assets/styleCadastroUsuario.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@400..800&display=swap" rel="stylesheet">
</head>
<body>
    <div id="caixaCadastro">
        <div id="bgComLogo">
            <img src="assets/backgroundLogin.png" alt="logo da plataforma">
        </div>
        <div id="formCadastro">
            <h1 id="tituloCadastro">CADASTRO</h1>
            <form action="" method="post">
                <label for="nomeUsuario" class="estilizacaoLabel">Nome de usuário:</label>
                <div class="Input">
                    <input type="text" name="nomeUsuario" id="nomeUsuario" class="estilizacaoInput" placeholder="Ex.: Maria_123">    
                </div>
                <label for="email" class="estilizacaoLabel">Email:</label>
                <div class="Input">
                    <input type="email" name="email" id="email" class="estilizacaoInput" placeholder="Ex.: Maria1234@gmail.com" autocomplete=off require>
                </div>
                <label for="senha" class="estilizacaoLabel">Senha:</label>
                <div class="Input">
                    <input type="password" name="senha" id="senha" class="estilizacaoInput" placeholder="Ex.: Maria4321">    
                </div>
                <div id="divBtnCadastro">
                <input type="submit" value="CADASTRAR" id="btnCadastro">    
                </div>
            </form>
            <p>Já tem uma conta? <a href="http://localhost/aNapolitana/index.php" id="linkLogin">Fazer login</a></p>
        </div>
    </div>
</body>
</html>