
<div  class="modal modal-slide-in fade" id="div_cadastro_grupo">
    <div class="modal-dialog">
        <form   class=" modal-content pt-0" name="gravarGrupoForm" id="gravarGrupoForm"  >
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
            <div class="modal-header mb-1">
                <h5 class="modal-title" id="tituloModalLabel">Atualiza Grupo</h5>
            </div>
            <div class="modal-body flex-grow-1 ">
                <div class="form-group d-none">
                    <input type="text" 
                        id="grupo_id" 
                        name="grupo_id"
                        hidden 
                    />
                </div>
                <div class="form-group">
                    <label class="form-label" for="descricao">Nome da Grupo</label>
                    <input type="text" 
                        class="form-control dt-full-name"
                        id="grupo" 
                        name="grupo" 
                        placeholder="Digite o nome da grupo"
                        aria-label="Grupo"
                        aria-describedby="Nome da grupo" 
                        maxlength="30"
                        required 
                    />
                </div>

                <div class="form-group">
                    <label for="tipo">Escolha o tipo deste grupo </label>
                    <select class="form-control mb-1" name='tipo' id="tipo">
                        <option selected value="C">Crédito</option>
                        <option value="D">Débito</option>
                    </select>
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
