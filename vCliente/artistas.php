<?php


?>

<div class="container-fluid mt-5 mb-5">

    <h2 class="text-p3 mb-3"><a href="#" class="linkMenu text-p3" idMenu="listarHome">Home</a> <span class="mdi mdi-chevron-right"></span> <span class="text-p2">Artistas</span></h2>

    <div class="row mt-4">

        <?php

        for ($i = 1; $i <= 4; $i++) {

            $listar = listarRegistrosU('totalCom, fotoVend, descVend', 'tbvendedor', 'idvendedor', $i);

            if ($listar == 'Vazio') {

                ?>

                <div class="alert alert-danger text-center" role="alert">Não há registros no banco!</div>

                <?php

            } else {

                foreach ($listar as $itemLista) {
                    $totalCom = $itemLista->totalCom;
                    $img = $itemLista->fotoVend;
                    $descricao = $itemLista->descVend;

                    $listar2 = listarRegistrosInnerWhere('nome', 'tbusuario', 'tbvendedor', 'idusuario', 'tbvendedor', 'idvendedor', $i);

                    if ($listar == 'Vazio') {

                        ?>

                        <div class="alert alert-danger text-center" role="alert">Não há registros no banco!
                        </div>

                        <?php

                    } else {

                        foreach ($listar2 as $itemLista2) {
                            $artista = $itemLista2->nome;


                            ?>

                            <div class="col">
                                <div class="imgProd">
                                    <a href="#" class="linkMenu"
                                       idMenu="artista<?php echo $artista; ?>">
                                        <img src="./assets/img/artesArtista/<?php echo $img; ?>"
                                             alt="artistImg">
                                    </a>
                                </div>
                                <div class="detailsProd">
                                    <div class="tituloProd text-p3">
                                        <p class="text-center">
                                            <a href="#" class="linkMenu"
                                               idMenu="artista<?php echo $artista; ?>"><?php echo $artista; ?></a>
                                        </p>

                                    </div>

                                    <div class="tituloProd text-p3">
                                        <p>Total de Comissões: <span
                                                    class="text-p4"><?php echo $totalCom; ?></span></p>
                                    </div>

                                    <div class="descProd text-p2 fs-5 text-center">
                                        <p><?php echo $descricao; ?> </p>
                                    </div>

                                </div>
                            </div>

                            <?php

                        }
                    }
                }
            }
        }

        ?>

    </div>
</div>


