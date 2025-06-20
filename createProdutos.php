<?php
include_once 'protection.php';
include_once 'conexao.php';
if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "save" && !empty($_POST["nomeProduto"]) && !empty($_POST["categoria"]) && !empty($_POST["preco"]) && !empty($_POST["marca"])) {
    $nomeProduto = trim($_POST['nomeProduto']);
    $categoriaID = (int) trim($_POST['categoria']);
    $preco = (float) trim($_POST['preco']);
    $marcaID = (int) trim($_POST['marca']);
    try {
        $stmt = $conexao->prepare("INSERT INTO produtos (nome_produto, preco, categorias_id_categoria, marcas_id_marca) VALUES (:nome_produto, :preco, :categorias_id_categoria, :marcas_id_marca)");
        $stmt->bindValue(':nome_produto', $nomeProduto);
        $stmt->bindValue(':preco', $preco);
        $stmt->bindValue(':categorias_id_categoria', $categoriaID);
        $stmt->bindValue(':marcas_id_marca', $marcaID);
        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {
                header("Location: readProdutos.php?msg=Produto cadastrado com sucesso!");
                exit;
            } else {
                echo "Erro ao tentar efetivar cadastro";
            }
        } else {
            throw new PDOException("Erro: Não foi possível executar a declaração sql");
        }
    } catch (PDOException $erro) {
    echo "Erro: " . $erro->getMessage();
    }
}
?>