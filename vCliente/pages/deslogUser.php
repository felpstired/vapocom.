<?php 

include_once './config/constantes.php';
include_once './config/conexao.php';
include_once './func/dashboard.php';

unset($_SESSION['idUser']);

echo json_encode('OK');

?>