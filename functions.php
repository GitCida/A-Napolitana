<?php
function estaLogado() {
    if(!isset($_SESSION)) {
    session_start();
}
    return isset($_SESSION['id_usuario']);
}
?>