<?php
include 'protection.php';
include 'conexao.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar e gerenciar produtos</title>
    <link rel="stylesheet" href="assets/styleCreateProdutos.css">
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
        <a id="linkProdutos" class="linkAside" href="http://localhost/aNapolitana/readProdutos.php">Cadastrar e gerenciar produtos</a>
        <a id="linkVendas" class="linkAside" href="http://localhost/aNapolitana/readVendas.php">Registrar e gerenciar vendas</a>
        <a id="logout" href="logout.php">Sair da conta</a>
    </aside>
    <section>
        <h1>
            Cadastrar produto
        </h1>
        <form action="createProdutos.php?act=save" method="post">
            <input type="hidden" name="id">
            <label for="nomeProduto">Nome do produto:</label>
            <div>
                <input class="inputProduto" type="text" name="nomeProduto" id="nomeProduto" required>
            </div>
            <label for="categoria">Selecione a categoria:</label>
            <div>
                <select class="inputProduto" id="categoria" name="categoria" required>
                    <option></option>
                        <?php 
                            try{
                                $stmt = $conexao->prepare("SELECT id_categoria, nome_categoria FROM categorias");
                                $stmt->execute();
                                while($row = $stmt->fetch()) {
                                    echo '<option value="' . htmlspecialchars($row['id_categoria']) . '">' . htmlspecialchars($row['nome_categoria']) . '</option>';
                                }
                            } catch (PDOException $erro){
                                echo 'Erro ao buscar nome da categoria: ' . $erro->getMessage();
                            }
                        ?>
                </select>
            </div>
            <label for="preco">Preço (R$):</label>
            <div>
                <input class="inputProduto" type="number" name="preco" id="preco" step="0.01" style="appearance: none; -webkit-appearance: none; -moz-appearance: none;" required>
            </div>
            <label for="marca">Selecione a marca:</label>
            <div>
                <select class="inputProduto" id="marca" name="marca" required>
                    <option></option>
                    <?php 
                            try{
                                $stmt = $conexao->prepare("SELECT id_marca, nome_marca FROM marcas");
                                $stmt->execute();
                                while($row = $stmt->fetch()) {
                                    echo '<option value="' . htmlspecialchars($row['id_marca']) . '">' . htmlspecialchars($row['nome_marca']) . '</option>';
                                }
                            } catch (PDOException $erro){
                                echo 'Erro ao buscar nome da categoria: ' . $erro->getMessage();
                            }
                        ?>
                </select>
            </div>
            <div id="btnsForm">
                <input id="btnCadastrar" type="submit" value="Cadastrar">
            </div>
        </form>
    </section>
    <footer>
        <div class="footer-content">
            <p>&copy; 2025 A Napolitana. Todos os direitos reservados.</p>
            <p>Desenvolvido por 27 - Maria Aparecida Carvalho de Oliveira</p>
        </div>
    </footer>
</body>
</html>