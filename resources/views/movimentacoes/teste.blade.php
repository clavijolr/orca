<div class="customizer d-none d-md-block">

    <a class="customizer-toggle d-flex align-items-center justify-content-center" href="javascript:void(0);">
        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"  class="feather feather-settings "><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
    </a>

    <div class="customizer-content ps">
    <!-- Customizer header -->
    <div class="customizer-header px-2 pt-1 pb-0 position-relative">
        <h4 class="mb-0">Tranferencia entre contas</h4>
        <a class="customizer-close" href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></a>
    </div>
    <hr>
            <div class="modal-body flex-grow-1 ">
                <div class="form-group d-none">
                    <input type="text"
                        id="tansferencia_id"
                        name="tansferencia_id"
                    />
                </div>
                    <div class="form-group ">
                        <label for="mv_conta_id">Conta Origem</label>
                        <div class="input-group">
                            <select class="form-control "
                                name="mv_conta_origem"
                                id="mv_conta_origem"
                                tabindex="4"
                                required>
                                <option value="" selected disabled hidden>Escolha a conta de origem</option>
                            </select>
                            <div class="input-group-append">
                                <button class="btn btn-sm btn-secondary" name="btn_conta" id="btn_conta" type="button">+</button>
                            </div>
                        </div>
                    </div>


                <div class="form-group">
                    <label class="form-label" for="mv_tranferencia">Valor a transferir</label>
                    <input type="currency"
                        id="mv_tranferencia"
                        name="mv_tranferencia"
                        class="form-control"
                        placeholder="Valor a transferir"
                        autocomplete="off"
                        aria-describedby="Valor a transferir"
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


    <!-- Menu -->
    <div class="customizer-menu px-2">
        <div id="customizer-menu-collapsible" class="d-flex">
        <p class="font-weight-bold mr-auto m-0">Menu Collapsed</p>
        <div class="custom-control custom-control-primary custom-switch">
        <input type="checkbox" class="custom-control-input" id="collapse-sidebar-switch">
        <label class="custom-control-label" for="collapse-sidebar-switch"></label>
        </div>
        </div>
        </div>

    </div>

</div>