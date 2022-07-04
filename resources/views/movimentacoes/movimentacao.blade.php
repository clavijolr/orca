@extends('layouts.modelo')

    @section('vendor-style')
    <!-- vendor css files -->
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/pickadate/pickadate.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">

    @endsection



    @section('page-script')
        <!-- Page js files -->
        @include('movimentacoes.css')
    @endsection

    @include('movimentacoes.teste')

    @section('conteudo')

        <div class="card">
            <div class="card-body">
                <form  name="form_movimentacao" id="form_movimentacao">
                    <div class="row">
                        <div class="col-md-3 col-12">
                            <div div class="form-group ">
                                <label  for="mv_emissao">Escolha uma data para este lançamento </label>
                                <input
                                    type="text"
                                    id="mv_emissao"
                                    name="mv_emissao"
                                    class="form-control pickadate-translations"
                                    placeholder="Escolha data emissão"
                                    required pattern="(^[0][1-9]|^[1-2][0-9]|^[3][0-1]|^[1-9])[\s](\bJaneiro\b|\bFevereiro\b|\bMarço\b|\bAbril\b|\bMaio\b|\bJunho\b|\bJulho\b|\bAgosto\b|\bSetembro\b|\bOutubro\b|\bNovembro\b|\bDezembro\b)[,]{1}[\s][2][0][2-9][0-9]"
                                    tabindex="1"
                                    />
                            </div>
                        </div>
                        <div class="col-md-3 col-12">
                            <div div class="form-group ">
                                <label  for="mv_vencimento">Escolha uma data de vencimento </label>
                                <input
                                    type="text"
                                    id="mv_vencimento"
                                    name="mv_vencimento"
                                    class="form-control pickadate-translations"
                                    placeholder="Escolha data emissão"
                                    tabindex="2"
                                    required pattern="(^[0][1-9]|^[1-2][0-9]|^[3][0-1]|^[1-9])[\s](\bJaneiro\b|\bFevereiro\b|\bMarço\b|\bAbril\b|\bMaio\b|\bJunho\b|\bJulho\b|\bAgosto\b|\bSetembro\b|\bOutubro\b|\bNovembro\b|\bDezembro\b)[,]{1}[\s][2][0][2-9][0-9]"
                                    />
                            </div>
                        </div>
                        <div class="col-md-3 col-12 ">
                        </div>
                        <div class="col-md-3 col-12 ">
                            <div div class="form-group ">
                                <label  for="mv_baixa">Escolha uma data de baixa </label>
                                <input
                                    type="text"
                                    id="mv_baixa"
                                    name="mv_baixa"
                                    class="form-control pickadate-translations"
                                    placeholder="Escolha data emissão"
                                    tabindex="3"
                                    />
                            </div>
                        </div>
                    </div>
                    <div class="divider divider-dotted  divider-primary">
                        <div class="divider-text">Dados da movimentação</div>
                    </div>

                    <div class="row">
                        <div class="col-md-3 col-12">
                            <div class="form-group ">
                                <label for="mv_conta_id">Escolha uma conta</label>
                                <div class="input-group">
                                    <select class="form-control "
                                        name="mv_conta_id"
                                        id="mv_conta_id"
                                        tabindex="4"
                                        required>
                                        <option value="" selected disabled hidden>Escolha uma conta</option>
                                    </select>
                                    <div class="input-group-append">
                                        <button class="btn btn-sm btn-secondary" name="btn_conta" id="btn_conta" type="button">+</button>
                                    </div>
                                </div>
                            </div>
                        </div>                        
                        <div class="col-md-3 col-12">
                            <div class="form-group">
                                <label  for="mv_conta_id">Escolha uma empresa</label>
                                <div class="input-group">
                                    <select class="form-control "
                                        name="mv_empresa_id"
                                        id="mv_empresa_id"
                                        tabindex="5"
                                        required>
                                        <option value="" selected disabled hidden>Escolha uma empresa</option>
                                    </select>
                                    <div class="input-group-append">
                                        <button class="btn btn-sm btn-secondary" name="btn_empresa" id="btn_empresa" type="button">+</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-12">
                            <div class="form-group ">
                                <label for="mv_conta_id">Escolha um grupo</label>
                                <div class="input-group">
                                    <select class="form-control "
                                        name="mv_grupo_id"
                                        id="mv_grupo_id"
                                        tabindex="6"
                                        required>
                                        <option value="" selected disabled hidden>Escolha um grupo</option>
                                    </select>
                                    <div class="input-group-append">
                                        <button class="btn btn-sm btn-secondary"  name="btn_grupo" id="btn_grupo" type="button">+</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-12">
                            <div class="form-group ">
                                <label for="mv_categoria_id">Escolha uma Categoria</label>
                                <div class="form-group input-group">
                                    <select class="form-control "
                                        name="mv_categoria_id"
                                        id="mv_categoria_id"
                                        tabindex="7"
                                        required>
                                        <option value="" selected disabled hidden>Escolha a Categria</option>
                                    </select>
                                    <div class="input-group-append">
                                        <button class="btn btn-sm btn-secondary" name="btn_categoria" id="btn_categoria" type="button" >+</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-12"   >
                            <div class="form-group">
                                <label for="mv_subcategoria_id">Escolha uma SubCategoria</label>
                                <div class="input-group">
                                    <select class="form-control "
                                        name="mv_subcategoria_id"
                                        id="mv_subcategoria_id"
                                        disabled="disabled"
                                        tabindex="9"
                                        >
                                        <option value="" selected disabled hidden>Escolha uma subcategoria</option>
                                    </select>
                                    <div class="input-group-append">
                                        <button class="btn btn-sm btn-secondary" name="btn_subcategoria" id="btn_subcategoria" type="button">+</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-12">
                            <div class="form-group ">
                                <label for="mv_obra_id">Escolha uma obra para este lançamento</label>
                                <div class="input-group">
                                    <select class="form-control "
                                        name="mv_obra_id"
                                        id="mv_obra_id"
                                        disabled="disabled"
                                        tabindex="10"
                                        required>
                                        <option value="" selected disabled hidden>Escolha uma obra </option>
                                    </select>
                                    <div class="input-group-append">
                                        <button class="btn btn-sm btn-secondary" name="btn_obra" id="btn_obra" type="button">+</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-12">
                            <div class="form-group ">
                                <label for="mv_pessoa_id">Escolha a entidade destino do lançamento</label>
                                <div class="input-group">
                                    <select class="form-control "
                                        name="mv_pessoa_id"
                                        id="mv_pessoa_id"
                                        tabindex="11"
                                        required>
                                        <option value="" selected disabled hidden>Movimentação para ... </option>
                                    </select>
                                    <div class="input-group-append">
                                        <button class="btn btn-sm btn-secondary" name="btn_pessoa" id="btn_pessoa" type="button">+</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-md-8 col-12">
                            <div class="form-group">
                                <input
                                    type="text"
                                    id="mv_descricao"
                                    name="mv_descricao"
                                    class="form-control"
                                    tabindex="11"
                                    autocomplete="off"
                                    required
                                    placeholder="Descrição da Despesa"
                                />
                            </div>
                        </div>
                        <div class="col-md-1 col-12">
                        </div>
                        <div class="col-md-3 col-12">
                            <div class="form-group">
                                <input
                                    type="currency"
                                    id="mv_valor"
                                    name="mv_valor"
                                    class="form-control"
                                    placeholder="Valor da Despesa"
                                    autocomplete="off"
                                    tabindex="12"
                                    required
                                    onkeypress='return filtroTeclas(event)'
                                />
                            </div>
                        </div>
                        <div class="form-group hidden">
                            <input
                                type="text"
                                id="mv_tipo"
                                name="mv_tipo"
                                value=""
                                hidden
                            />
                        </div>
                    </div>
                    <hr>
                    <div class="row ">
                        <div class="col-12 ">
                            <button type="submit" tabindex="13" class="btn btn-sm  col-md-1 btn-outline-success float-right ">Lançar</button>
                            <button type="reset"  tabindex="14" class="btn btn-sm   col-md-1 btn-outline-secondary float-right mr-1">Cancelar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    <div class="card">
        <div class="card-body">
            <div  class="card-datatable table-responsive pt-0">
                <div class="card-body">
                    <table  class="table table-bordered" id="datatables-movimentacao" name='datatables-movimentacao'>
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Emissão</th>
                                <th>Empresa</th>
                                <th>Conta</th>
                                <th>Grupo</th>
                                <th>Categoria</th>
                                <th>Subcategoria</th>
                                <th>Vencimento</th>
                                <th>Baixa</th>
                                <th>Valor</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>


        @include('empresas.cadastro')
        @include('contas.cadastro')
        @include('grupos.cadastro')
        @include('categorias.cadastro')
        @include('subcategorias.cadastro')
        @include('obras.cadastro')
        @include('pessoas.cadastro')
    @endsection


    @section('scripts')
    @include('movimentacoes.js')

    <script type="text/javascript">

        $(document).ready(function()
        {
            atualiza_empresa();
            atualiza_conta();
            atualiza_pessoa();
            //$("#mv_emissao").focus();
            //$("#subcategoria_div").hide();

        });
    </script>
    @endsection
