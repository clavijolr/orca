
<div  class="modal modal-slide-in fade" id="div_cadastro_conta">
    <div class="modal-dialog">
        <form   class=" modal-content pt-0" name="gravarContaForm" id="gravarContaForm"  >
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
            <div class="modal-header mb-1">
                <h5 class="modal-title" id="tituloModalConta">Nova Conta</h5>
            </div>
            <div class="modal-body flex-grow-1 ">
                <div class="form-group d-none">
                    <input type="text"
                        id="conta_id"
                        name="conta_id"
                    />
                </div>
                <div class="form-group">
                    <label class="form-label" for="descricao">Descrição da Conta</label>
                    <input type="text"
                        class="form-control "
                        id="conta_descricao"
                        name="descricao"
                        placeholder="Digite a conta "
                        aria-label="Descrição"
                        aria-describedby="Descrição da conta"
                        autocomplete="off"
                        required
                        maxlength="35"
                    />
                </div>
                <div class="form-group">
                    <label class="form-label" for="agencia">Agência</label>
                    <input type="text"
                        id="agencia"
                        name="agencia"
                        class="form-control "
                        placeholder="1693"
                        aria-label="1572"
                        aria-describedby="Numero da agência da conta"
                        autocomplete="off"
                        maxlength="4"
                    />
                </div>

                <div class="form-group">
                    <label class="form-label" for="conta">Conta</label>
                    <input type="text"
                        id="conta"
                        name="conta"
                        class="form-control dt-uname"
                        placeholder="Numero da conta"
                        aria-label="15757-1"
                        autocomplete="off"
                        maxlength="10"
                    />
                </div>

                <div class="form-group">
                    <label class="form-label" for="saldo">Saldo</label>
                    <input type="currency"
                        id="conta_saldo"
                        name="conta_saldo"
                        class="form-control"
                        placeholder="Saldo inicial da conta"
                        autocomplete="off"
                        aria-describedby="Saldo da conta"
                        required
                        maxlength="10"
                        onkeypress='return filtroTeclas(event)'
                    />
                </div>

                <hr>
                <button type="submit" class="btn btn-primary mr-1 data-submit" name="btn_criar_atualizar_conta" id="btn_criar_atualizar_conta"  >
                    Atualizar
                </button>
                <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">
                    Cancelar
                </button>
            </div>
        </form>
    </div>
</div>
