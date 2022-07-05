@extends('layouts.modelo')

    @section('vendor-style')
    <!-- vendor css files -->
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/pickadate/pickadate.css')) }}">

    @endsection



    @section('page-script')
        <!-- Page js files -->
        @include('movimentacoes.css')
    @endsection


    @section('conteudo')

    <div class="card">
        <div class="card-body">
            <div  class="card-datatable table-responsive pt-0">
                <div class="card-body">
                    <table  class="table table-bordered" id="datatables-movimentacao" name='datatables-movimentacao'>
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Emissão</th>
                                <th>Entidade</th>
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

    @endsection


    @section('scripts')
    @include('movimentacoes.lista')
    <script type="text/javascript">

        $(document).ready(function()
        {

            $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
            $('#datatables-movimentacao').DataTable({
                processing: true,
                serverSide: true,
                searching: false,
                pageLength: 10,
                lengthChange: false,
                language : {
                        decimal: ",",
                        thousands: ",",
                        sEmptyTable: "Nenhum registro encontrado",
                        sInfo: "Mostrando  _START_ até _END_ de _TOTAL_ Resultados",
                        sInfoEmpty: "Mostrando 0 até 0 de 0 registros",
                        sInfoFiltered: "(Filtrados de MAX registros)",
                        sInfoPostFix: "",
                        sInfoThousands: ".",
                        sLengthMenu: "_MENU_ resultados por página",
                        sLoadingRecords: "Carregando...",
                        sProcessing: "Processando...",
                        sZeroRecords: "Nenhum registro encontrado",
                        sSearch: "",
                        sSearchPlaceholder: "Digite a procura",
                        oPaginate: {
                            sNext: "Próximo",
                            sPrevious: "Anterior",
                            sFirst: "Primeiro",
                            sLast: "Último"
                        },
                        oAria: {
                            sSortAscending: ": Ordenar colunas de forma ascendente",
                            sSortDescending: ": Ordenar colunas de forma descendente"
                        }
                    },

                ajax: "{{ url('movimentacoes') }}",
                columns: [
                    { data: 'id', name: 'id',visible: false},
                    { data: 'emissao', name: 'data'},
                    { data: 'empresa.empresa', name: 'entidade'},
                    { data: 'conta.descricao', name: 'conta'},
                    { data: 'grupo.grupo', name: 'grupo'},
                    { data: 'categoria.categoria', name: 'categoria'},
                    { data: 'subcategoria.subcategoria', name: 'subcategoria'},
                    { data: 'vencimento', name: 'data'},
                    { data: 'baixa', name: 'data'},
                    { data: 'valor', name: 'valor'},
                    { defaultContent: '<a href="" class="btn_del" >'+feather.icons['trash-2'].toSvg({ class: 'font-small-4' }) + '</a></div>'
                    }
                ],
                columnDefs: [
                    {
                        targets: 1,
                        //width: '42px',
                         render: function (data, type, full, meta) {
                            var $grupo = full['grupo'];
                            const meses = ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul","Ago","Set","Out","Nov","Dez"];
                            var data = new Date(full['emissao']);
                            let dataFormatada = ((data.getDate() + " " + meses[(data.getMonth())] + " " + data.getFullYear()));
                            return '<span class=" badge badge-pill badge-light-dark">'+ dataFormatada +'</span>';
                         }
                    },


                    {
                        targets: 6,
                        width: '42px',
                            //data: 'grupo.grupo', name: 'grupo'
                            render: function (data, type, full, meta) {
                                var $subcategoria = full['subcategoria'];
                                if ( !$subcategoria ){
                                    return '<span class=" badge badge-pill badge-secondary"> Sem subcategoria </span>';
                                }else{
                                    return  $subcategoria['subcategoria'] ;
                                }
                            }
                    },
                    {
                        targets: 7,
                        //width: '42px',
                         render: function (data, type, full, meta) {
                            var $grupo = full['grupo'];
                            const meses = ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul","Ago","Set","Out","Nov","Dez"];
                            var data = new Date(full['vencimento']);
                            var data_baixa = new Date(full['baixa']);
                            let dataFormatada = ((data.getDate() + " " + meses[(data.getMonth())] + " " + data.getFullYear()));

                            if ( !full['baixa'] ){
                                if(data > new Date()){
                                    return '<span class=" badge badge-glow badge-pill badge-success">'+ dataFormatada +'</span>';
                                }else if(data === new Date()){
                                    return '<span class=" badge badge-glow badge-pill badge-warning">'+ dataFormatada +'</span>';
                                }else{
                                    return '<span class=" badge badge-glow badge-pill badge-danger">'+ dataFormatada +'</span>';
                                }
                            }else{
                                return '<span class=" badge badge-pill badge-light-dark">'+ dataFormatada +'</span>';
                            }

                         }
                    },
                    {
                        targets: 8,
                        //width: '42px',
                         render: function (data, type, full, meta) {
                            var $grupo = full['grupo'];
                            const meses = ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul","Ago","Set","Out","Nov","Dez"];
                            var data = new Date(full['baixa']);
                            let dataFormatada = ((data.getDate() + " " + meses[(data.getMonth())] + " " + data.getFullYear()));
                            if ( !full['baixa'] ){
                                return '<span class=" badge badge-pill badge-light-secondary">em aberto</span>';
                            }else{
                                return '<span class=" badge badge-pill badge-light-dark">'+ dataFormatada +'</span>';
                            }
                         }
                    },


                    {
                        targets: 9,
                        //width: '42px',
                         render: function (data, type, full, meta) {
                            var $grupo = full['grupo'];
                            //var $valor = full['valor'];
                            var $valor = $.fn.dataTable.render.number('.', ',', 2, 'R$ ').display(full['valor'])
                             if ( !$grupo ){
                                return '<span class=" badge badge-pill badge-light-secondary"> sem tipo </span>';
                             }
                            if ($grupo['tipo']==='D') {
                                return '<span class=" badge badge-pill badge-light-success">'+ $valor +'</span>';
                            }else{
                                return '<span class=" badge badge-pill badge-light-danger">'+ $valor +'</span>';
                            }
                         }
                    }
                ],

                order: [
                    [8, 'desc'],
                ],
            });
            $('#datatables-movimentacao tbody').on('click', 'a.btn_del', function (e) {
                e.preventDefault();
                var row = $(this).closest('tr');
                var idconta = $('#datatables-movimentacao').DataTable().row( row ).data().id;
                var descricao = $('#datatables-movimentacao').DataTable().row( row ).data().descricao;
                apagar(idconta,descricao);
                return;
            });

        });

    function apagar(id,descricao)
    {
        if (confirm('Deseja apagar a movimentacao '+descricao+' realmente?')) {
            $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
            $.ajax({
                type: "post",
                url: "{{ url('movimentacao/apagar/#registro') }}".replace('#registro',id),
                data: "do=getInfo",

                success: function(result) {
                    $('#datatables-movimentacao').DataTable().ajax.reload();
                },
                error: function(result) {
                    //console.log('falha apgar');
                }
            });
        }
        return false;
    };


    </script>
    @endsection
