<?php 

include_once './config/constantes.php';
include_once './config/conexao.php';
include_once './func/dashboard.php';

unset($_SESSION['idUser']);

if ($_SESSION['pages'] == 'listarCarrinho') {
    echo json_encode('OKCart');
    die();
} else {
    echo json_encode('OK');
    die();
}

?>