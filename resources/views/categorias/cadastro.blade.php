
<div  class="modal modal-slide-in fade" id="div_cadastro_categoria">
    <div class="modal-dialog">
        <form   class=" modal-content pt-0" name="gravarCategoriaForm" id="gravarCategoriaForm"  >
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
            <div class="modal-header mb-1">
                <h5 class="modal-title" id="tituloModalLabel">Atualiza Categoria</h5>
            </div>
            <div class="modal-body flex-grow-1 ">
                <div class="form-group d-none">
                    <input type="text" 
                        id="categoria_id" 
                        name="categoria_id"
                        hidden 
                    />
                </div>
                <div class="form-group">
                    <label class="form-label" for="descricao">Nome da Categoria</label>
                    <input type="text" 
                        class="form-control dt-full-name"
                        id="categoria" 
                        name="categoria" 
                        placeholder="Digite o nome da categoria"
                        aria-label="Categoria"
                        aria-describedby="Nome da categoria" 
                        maxlength="30"
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
