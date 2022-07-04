
<div  class="modal modal-slide-in fade" id="div_cadastro_pessoa">
    <div class="modal-dialog">
        <form   class=" modal-content pt-0" name="gravarPessoaForm" id="gravarPessoaForm"  >
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
            <div class="modal-header mb-1">
                <h5 class="modal-title" id="tituloModalPessoa">Atualiza Pessoa</h5>
            </div>
            <div class="modal-body flex-grow-1 ">
                <div class="form-group d-none">
                    <input type="text"
                        id="pessoa_id"
                        name="pessoa_id"
                        hidden
                    />
                </div>
                <div class="form-group">
                    <label class="form-label" for="pessoa_nome">Nome da Pessoa</label>
                    <input type="text"
                        class="form-control "
                        id="pessoa_nome"
                        name="pessoa_nome"
                        placeholder="Digite o nome da pessoa"
                        aria-label="Nome"
                        aria-describedby="Nome da pessoa"
                        maxlength="35"
                        autocomplete="false"
                        required
                    />
                </div>
                <div class="form-group">
                    <label class="form-label" for="pessoa_razao">Razão da social da empresa</label>
                    <input type="text"
                        class="form-control "
                        id="pessoa_razao"
                        name="pessoa_razao"
                        placeholder="Digite a razão da social"
                        aria-label="Nome"
                        aria-describedby="Razão da social da empresa"
                        autocomplete="false"
                        maxlength="35"
                    />
                </div>

                <div class="form-group">
                    <label class="form-label" for="pessoa_cpfcnpj">CNPJ ou CPF</label>
                    <input type="text"
                        id="pessoa_cpfcnpj"
                        name="pessoa_cpfcnpj"
                        class="form-control "
                        placeholder="Digite somente número"
                        aria-label="1572"
                        minlength="11"
                        maxlength="14"
                        autocomplete="false"
                        onkeypress='return filtroTeclaDocumento(event)'
                        required
                    />
                </div>

                <hr>
                <button type="submit" class="btn btn-primary mr-1 data-submit" name="btn_criar_atualizar_pessoa" id="btn_criar_atualizar_pessoa"  >
                    Atualizar
                </button>

                <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">
                    Cancelar
                </button>
            </div>
        </form>
    </div>
</div>
