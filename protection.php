<?php
require_once 'functions.php';
require_once 'conexao.php';
if (!estaLogado()) {
    header("Location: index.php");
    exit;
}
?>