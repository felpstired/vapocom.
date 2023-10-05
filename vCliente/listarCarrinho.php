<div class="carrinho row gap-3 container-fluid mt-5 mb-5">

    <h2 class="text-p3 mb-3">
        <span class="mdi mdi-cart-variant"></span> Carrinho de <?php echo $_SESSION['nomeUser']; ?>
    </h2>

    <?php

    // print_r($_SESSION['idUser']);

    $_SESSION['itensCart'] = 0;
    $listar = listarCarrinho($_SESSION['idUser']);

    // var_dump($listar);

    if ($listar == 'Vazio') {

    ?>

        <div class="alert alert-danger text-center" role="alert">Não há produtos no carrinho!</div>

    <?php

    } else {

    ?>

        <div class="carrinho-inner col-9">

            <h3 class="text-p3 mb-3">
                Todos os Itens
            </h3>

            <table class="table table-hover">

                <tbody>

                    <?php

                    $_SESSION['$totalValor'] = 0;

                    foreach ($listar as $itemLista) {

                        $idcart = $itemLista->idcarrinho;
                        $idArte = $itemLista->idartesvend;
                        $nomeArt = $itemLista->nome;
                        $img = $itemLista->imgarte;
                        $titulo = $itemLista->titulo;
                        $descArte = $itemLista->descricao;
                        $valor = $itemLista->valor;
                        $qtdd = $itemLista->qtdd;

                        $valor = $valor * $qtdd;

                    ?>



                        <tr class="text-center">
                            <th width="5%" scope="row"><?php echo $qtdd; ?></th>
                            <td width="15%" class="imgArtista"><img src="./assets/img/artesArtista/<?php echo $img; ?>" alt=""></td>
                            <td width="20"><?php echo $titulo; ?></td>
                            <td width="50%"><?php echo $descArte; ?></td>
                            <td width="10%">R$ <?php echo $valor; ?>,00</td>
                            <td width="5%"><button type="button" class="btnExc" onclick="excCarrinho(<?php echo $idcart; ?>, <?php echo $qtdd; ?>);"><span class="mdi mdi-close"></span></button></td>
                        </tr>


                    <?php

                        $_SESSION['$totalValor'] = $_SESSION['$totalValor'] + $valor;

                        $_SESSION['itensCart'] = $_SESSION['itensCart'] + $qtdd;
                    }


                    ?>
                </tbody>

            </table>

        </div>


        <div class="carrinho-inner col">
            <div class="card">
                <div class="card-header bg-p1 text-p3">
                    <h3>Resumo do Pedido</h3>
                </div>
                <div class="card-body text-p3">
                    <h4 class="card-title">Valor Total do Pedido: R$ <span class="text-p4"><?php echo $_SESSION['$totalValor']; ?>,00</span></h4>
                    <h4 class="card-text">Total de Produtos: <span class="text-p4"><?php echo $_SESSION['itensCart']; ?></span></h4>
                    <button type="button" class="btn btn-p1" data-bs-toggle="modal" data-bs-target="#modalFinalizarPedido">Finalizar Compra <span class="mdi mdi-check"></span></button>
                </div>
            </div>

            <div class="card">
                <div class="card-header bg-p1 text-p3">
                    <h3>Métodos de Pagamento</h3>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col"><img src="https://img.ltwebstatic.com/images3_pi/2021/08/10/16285753252c1e710a326167c3218f7485c76887a8.webp" alt=""></div>
                        <div class="col"><img src="https://img.ltwebstatic.com/images2_pi/2018/06/06/15282732803587566708.webp" alt=""></div>
                        <div class="col"><img src="//img.ltwebstatic.com/images3_pi/2021/03/09/161528368123dd7a35ad8708b0dfc74b3630526891.webp" alt=""></div>
                        <div class="col"><img src="//img.ltwebstatic.com/images2_pi/2018/06/06/15282732983375743706.webp" alt=""></div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col"><img src="//img.ltwebstatic.com/images2_pi/2018/11/14/1542165929465511500.webp" alt=""></div>
                        <div class="col"><img src="//img.ltwebstatic.com/images2_pi/2018/08/15/1534311470399498284.webp" alt=""></div>
                        <div class="col"><img src="//img.ltwebstatic.com/images3_pi/2021/08/16/1629098490065621dbfe5a3e1fc57f1e654a60f4a0.webp" alt=""></div>
                        <div class="col"><img src="https://img.ltwebstatic.com/images2_pi/2018/11/14/15421659553667383771.webp" alt=""></div>

                    </div>

                </div>
            </div>
        </div>

    <?php

    }

    ?>

</div>

<div class="modal fade" id="modalFinalizarPedido" tabindex="-1" role="dialog" aria-labelledby="modalFinalizarPedido" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-p1 text-p3">
                <h3 class="modal-title" id="staticBackdropLabel"><span class="mdi mdi-plus"></span> Fazer Pedido</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form id="frmAddPedido" name="frmAddPedido" method="post" action="#">

                <div class="modal-body text-p3">

                    <div class="fazComRow row">
                        <div class="fazComCol col">
                            <label for="tipoPag">
                                Tipo de Pagamento:
                            </label><br>
                            <input type="radio" name="tipoPag" value="1" checked onclick="hideCard();"><span class="spanRadio">Pix</span>
                            <input type="radio" name="tipoPag" value="2" onclick="showCard();"><span class="spanRadio">Débito</span>
                            <input type="radio" name="tipoPag" value="3" onclick="showCard();"><span class="spanRadio">Crédito</span>
                            <input type="radio" name="tipoPag" value="4" onclick="hideCard();"><span class="spanRadio">Boleto</span>
                        </div>
                    </div>

                    <div class="fazComCard" id="fazComCard">
                        <div class="fazComRow">
                            <div class="fazComCol2">
                                <label for="numCard">
                                    Número do Cartão:
                                </label>
                                <input type="text" name="numCard" id="numCard">
                            </div>
                            <div class="fazComCol2">
                                <label for="numCardT">
                                    Número de Segurança:
                                </label>
                                <input type="text" name="numCardT" id="numCardT">
                            </div>
                            <div class="fazComCol2">
                                <label for="vencimento">
                                    Vencimento:
                                </label>
                                <input type="text" name="vencimento" id="vencimento">
                            </div>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><span class="mdi mdi-close"></span> Cancelar
                    </button>
                    <button type="submit" class="btn bg-p1 text-p3" onclick="addPedidoCart();"><span class="mdi mdi-account-plus"></span> Concluir Pedido
                    </button>
                </div>

        </div>

        </form>

    </div>
</div>