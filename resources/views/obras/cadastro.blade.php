
<div  id="div_cadastro_obra" name="div_cadastro_obra" class="modal modal-slide-in fade"  role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <form  class=" modal-content pt-0" name="gravarObraForm" id="gravarObraForm"  >
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
            <div class="modal-header mb-1">
                <h5 class="modal-title" id="tituloModalObra">Nova Obra</h5>
             </div>
            <div class="modal-body flex-grow-1 ">

                <div class="form-group d-none">
                    <input type="text"
                        id="obra_id"
                        name="obra_id"
                    />
                </div>
                <div class="form-group">
                    <label class="form-label" for="descricao">Nome da obra</label>
                    <input type="text"
                        class="form-control "
                        id="obra_descricao"
                        name="obra_descricao"
                        placeholder="Digite nome da obra "
                        autocomplete="off"
                        tabindex="1"
                        required
                        maxlength="35"
                    />
                </div>
                <div class="form-group ">
                    <label for="obra_data_inicio">Escolha uma data para o inicio da obra </label>
                        {{--                     <input type="text"
                                                class="form-control flatpickr-basic"
                                                    id="obra_data_inicio"
                                                    name="obra_data_inicio"
                                                    autocomplete="off"
                                                    tabindex="2"
                                                    required
                                                    placeholder="Escolha a data" />
                        --}}
                    <div class="flatpickr">
                        <input type="text"
                            class="form-control flatpickr-basic
                            id="obra_data_inicio"
                            name="obra_data_inicio"
                            autocomplete="off"
                            tabindex="2"
                            required
                            placeholder="Escolha a data"
                            id="obra_data_inicio"
                            name="obra_data_inicio"
                            data-input>

                        <a class="input-button" title="toggle" data-toggle>
                            <i class="icon-calendar"></i>
                        </a>

                        <a class="input-button" title="clear" data-clear>
                            <i class="icon-close"></i>
                        </a>
                    </div>


                </div>
                <div class="form-group ">
                    <label for="obra_data_fim">Escolha uma data par o fim da obra </label>
                    <input type="text"
                            class="form-control flatpickr-basic"
                            id="obra_data_fim"
                            name="obra_data_fim"
                            autocomplete="off"
                            tabindex="3"
                            placeholder="Escolha a data" />
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

