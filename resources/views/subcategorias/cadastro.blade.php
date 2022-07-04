
<div  class="modal modal-slide-in fade" id="div_cadastro_subcategoria">
    <div class="modal-dialog">
        <form   class=" modal-content pt-0" name="gravarSubcategoriaForm" id="gravarSubcategoriaForm"  >
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
            <div class="modal-header mb-1">
                <h5 class="modal-title" id="tituloModalSubcategoria">Atualiza Subcategoria</h5>
            </div>
            <div class="modal-body flex-grow-1 ">
                <div class="form-group d-none">
                    <input type="text"
                        id="subcategoria_id"
                        name="subcategoria_id"
                        hidden
                    />
                </div>

                <div class="form-group">
                    <label class="form-label" for="subcategoria">Subcategoria</label>
                    <input type="text"
                        class="form-control "
                        id="subcategoria"
                        name="subcategoria"
                        placeholder="Digite o a subcategoria"
                        aria-label="Subcategoria"
                        maxlength="35"
                        required
                    />
                </div>
                <div class="form-group">
                    <label class="form-label" for="grupo">Categoria</label>
                    <select class="form-control"
                        name="subcategoria_categoria_id"
                        id="subcategoria_categoria_id"
                        required
                        >
                         <option value="" selected disabled hidden>Escolha uma categoria</option>
                        </select>
                </div>

                <hr>
                <button type="submit" class="btn btn-primary mr-1 data-submit" name="btn_criar_atualizar_subcategoria" id="btn_criar_atualizar_subcategoria"  >
                    Atualizar
                </button>

                <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">
                    Cancelar
                </button>
            </div>
        </form>
    </div>
</div>
