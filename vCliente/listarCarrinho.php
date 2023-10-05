<div class="carrinho container-fluid mt-5 mb-5">

    <h2 class="text-p3 mb-3">
        <span class="mdi mdi-cart-variant"></span> Carrinho
    </h2>

    <?php

    // print_r($_SESSION['idUser']);

    $listar = listarCarrinho($_SESSION['idUser']);

    // var_dump($listar);

    if ($listar == 'Vazio') {

    ?>

        <div class="alert alert-danger text-center" role="alert">Não há produtos no carrinho!</div>

    <?php

    } else {

    ?>

        <div class="carrinho-inner">

            <table class="table table-hover">

                <tbody>

                    <?php

                    $totalValor = 0;
                    $count = 0;

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
                            <td width="5%"><button type="button" class="btnExc" onclick="excCarrinho(<?php echo $idcart;?>, <?php echo $qtdd;?>);"><span class="mdi mdi-close"></span></button></td>
                        </tr>


                <?php

                        $totalValor = $totalValor + $valor;

                    }


                ?>
                </tbody>

            </table>

            <div class="valorCarrinho text-p3">

                <h3>
                    Valor Total do Pedido: R$ <span class="text-p4"><?php echo $totalValor; ?>,00</span>
                </h3>

            </div>

        </div>

    <?php

    }

    ?>

</div>