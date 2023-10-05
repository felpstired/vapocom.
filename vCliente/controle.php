<?php

include_once './config/conexao.php';
include_once './config/constantes.php';
include_once './func/dashboard.php';
include_once './func/functions.php';


// $acao = $_POST['acao'];

$acao = filter_input(INPUT_POST, 'acao', FILTER_SANITIZE_STRING);

switch ($acao) {

        // sidebar
    case 'listarHome':
        include_once './home.php';
        $_SESSION['pages'] = $acao;
        break;

    case 'listarProd':
        include_once './pages/produtos.php';
        $_SESSION['pages'] = $acao;
        break;

    case 'listarArtes':
        include_once './artes.php';
        $_SESSION['pages'] = $acao;
        break;

    case 'listarArtists':
        include_once './artistas.php';
        $_SESSION['pages'] = $acao;
        break;

    case 'addCom':
        if (isset($_SESSION['idUser'])) {
            include_once './fazerComissao.php';
            $_SESSION['pages'] = $acao;
        } else {
            echo json_encode('Você não está logado!');
            die();
        }
        break;



    case 'listarCarrinho':
        if (isset($_SESSION['idUser'])) {
            $_SESSION['valorCart'] = 0;
            $_SESSION['pages'] = $acao;
            include_once './listarCarrinho.php';
        } else {
            echo json_encode('Você não está logado!');
            die();
        }
        break;

    case 'addCarrinho':
        if (isset($_SESSION['idUser'])) {
            $_SESSION['pages'] = $acao;
            include_once './pages/addCarrinho.php';
        } else {
            echo json_encode('Você não está logado!');
            die();
        }
        break;

    case 'excCarrinho':
        if (isset($_SESSION['idUser'])) {
            $_SESSION['pages'] = $acao;
            include_once './pages/excCarrinho.php';
        } else {
            echo json_encode('Você não está logado!');
            die();
        }
        break;



    case 'artistaZashye':
        include_once './artistU/artistaZashye.php';
        $_SESSION['pages'] = $acao;
        break;

    case 'artistajov':
        include_once './artistU/artistajov.php';
        $_SESSION['pages'] = $acao;
        break;

    case 'artistafelpstired':
        include_once './artistU/artistafelpstired.php';
        $_SESSION['pages'] = $acao;
        break;

    case 'artistathwmoss':
        include_once './artistU/artistathwmoss.php';
        $_SESSION['pages'] = $acao;
        break;



    case 'artZashyeOC':
        include_once './artesU/artZashyeOC.php';
        $_SESSION['pages'] = $acao;
        break;


    case 'artjovDio':
        include_once './artesU/artjovDio.php';
        $_SESSION['pages'] = $acao;
        break;
    case 'artjovHanako':
        include_once './artesU/artjovHanako.php';
        $_SESSION['pages'] = $acao;
        break;
    case 'artjovMiruko':
        include_once './artesU/artjovMiruko.php';
        $_SESSION['pages'] = $acao;
        break;


    case 'artfelpstiredFelps':
        include_once './artesU/artfelpstiredFelps.php';
        $_SESSION['pages'] = $acao;
        break;


    case 'artthwmossOC':
        include_once './artesU/artthwmossOC.php';
        $_SESSION['pages'] = $acao;
        break;

    case 'artthwmossfelps':
        include_once './artesU/artthwmossfelps.php';
        $_SESSION['pages'] = $acao;
        break;

    case 'artthwmossPaulo':
        include_once './artesU/artthwmossPaulo.php';
        $_SESSION['pages'] = $acao;
        break;


    case 'addUser':
        include_once './pages/addUser.php';
        break;


    case 'addCompra':
        if (isset($_SESSION['idUser'])) {
            include_once './pages/addCompra.php';
        } else {
            echo json_encode('Você não está logado!');
            die();
        }
        break;

    case 'addPedido':
        if (isset($_SESSION['idUser'])) {
            include_once './pages/addPedido.php';
        } else {
            echo json_encode('Você não está logado!');
            die();
        }
        break;


    case 'logUser':
        include_once './pages/logUser.php';
        break;

    case 'deslogUser':
        include_once './pages/deslogUser.php';
        break;

    case 'socorro2':
        include_once './fazerComissao.php';
        $_SESSION['pages'] = $acao;
        break;

}
