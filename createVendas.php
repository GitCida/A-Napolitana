<?php
include_once 'protection.php';
include_once 'conexao.php';
if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "save" && !empty($_POST["nomeProduto"]) && !empty($_POST["quantidade"]) && !empty($_POST["pagamento"]) && !empty($_POST["valorTotal"])) {
    $nomeProdutoID = (int) trim($_POST['nomeProduto']);
    $quantidade = (int) trim($_POST['quantidade']);
    $pagamentoID = (int) trim($_POST['pagamento']);
    $valorTotal = trim($_POST['valorTotal']);
    try {
        $stmt = $conexao->prepare("INSERT INTO vendas (produtos_id_produto, quantidade_venda, formaPagamento_id_formaPagamento, valor_venda) VALUES (:id_produto, :quantidade, :id_formaPagamento, :valorTotal)");
        $stmt->bindValue(':id_produto', $nomeProdutoID);
        $stmt->bindValue(':quantidade', $quantidade);
        $stmt->bindValue(':id_formaPagamento', $pagamentoID);
        $stmt->bindValue(':valorTotal', $valorTotal);
        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {
                header("Location: readVendas.php?msg=Venda registrada com sucesso!");
                exit;
            } else {
                echo "Erro ao tentar efetivar registro";
            }
        } else {
            throw new PDOException("Erro: Não foi possível executar a declaração sql");
        }
    } catch (PDOException $erro) {
    echo "Erro: " . $erro->getMessage();
    }
}
?>