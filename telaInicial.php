<?php
include 'protection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela inicial</title>
    <link rel="stylesheet" href="assets/styleTelaInicial.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@400..800&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Agbalumo&family=Caprasimo&family=Fascinate+Inline&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <div class="logo">
            <img class="logoANapolitana" src="assets/logoANapolitana_semNome.png" alt="Logo A Napolitana">
            <img class="logoANapolitana" src="assets/logoANapolitana_nome.png" alt="">
        </div>
        <nav>
            <ul id="menu">
                <li><a href="http://localhost/aNapolitana/telaInicial.php">Início</a></li>
                <li><a href="">Serviços</a></li>
                <li><a href="">Contato</a></li>
                <li><a href="">Sobre</a></li>
            </ul>
        </nav>
        <div class="iconeUsuario">
            <img class="imgIconeUsuario" src="assets/iconeUsuario.webp" alt="Icone Usuario">
        </div>
    </header>
    <aside>
        <h2>MENU</h2>
            <a class="linkAside" href="http://localhost/aNapolitana/readProdutos.php">Cadastrar e gerenciar produtos</a>
            <a class="linkAside" href="http://localhost/aNapolitana/readVendas.php">Registrar e gerenciar vendas</a>
            <a id="logout" href="logout.php">Sair da conta</a>
    </aside>
    <section>
        <a class="linkBtn" href="http://localhost/aNapolitana/readProdutos.php">
            <div class="btnTelaInicial" id="btnProdutos">
                    <img class="iconesTelaInicial" src="assets/icone_iceCream.png" alt="icone de sorvete">
                    <p>
                        Cadastrar e gerenciar produtos
                    </p>
            </div>
        </a>
        <a class="linkBtn" href="http://localhost/aNapolitana/readVendas.php"></a>
            <div class="btnTelaInicial" id="btnVendas">
                <img class="iconesTelaInicial" src="assets/icone_carrinhoDeCompras.png" alt="icone de carrinho de compras">
                <p>
                    Registrar e gerenciar vendas
                </p>
            </div>
        </a>
    </section>
    <footer>
        <div class="footerConteudo">
            <p>&copy; 2025 A Napolitana. Todos os direitos reservados.</p>
            <p>Desenvolvido por 27 - Maria Aparecida Carvalho de Oliveira</p>
        </div>
    </footer>
</body>
</html>