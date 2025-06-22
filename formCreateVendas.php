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
    <link rel="stylesheet" href="assets/styleCreateVendas.css">
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
        <form action="createVendas.php?act=save" method="post">
            <input type="hidden" name="id">
            <label for="nomeProduto">Selecione o produto:</label>
            <select id="nomeProduto" name="nomeProduto" required>
                <option></option>
                    <?php 
                        try{
                            $stmt = $conexao->prepare("SELECT id_produto, nome_produto FROM produtos");
                            $stmt->execute();
                            while($row = $stmt->fetch()) {
                                echo '<option value="' . htmlspecialchars($row['id_produto']) . '">' . htmlspecialchars($row['nome_produto']) . '</option>';
                            }
                        } catch (PDOException $erro){
                            echo 'Erro ao buscar produto: ' . $erro->getMessage();
                        }
                    ?>
            </select>
            <label for="quantidade">Quantidade:</label>
            <input type="number" name="quantidade" id="quantidade" step="1" required>
            <label for="pagamento">Forma de pagamento:</label>
            <select id="pagamento" name="pagamento" required>
                <option></option>
                    <?php 
                        try{
                            $stmt = $conexao->prepare("SELECT id_formaPagamento, nome_formaPagamento FROM formaPagamento");
                            $stmt->execute();
                            while($row = $stmt->fetch()) {
                                echo '<option value="' . htmlspecialchars($row['id_formaPagamento']) . '">' . htmlspecialchars($row['nome_formaPagamento']) . '</option>';
                            }
                        } catch (PDOException $erro){
                            echo 'Erro ao buscar produto: ' . $erro->getMessage();
                        }
                    ?>
            </select>
            <label for="valorTotal">Valor total:</label>
            <input type="number" name="valorTotal" id="valorTotal" step="0.01">
            <input type="submit" value="REGISTRAR">
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