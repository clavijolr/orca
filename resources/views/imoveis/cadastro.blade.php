
<div  id="div_cadastro_obra" name="div_cadastro_obra" class="modal modal-slide-in fade"  role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <form  class=" modal-content pt-0" name="gravarObraForm" id="gravarObraForm"  >
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
            <div class="modal-header mb-1">
                <h5 class="modal-title" id="tituloModalObra">Novo Imovel</h5>
             </div>
            <div class="modal-body flex-grow-1 ">

                <div class="form-group d-none">
                    <input type="text"
                        id="obra_id"
                        name="obra_id"
                    />
                </div>

                <div class="form-group">
                    <label class="form-label" for="imovel_descricao">Nome do imovel</label>
                    <input type="text"
                        class="form-control "
                        id="imovel_descricao"
                        name="imovel_descricao"
                        placeholder="Digite nome do imovel "
                        autocomplete="off"
                        tabindex="1"
                        required
                        maxlength="35"
                        data-input
                    />
                </div>
                <div class="form-group">
                    <label class="form-label" for="imovel_endereco">Endereco do imovel</label>
                    <input type="text"
                        class="form-control "
                        id="imovel_endereco"
                        name="imovel_endereco"
                        placeholder="Digite nome do imovel "
                        autocomplete="off"
                        tabindex="1"
                        required
                        maxlength="55"
                        data-input
                    />
                </div>
                <hr>
                <button type="submit" class="btn btn-primary mr-1 data-submit" name="btn_criar_atualizar_obra" id="btn_criar_atualizar_obra"  >
                    Atualizar
                </button>
                <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">
                    Cancelar
                </button>
            </div>
        </form>
    </div>
</div>

