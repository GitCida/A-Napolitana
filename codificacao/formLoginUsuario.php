<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login A Napolitana</title>
    <link rel="stylesheet" href="styleLogin.css">
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
            <form action="" method="post">
                <label for="nomeUsuarioOuEmail" class="estilizacaoLabel">Nome de usuário ou e-mail:</label>
                <div class="Input">
                    <input type="text" name="nomeUsuarioOuEmail" id="nomeUsuarioOuEmail" class="estilizacaoInput" placeholder="Ex.: Maria123";>
                </div>
                <label for="senha" class="estilizacaoLabel">Senha:</label>
                <div class="Input">
                    <input type="password" name="senha" id="senha" class="estilizacaoInput" placeholder="Ex.: Maria4321";>    
                </div>
                <div id="divBtnLogin">
                <input type="submit" value="LOGIN" id="btnLogin">    
                </div>
            </form>
            <p>Novo aqui? <u><a href="">Criar conta</a></u></p>
        </div>
    </div>
</body>
</html>