<?php
include_once 'protection.php';
include_once 'conexao.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar e gerenciar produtos</title>
    <link rel="stylesheet" href="assets/styleProdutos.css">
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
        <div>
            <h2>MENU</h2>
            <a id="linkProdutos" class="linkAside" href="http://localhost/aNapolitana/readProdutos.php">Cadastrar e gerenciar produtos</a>
            <a id="linkVendas" class="linkAside" href="http://localhost/aNapolitana/readVendas.php">Registrar e gerenciar vendas</a>
        </div>
        <div id="divLogout">
            <a id="logout" href="logout.php">Sair da conta</a>
        </div>
    </aside>
    <section>
        <?php
            if (isset($_GET['msg'])) {
                echo '<div class="mensagem-sucesso">' . htmlspecialchars($_GET['msg']) . '</div>';
            }
        ?>

        <a href="http://localhost/aNapolitana/formCreateProdutos.php">
            <button id="btnAdicionar">ADICIONAR</button>
        </a>
        <table border="1">
            <tr>
                <th>Produto</th>
                <th>Categoria</th>
                <th>Preço (R$)</th>
                <th>Marca</th>
                <th>Ações</th>
            </tr>
            <?php
                try {
                    $stmt = $conexao->prepare("SELECT produtos.id_produto, produtos.nome_produto, produtos.preco,categorias.nome_categoria, marcas.nome_marca FROM produtos INNER JOIN categorias ON produtos.categorias_id_categoria = categorias.id_categoria INNER JOIN marcas ON produtos.marcas_id_marca = marcas.id_marca");
                    if ($stmt->execute()) {
                        while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                            echo "<tr>";
                            echo "<td>".$rs->nome_produto."</td><td>".$rs->nome_categoria."</td><td>".$rs->preco."</td><td>".$rs->nome_marca."</td><td><center><a href=\"\">[Alterar]</a>"."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"."<a href=\"deleteProdutos.php?id=".$rs->id_produto."\" onclick=\"return confirm('Tem certeza que deseja excluir este produto?');\">[Excluir]</a></center></td>";
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