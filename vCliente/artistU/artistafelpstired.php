<div class="container-fluid mt-5 mb-5">

    <?php

    $idArt = 3;

    $infoArt = listarRegistrosInnerWhere('tbusuario.nome, tbvendedor.idvendedor, tbvendedor.totalCom, tbvendedor.totalAval, tbvendedor.mediaAval, tbvendedor.descVend, tbvendedor.fotoVend', 'tbusuario', 'tbvendedor', 'idusuario', 'tbvendedor', 'idvendedor', $idArt);

    if ($infoArt === false) {
        echo "
            <div class='alert alert-danger text-center' role='alert'>
                <h4>Não foi possível acessar o banco!</h4>
            </div>
        ";
    } else {
//        print_r($infoArt);
        foreach ($infoArt as $infoList) {
            $idVend = $infoList->idvendedor;
            $nome = $infoList->nome;
            $totalCom = $infoList->totalCom;
            $totalAval = $infoList->totalAval;
            $mediaAval = $infoList->mediaAval;
            $descArtista = $infoList->descVend;
            $fotoVend = $infoList->fotoVend;
        }
    }

    ?>

    <h2 class="text-p3 mb-3"><a href="#" class="linkMenu text-p3" idMenu="listarHome">Home</a> <span class="mdi mdi-chevron-right"></span> <a href="#" class="linkMenu text-p3" idMenu="listarArtists">Artistas</a> <span class="mdi mdi-chevron-right"></span> <span class="text-p2"><?php echo $nome; ?></span></h2>
    <div class="artistRow">

        <div class="artistCol">
            <img src="assets/img/artesArtista/<?php echo $fotoVend; ?>" alt="imagem_comissao">
        </div>

        <div id="infoArtist" class="text-p3 mb-5 artistCol">

            <br>
            <h3>Total de Comissões Pedidas: <span class="text-p4"><?php echo $totalCom; ?></span></h3>
            <h3>Total de Avaliações Recebidas: <span class="text-p4"><?php echo $totalAval; ?></span></h3>
            <h3>Média de Avaliações:
                <span class="text-warning">
                    <?php

                    for ($i = 0; $i < 5; $i++) {
                        if ($mediaAval < $i or ($i > ($mediaAval - 1))) {
                            echo "<span class='mdi mdi-star-outline'></span>";
                        } else {
                            echo "<span class='mdi mdi-star'></span>";
                        };
                    }

                    ?>
                </span>
                <span class="text-p4">
                    <?php echo $mediaAval; ?>
                </span>
            </h3>
            <h3>Descrição:</h3>
            <h3 class="text-p2"><?php echo $descArtista; ?></h3>

        </div>

    </div>


    <?php

    include_once './artesArt.php';
    include_once './comissao.php';

    ?>

</div>