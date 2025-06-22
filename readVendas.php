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
    <link rel="stylesheet" href="assets/styleVendas.css">
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
    </aside>
    <section>
        <?php
            if (isset($_GET['msg'])) {
                echo '<div class="mensagem-sucesso">' . htmlspecialchars($_GET['msg']) . '</div>';
            }
        ?>

        <a href="http://localhost/aNapolitana/formCreateVendas.php">
            <button id="btnAdicionar">ADICIONAR</button>
        </a>
        <table border="1">
            <tr>
                <th>Produto</th>
                <th>Quantidade</th>
                <th>Pagamento (R$)</th>
                <th>Total (R$)</th>
                <th>Ações</th>
            </tr>
            <?php
                try {
                    $stmt = $conexao->prepare("SELECT produtos.id_produto, produtos.nome_produto, itemvenda.quantidade_venda, formaPagamento.nome_formaPagamento, vendas.valor_venda FROM itemVenda INNER JOIN produtos ON itemvenda.produtos_id_produto = produtos.id_produto INNER JOIN vendas ON itemvenda.vendas_id_venda = vendas.id_venda INNER JOIN formaPagamento ON vendas.formaPagamento_id_formaPagamento = formapagamento.id_formaPagamento;");
                    if ($stmt->execute()) {
                        while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                            echo "<tr>";
                            echo "<td>".$rs->nome_produto."</td><td>".$rs->quantidade_venda."</td><td>".$rs->nome_formaPagamento."</td><td>".$rs->valor_venda."</td><td><center><a href=\"\">[Alterar]</a>"."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"."<a href=\"\">[Excluir]</a></center></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "Erro: Não foi possível recuperar os dados do banco de dados";
                    }
                } catch (PDOException $erro) {
                    echo "Erro: ".$erro->getMessage();
                }
            ?>
</table>
    </section>
    <footer>
        <div class="footer-content">
            <p>&copy; 2025 A Napolitana. Todos os direitos reservados.</p>
            <p>Desenvolvido por 27 - Maria Aparecida Carvalho de Oliveira</p>
        </div>
    </footer>
</body>
</html>