<div class="container-fluid mt-5 mb-5">

    <?php

    $listar = listarRegistrosArte('Paulo Ventura', 'thwmoss');

    if ($listar == 'Vazio') {

        ?>

        <div class="alert alert-danger text-center" role="alert">Não há registros no banco!</div>

        <?php

    } else {

        foreach ($listar as $itemLista) {
            $idArte = $itemLista->idartesvend;
            $idVend = $itemLista->idvendedor;
            $nomeArt = $itemLista->nome;
            $img = $itemLista->imgarte;
            $titulo = $itemLista->titulo;
            $descArte = $itemLista->descricao;
            $valor = $itemLista->valor;
            $nCopias = $itemLista->copias;
        }
    }

    ?>

    <h2 class="text-p3 mb-3">
        <a href="#" class="linkMenu text-p3" idMenu="listarHome">
            Home
        </a>
        <span class="mdi mdi-chevron-right"></span>
        <a href="#" class="linkMenu text-p3" idMenu="listarArtist">
            Artes
        </a>
        <span class="mdi mdi-chevron-right"></span>
        <span class="text-p2"><?php echo $nomeArt; ?> - <?php echo $titulo; ?></span>
    </h2>

    <div class="artistRow">

        <div class="artistCol">
            <img src="assets/img/artesArtista/<?php echo $img; ?>" alt="imagem_comissao">
        </div>

        <div id="infoArtist" class="text-p3 artistCol">

            <br>
            <h2>Título:ﾠ<span class="text-p3"><?php echo $titulo; ?></span></h2>
            <h3>Artista:ﾠ<span><a href="#" class="linkMenu text-p3"
                                  idMenu="artista<?php echo $nomeArt; ?>"><?php echo $nomeArt; ?></a></span></h3>
            <h3>Descrição:</h3>
            <h3 class="text-p2"><?php echo $descArte; ?></h3>
            <h3>Cópias vendidas:ﾠ<span class="text-p4"><?php echo $nCopias; ?></span></h3>
            <h3>A partir de:ﾠR$
                <span class="text-p4">
                    <?php echo $valor; ?>,00
                </span>
            </h3>

            <div class="btnsCom">

                <button type="button" class="btn btn-p1" data-bs-toggle="modal" data-bs-target="#modalAddCompra">
                    <span class="mdi mdi-shopping"></span> Comprar Agora!
                </button>
                <button type="button" class="btn btn-p1" onclick="addCarrinho(<?php echo $idArte; ?>);">
                     Adicionar ao Carrinho <span class="mdi mdi-cart-variant"></span>
                </button>

            </div>

        </div>

    </div>


</div>

<div class="modal fade" id="modalAddCompra" tabindex="-1" role="dialog" aria-labelledby="modalAddCompra"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-p1 text-p3">
                <h3 class="modal-title" id="staticBackdropLabel"><span class="mdi mdi-plus"></span> Fazer Pedido</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form id="frmAddCompra" name="frmAddCompra" method="post" action="#">

                <div class="modal-body text-p3">

                    <div class="fazComRow row">
                        <div class="fazComCol col">
                            <label for="tipoPag">
                                Tipo de Pagamento:
                            </label><br>
                            <input type="radio" name="tipoPag" value="1" checked onclick="hideCard();"><span
                                    class="spanRadio">Pix</span>
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
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><span
                                class="mdi mdi-close"></span> Cancelar
                    </button>
                    <button type="submit" class="btn bg-p1 text-p3" onclick="addCompra();"><span
                                class="mdi mdi-account-plus"></span> Concluir Pedido
                    </button>
                </div>

        </div>

        </form>

    </div>
</div>
</div>