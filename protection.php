<?php
require_once 'functions.php';
require_once 'conexao.php';
if (!estaLogado()) {
    die("Você não está logado. Tente novamente <a href=\"index.php\">Faça login</a>");
    exit;
}
?>