<?php

$acao = filter_input(INPUT_POST, 'acao', FILTER_SANITIZE_STRING);

switch ($acao) {

        // ações da parte de usuarios 
    case 'addCliente':
        include_once './usuario/addCliente.php';
        break;
    case 'listarCliente':
        include_once './usuario/listarCliente.php';
        break;
    case 'ativarCliente':
        include_once './usuario/ativarCliente.php';
        break;
    case 'excCliente':
        include_once './usuario/excCliente.php';
        break;
    case 'dataCliente':
        include_once './usuario/dataCliente.php';
        break;
    case 'altCliente':
        include_once './usuario/altCliente.php';
        break;


        // ações da parte de vendedores/artistas
    case 'ativarVendedor':
        include_once './vendedor/ativarProduto.php';
        break;
    case 'addVendedor':
        include_once './vendedor/addProduto.php';
        break;
    case 'excVendedor':
        include_once './vendedor/excProduto.php';
        break;
    case 'listarVendedor':
        include_once './vendedor/listarProduto.php';
        break;
    case 'dataVendedor':
        include_once './vendedor/dataProduto.php';
        break;
    case 'altVendedor':
        include_once './vendedor/altProduto.php';
        break;


        // ações da parte de pagamento
    case 'ativarPag':
        include_once './pagamento/ativarPag.php';
        break;
    case 'addPag':
        include_once './pagamento/addPag.php';
        break;
    case 'excPag':
        include_once './pagamento/excPag.php';
        break;
    case 'listarPag':
        include_once './pagamento/listarPag.php';
        break;
    case 'dataPag':
        include_once './pagamento/dataPag.php';
        break;
    case 'altPag':
        include_once './pagamento/altPag.php';
        break;


        // ações da parte de tipo de pagamento
    case 'ativarTipoPag':
        include_once './tipoPag/ativarTipoPag.php';
        break;
    case 'addTipoPag':
        include_once './tipoPag/addTipoPag.php';
        break;
    case 'excTipoPag':
        include_once './tipoPag/excTipoPag.php';
        break;
    case 'listarTipoPag':
        include_once './tipoPag/listarTipoPag.php';
        break;
    case 'dataTipoPag':
        include_once './tipoPag/dataTipoPag.php';
        break;
    case 'altTipoPag':
        include_once './tipoPag/altTipoPag.php';
        break;


        // ações da parte de tipo de pagamento
    case 'ativarArtes':
        include_once './Artes/ativarArtes.php';
        break;
    case 'addArtes':
        include_once './Artes/addArtes.php';
        break;
    case 'excArtes':
        include_once './Artes/excArtes.php';
        break;
    case 'listarArtes':
        include_once './Artes/listarArtes.php';
        break;
    case 'dataArtes':
        include_once './Artes/dataArtes.php';
        break;
    case 'altArtes':
        include_once './Artes/altArtes.php';
        break;


        // ações da parte de tipo de pagamento
    case 'ativarPedidos':
        include_once './Pedidos/ativarPedidos.php';
        break;
    case 'addPedidos':
        include_once './Pedidos/addPedidos.php';
        break;
    case 'excPedidos':
        include_once './Pedidos/excPedidos.php';
        break;
    case 'listarPedidos':
        include_once './Pedidos/listarPedidos.php';
        break;
    case 'dataPedidos':
        include_once './Pedidos/dataPedidos.php';
        break;
    case 'altPedidos':
        include_once './Pedidos/altPedidos.php';
        break;

}
