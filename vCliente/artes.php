<?php
?>

<div class="container-fluid mt-5 mb-5">

    <h2 class="text-p3 mb-3"><a href="#" class="linkMenu text-p3" idMenu="listarHome">Home</a> <span
                class="mdi mdi-chevron-right"></span> <span class="text-p2">Artes</span></h2>

    <?php

    $listar = listarRegistrosJoin2('tbusuario.nome, tbartesvend.idartesvend, tbartesvend.imgarte, tbartesvend.titulo, tbartesvend.descricao, tbartesvend.valor, tbartesvend.copias',
        'tbartesvend',
        'inner',
        'tbvendedor',
        'idvendedor',
        'inner',
        'tbusuario',
        'idusuario');

    if ($listar == 'Vazio') {

        ?>

        <div class="alert alert-danger text-center" role="alert">Não há registros no banco!</div>

        <?php

    } else {

    ?>

    <div class="row mt-4">

        <?php

        $count = 0;
        foreach ($listar

        as $itemLista) {
        $idArte = $itemLista->idartesvend;
        $nomeArt = $itemLista->nome;
        $img = $itemLista->imgarte;
        $titulo = $itemLista->titulo;
        $descArt = $itemLista->descricao;
        $valor = $itemLista->valor;
        $copias = $itemLista->copias;

        $tituloC = explode(' ', trim($titulo))[0];

        ?>

        <div class="col">
            <div class="imgProd">
                <a href="#" class="linkMenu"
                   idMenu="art<?php echo $nomeArt . $tituloC; ?>">
                    <img src="./assets/img/artesArtista/<?php echo $img; ?>"
                         alt="artistImg">
                </a>
            </div>
            <div class="detailsProd">
                <div class="tituloProd text-p3">
                    <p>
                        <a href="#" class="linkMenu"
                           idMenu="art<?php echo $nomeArt . $tituloC; ?>"><?php echo $titulo; ?></a>
                    </p>

                    <p class="text-end">
                        <a href="#" class="linkMenu"
                           idMenu="artista<?php echo $nomeArt; ?>"><?php echo $nomeArt; ?></a>
                    </p>

                </div>

                <div class="tituloProd text-p3">
                    <p>Total de Cópias: <span
                                class="text-p4"><?php echo $copias; ?></span></p>
                </div>

                <div class="descProd text-p2 fs-5 text-center">
                    <p><?php echo $descArt; ?> </p>
                </div>

                <div class="tituloProd text-p3">
                    <p>Por Apenas: </p>
                    <p class="text-end">R$ <span class="text-p4"><?php echo $valor; ?>,00</span></p>
                </div>

                <div class="tituloProd text-p3">
                    <button type="button" class="btn btn-p1" id="btnAddCart" onclick="addCarrinho(<?php echo $idArte; ?>);"><span class="mdi mdi-account-plus"></span> Adicionar ao Carrinho</button>
                </div>

            </div>
        </div>

        <?php

        if ($count == 3) {

        ?>

    </div>
    <div class="row mt-4">

        <?php

        }


        $count++;
        }

        }

        ?>

    </div>
</div>

