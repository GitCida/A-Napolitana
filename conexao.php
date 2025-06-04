<?php
try {
    $conexao = new PDO("mysql:host=localhost;dbname=dbanapolitana;charset=utf8mb4",
"root", ""); 
    $conexao->SetAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $erro) {
    echo "Erro na conexão: " . $erro->getMessage();
}