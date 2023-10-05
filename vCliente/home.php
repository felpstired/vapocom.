<div class="container-fluid mt-5 mb-5">

    <div id="carouselBanner" class="carousel slide" data-bs-ride="false">


        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselBanner" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselBanner" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselBanner" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>


        <div class="carousel-inner">

            <div class="carousel-item active">
                <img src="./assets/img/banner/1.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="./assets/img/banner/2.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="./assets/img/banner/3.png" class="d-block w-100" alt="...">
            </div>
        </div>


        <button class="carousel-control-prev" type="button" data-bs-target="#carouselBanner" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>


        <button class="carousel-control-next" type="button" data-bs-target="#carouselBanner" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>


    </div>


    <div class="prods mt-5">

        <h2 class="text-p3 text-center">MAIS RECENTES</h2>

        <div class="row mt-4">

            <?php

            $listar = listarGeral('idartesvend, idvendedor, imgarte, titulo, descricao, valor','tbartesvend');

            if ($listar == 'Vazio') {

                ?>

                <div class="alert alert-danger text-center" role="alert">Não há registros no banco!</div>

                <?php

            } else {

                $count = 0;
                foreach ($listar as $itemLista) {

                    if ($count < 3) {

                    $idArte = $itemLista->idartesvend;
                    $idV = $itemLista->idvendedor;
                    $img = $itemLista->imgarte;
                    $titulo = $itemLista->titulo;
                    $descricao = $itemLista->descricao;
                    $valor = $itemLista->valor;

                    $tituloC = explode(' ',trim($titulo))[0];

                    $listar2 = listarRegistrosInnerWhere('nome', 'tbusuario', 'tbvendedor', 'idusuario', 'tbvendedor', 'idvendedor', $idV);

                    if ($listar == 'Vazio') {

                        ?>

                        <div class="alert alert-danger text-center" role="alert">Não há registros no banco!</div>

                        <?php

                    } else {

                        foreach ($listar2 as $itemLista2) {
                            $artista = $itemLista2->nome;


            ?>

            <div class="col">
                <div class="imgProd">
                    <a href="#" class="linkMenu" idMenu="art<?php echo $artista . $tituloC; ?>">
                    <img src="./assets/img/artesArtista/<?php echo $img; ?>" alt="prodImg">
                    </a>
                </div>
                <div class="detailsProd">
                    <div class="tituloProd text-p3">
                        <p>
                            <a href="#" class="linkMenu" idMenu="art<?php echo $artista . $tituloC; ?>"><?php echo $titulo; ?></a>
                        </p>

                        <p class="text-end">
                            <a href="#" class="linkMenu" idMenu="artista<?php echo $artista; ?>"><?php echo $artista; ?></a>
                        </p>

                    </div>
                    <div class="descProd text-p2 fs-5">
                        <p><?php echo $descricao; ?> </p>
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

                            $count++;

                        }

                    }

                    }
                }
            }

            ?>

        </div>

    </div>


</div>