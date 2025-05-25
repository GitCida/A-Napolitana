<?php
global $conexao;
try {
    $conexao = new PDO("mysql:host=localhost;dbname=anapolitana;charset=utf8mb4",
"root", ""); 
    $conexao->SetAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $erro) {
    echo "Erro na conexão: " . $erro->getMessage();
}

