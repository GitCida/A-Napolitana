<?php
function estaLogado() {
    return isset($_SESSION['id_usuario']);
}
?>