
<div  class="modal modal-slide-in fade" id="div_cadastro_empresa">
    <div class="modal-dialog">
        <form   class=" modal-content pt-0" name="gravarEmpresaForm" id="gravarEmpresaForm"  >
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
            <div class="modal-header mb-1">
                <h5 class="modal-title" id="tituloModalEmpresa">Atualiza Entidade</h5>
            </div>
            <div class="modal-body flex-grow-1 ">
                <div class="form-group d-none">
                    <input type="text"
                        id="empresa_id"
                        name="empresa_id"
                        hidden
                    />
                </div>
                <div class="form-group">
                    <label class="form-label" for="descricao">Nome da Entidade</label>
                    <input type="text"
                        class="form-control "
                        id="empresa"
                        name="empresa"
                        placeholder="Digite o nome da entidade"
                        aria-label="Entidade"
                        aria-describedby="Nome da entidade"
                        maxlength="30"
                        autocomplete="off"
                        required
                    />
                </div>
                <div class="form-group">
                    <label class="form-label" for="agencia">CNPJ ou CPF</label>
                    <input type="text"
                        id="cpfcnpj"
                        name="cpfcnpj"
                        class="form-control "
                        placeholder="Digite somente número"
                        aria-label="1572"
                        minlength="11"
                        maxlength="14"
                        autocomplete="off"
                        onkeypress='return filtroTeclaDocumento(event)'
                        required
                    />
                </div>
                <hr>       
                <div class="form-group">
                    <label for="empresa_tipo_pessoa">Escolha a clasificação da entidade</label>
                    <select class="form-control"
                            name='empresa_tipo_pessoa'
                            id="empresa_tipo_pessoa"
                            required
                            >
                        <option value="" selected disabled hidden>Escolha uma clasificação</option>
                        <option value='F'> Física</option>
                        <option value='J'> Jurídica</option>
                        {{-- <option value='A'> Física e Jurídica</option> --}}
                    </select>
                </div>
                <div class="form-group">
                    <div class="d-flex justify-content-between py-1">
                        <label class="invoice-terms-title mb-0" for="clientNotes">Cadastro detalhado</label>
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="empreiteira" name="empreiteira" />
                            <label class="custom-control-label" for="empreiteira"></label>
                        </div>
                    </div>
                </div>

                <hr>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary mr-1 data-submit" name="btn_criar_atualizar_empresa" id="btn_criar_atualizar_empresa"  >
                        Atualizar
                    </button>
                    <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">
                        Cancelar
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
