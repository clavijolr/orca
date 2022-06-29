
<div  class="modal modal-slide-in fade" id="div_cadastro_empresa">
    <div class="modal-dialog">
        <form   class=" modal-content pt-0" name="gravarEmpresaForm" id="gravarEmpresaForm"  >
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
            <div class="modal-header mb-1">
                <h5 class="modal-title" id="tituloModalLabel">Atualiza Empresa</h5>
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
                    <label class="form-label" for="descricao">Nome da Empresa</label>
                    <input type="text" 
                        class="form-control dt-full-name"
                        id="empresa" 
                        name="empresa" 
                        placeholder="Digite o nome da empresa"
                        aria-label="Empresa"
                        aria-describedby="Nome da empresa" 
                        maxlength="30"
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
                        onkeypress='return filtroTeclas(event)'
                        required
                    />
                </div>

                <hr>
                <button type="submit" class="btn btn-primary mr-1 data-submit" name="btn_criar_atualizar" id="btn_criar_atualizar"  >
                    Atualizar
                </button>

                <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">
                    Cancelar
                </button>
            </div>
        </form>
    </div>
</div>
