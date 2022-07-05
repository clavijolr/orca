
<div  class="modal modal-slide-in fade" id="div_cadastro_grupo">
    <div class="modal-dialog">
        <form   class=" modal-content pt-0" name="gravarGrupoForm" id="gravarGrupoForm"  >
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
            <div class="modal-header mb-1">
                <h5 class="modal-title" id="tituloModalGrupo">Atualiza Grupo</h5>
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
                        class="form-control "
                        id="grupo_grupo"
                        name="grupo_grupo"
                        placeholder="Digite o nome da grupo"
                        aria-label="Grupo"
                        aria-describedby="Nome da grupo"
                        maxlength="30"
                        required
                    />
                </div>

                <div class="form-group">
                    <label for="grupo_tipo">Escolha o tipo deste grupo </label>
                    <select class="form-control"
                            name='grupo_tipo'
                            id="grupo_tipo"
                            required
                            >
                        <option value="" selected disabled hidden>Escolha um tipo </option>
                        <option value='C'>Saida</option>
                        <option value='D'>Entrada</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="grupo_tipo_pessoa">Escolha a clasificação do grupo</label>
                    <select class="form-control"
                            name='grupo_tipo_pessoa'
                            id="grupo_tipo_pessoa"
                            required
                            >
                        <option value="" selected disabled hidden>Escolha a permisão do grupo</option>
                        <option value='F'>Física</option>
                        <option value='J'>Jurídica</option>

                    </select>
                </div>
                <hr>
                <button type="submit" class="btn btn-primary mr-1 data-submit" name="btn_criar_atualizar_grupo" id="btn_criar_atualizar_grupo"  >
                    Atualizar
                </button>
                <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">
                    Cancelar
                </button>
            </div>
        </form>
    </div>
</div>
