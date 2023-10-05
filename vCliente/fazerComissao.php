<div class="fazComCont text-p3">



<h2 class="mt-5 mb-3 text-p3">Home <span class="mdi mdi-chevron-right"></span> Artistas <span class="mdi mdi-chevron-right"></span> Zashye <span class="mdi mdi-chevron-right"></span> Fazer Comissão</h2>

    <div class="fazCom">
        <div class="row">
            <div class="col">a</div>
            <div class="col-6">a</div>
            <div class="col">a</div>
        </div>
    </div>

    <div class="fazCom">
        <form>
            <div class="fazComRow">
                <div class="fazComCol">
                    <label for="tipoCom"><h3>Tipo de Comissão: </h3></label>

                    <select name="tipoComm" id="tipoComm" required>
                        <option value="0">Cabeça</option>
                        <option value="1">Busto</option>
                        <option value="2">Corpo</option>
                        <option value="3">Cenário</option>
                        <option value="4">Cenário + Corpo</option>
                    </select>

                </div>
                <div class="fazComCol">
                    <label for="tipoPag"><h3>Tipo de Pagamento: </h3></label>
                    <input type="radio" name="tipoPag" value="1" checked onclick="hideCard();"><span class="spanRadio">Pix</span>
                    <input type="radio" name="tipoPag" value="2" onclick="showCard();"><span class="spanRadio">Débito</span>
                    <input type="radio" name="tipoPag" value="3" onclick="showCard();"><span class="spanRadio">Crédito</span>
                    <input type="radio" name="tipoPag" value="4" onclick="hideCard();"><span class="spanRadio">Boleto</span>
                </div>
            </div>
            <div class="fazComCard" id="fazComCard">
                <div class="fazComRow">
                    <div class="fazComCol2">
                        <label for="numCard"><h3>Número do Cartão: </h3></label>
                        <input type="text" name="numCard" id="numCard">
                    </div>
                    <div class="fazComCol2">
                        <label for="numCardT"><h3>Número de Segurança: </h3></label>
                        <input type="text" name="numCardT" id="numCardT">
                    </div>
                    <div class="fazComCol2">
                        <label for="vencimento"><h3>Vencimento: </h3></label>
                        <input type="text" name="vencimento" id="vencimento">
                    </div>
                </div>
            </div>
            <div class="">
                <label for="descProd"><h3>Descrição: </h3></label>
                <textarea name="descProd" id="descProd" placeholder="Descreva seu pedido..." rows="6" required></textarea>
            </div>

            <div class="fazComRow">

                <div class="fazComCol">
                    <h2>Valor Total = R$ <span id="showValue" class="text-p4"></span>.00</h2>
                </div>
                <div class="fazComCol">
                    <button type="submit" id="fazComBtn" name="fazComBtn">Fazer Pedido</button>
                </div>

            </div>


        </form>
    </div>

</div>