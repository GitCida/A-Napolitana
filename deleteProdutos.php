<?php
include 'protection.php';
include 'conexao.php';

if (isset($_GET['id'])) {
    $idProduto = (int) $_GET['id'];

    try {
        $stmt = $conexao->prepare("DELETE FROM produtos WHERE id_produto = :id");
        $stmt->bindValue(':id', $idProduto);

        if ($stmt->execute()) {
            header("Location: readProdutos.php?msg=Produto excluído com sucesso!");
            exit;
        } else {
            echo "Erro ao tentar excluir o produto.";
        }
    } catch (PDOException $erro) {
        echo "Erro: " . $erro->getMessage();
    }
} else {
    echo "ID do produto não informado!";
}
?>
