
<div class="card">
    <div class="modal modal-slide-in  fade" id="create_modals-slide-in">
        <div class="modal-dialog">
            <form   class=" modal-content pt-0" wire:submit.prevent="store"  >
                <button type="button" class="close" data-dismiss="modal"
                aria-label="Close">×</button>
                <div class="modal-header mb-1">
                    <h5 class="modal-title" id="contasModalLabel">Nova Conta</h5>
                </div>
                <div class="modal-body flex-grow-1">
                    <div class="form-group">
                        <label class="form-label" for="descricao">Descrição da Conta</label>
                        <input type="text" 
                            class="form-control dt-full-name"
                            id="descricao" 
                            name="descricao" 
                            wire:model.defer="descricao"
                            placeholder="Banco Itau"
                            aria-label="Descrição"
                            aria-describedby="Descrição da conta" 
                            maxlength="30"
                            aria-required="true" 
                            required
                        />
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="agencia">Agencia</label>
                        <input type="text" 
                            id="agencia"
                            name="agencia" 
                            wire:model.defer="agencia" 
                            class="form-control " 
                            placeholder="1693"
                            aria-label="1572"
                            aria-describedby="Numero da agencia da conta"
                            maxlength="4"
                        />
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="conta">Conta</label>
                        <input type="text" 
                            id="conta" 
                            name="conta"
                            wire:model.defer="conta"
                            class="form-control dt-uname" 
                            placeholder="Numero da conta"
                            aria-label="15757-1" 
                            aria-describedby="Numero da conta"
                            maxlength="10"
                        />
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="saldo">Saldo</label>
                        <input type="currency"
                            id="saldo"
                            name="saldo"
                            wire:model.defer="saldo"
                            class="form-control dt-uname" 
                            placeholder="Saldo inicial da conta"
                            aria-label="501,20" 
                            autocomplete="off"
                            aria-describedby="Valor da conta"
                            onkeypress='return filtroTeclas(event)'
                        />

                    </div>
                    <hr>
                    <button type="submit" class="btn btn-primary mr-1 data-submit"  >
                        Cadastrar
                    </button>
                    <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">
                        Cancelar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


<div  class="modal modal-slide-in  fade" id="update_modals-slide-in">
    <div class="modal-dialog">
        <form   class=" modal-content pt-0" name="updateForm" id="updateForm"  >
            <button type="button" class="close" data-dismiss="modal"
            aria-label="Close">×</button>
            <div class="modal-header mb-1">
                <h5 class="modal-title" id="contasModalLabel">Atualiza Conta</h5>
            </div>
            <div class="modal-body flex-grow-1 ">
                <div class="form-group d-none">
                    <label class="form-label" for="descricao" aria-required="true" >conta_id</label>
                    <input type="text" 
                        class="form-control dt-full-name"
                        id="updateconta_id" 
                        name="updateconta_id" 
                    />
                </div>
                <div class="form-group">
                    <label class="form-label" for="descricao">Descrição da Conta</label>
                    <input type="text" 
                        class="form-control dt-full-name"
                        id="updatedescricao" 
                        name="updatedescricao" 
                        placeholder="Digite a conta  "
                        aria-label="Descrição"
                        aria-describedby="Descrição da conta" 
                        maxlength="30" 
                    />
                </div>
                <div class="form-group">
                    <label class="form-label" for="agencia">Agencia</label>
                    <input type="text" 
                        id="updateagencia"
                        name="updateagencia" 
                        class="form-control " 
                        placeholder="1693"
                        aria-label="1572"
                        aria-describedby="Numero da agencia da conta"
                        maxlength="4"
                    />
                </div>

                <div class="form-group">
                    <label class="form-label" for="conta">Conta</label>
                    <input type="text" 
                        id="updateconta" 
                        name="updateconta"
                        class="form-control dt-uname" 
                        placeholder="Numero da conta"
                        aria-label="15757-1" 
                        aria-describedby="Numero da conta"
                        maxlength="10"
                    />
                </div>

                <div class="form-group">
                    <label class="form-label" for="saldo">Saldo</label>
                    <input type="currency"
                        id="updatesaldo"
                        name="updatesaldo"
                        class="form-control dt-uname" 
                        placeholder="Saldo inicial da conta"
                        aria-label="501,20" 
                        autocomplete="off"
                        aria-describedby="Valor da conta"
                        onkeypress='return filtroTeclas(event)'
                    />
                </div>
                <hr>
                <button type="submit" class="btn btn-primary mr-1 data-submit"  >
                    Atualizar
                </button>

                <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">
                    Cancelar
                </button>
            </div>
        </form>
    </div>
</div>

 