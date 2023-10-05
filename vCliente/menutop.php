  <div id="navHome" class="container-fluid bg-p1">


    <div class="row m-3">

      <div class="col text-center text-white">

        <div class="row">

          <div class="col">
            <button type="button" id="btnMenu" class="btnMenu text-white">
              <span class="mdi mdi-menu float-left align-middle fw-bold"></span>
            </button>
          </div>

          <div class="col av">
            <a href="#" id="logoLink" idMenu="listarHome" class="text-white linkMenu">
              <img src="./assets/img/logo/logo.png" alt="vapocomlogo">
            </a>
          </div>

        </div>

      </div>

      <div class="col text-center text-white">
        <div class="input-group flex-nowrap testes pt-1">

          <input type="text" id="searchHome" class="border-end-0 text-p3" placeholder="Pesquisar..." aria-label="Username" aria-describedby="iconSearch">
          <button type="button" class="input-group-text border-start-0" id="iconSearch"><span class="mdi mdi-magnify text-p3"></span></button>

        </div>
      </div>

      <div class="col text-center text-white">
        <div id="cadLog" class="LogCad av">

          <?php

          if (isset($_SESSION['idUser'])) {

          ?>

            <button type="button" class="btn text-white fw-bold fs-5" onclick="deslogBtn();"><span class="mdi mdi-logout"></span> Sair
            </button>ﾠ|ﾠ
            <button type="button" class="btn text-white fw-bold fs-5 linkMenu" idMenu="listarCarrinho">Carrinho
                <span class="mdi mdi-cart-variant"></span></button>

          <?php

          } else {

          ?>
            <button type="button" class="btn text-white fw-bold fs-5" data-bs-toggle="modal" data-bs-target="#modalLogUser"><span class="mdi mdi-login"></span> Fazer Login
            </button>ﾠ|ﾠ
            <button type="button" class="btn text-white fw-bold fs-5" data-bs-toggle="modal" data-bs-target="#modalAddUser">Cadastrar <span class="mdi mdi-account-plus"></span></button>

          <?php

          }

          ?>

        </div>

        <?php

          if (isset($_SESSION['idUser'])) {

          ?>

        <div class="statusLog">

        <span class="mdi mdi-account"></span> Logado:ﾠ<?php echo $_SESSION['nomeUser']; ?>

        </div>

        <?php 
        
          }

        ?>

      </div>

    </div>


  </div>