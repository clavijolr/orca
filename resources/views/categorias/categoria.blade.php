@extends('layouts.modelo')

    @section('header')
        @include('categorias.css')
    @endsection

    @section('conteudo')
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
        
            <div class="content-body">
            <!-- conatas list start -->
                <section class="app-conta-list">
                    <div  class="card">
                        <div  class="card-datatable table-responsive pt-0">
                            <div class="card-body">
                                <table  class="table table-bordered" id="datatables-categoria" name='datatables-categoria'>
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Categoria</th>
                                            <th>Ação</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>   
                    {{-- @include('name') --}}                                   
                </section>
            <!-- contas list ends -->
            </div>
            @include('categorias.cadastro')
        </div>
    @endsection
    
    @section('scripts')
    @include('categorias.js')
    <script type="text/javascript">
    
        $(document).ready(function() {
            $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});            
            $('#datatables-categoria').DataTable({
                processing: true,
                serverSide: true,
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
                        sSearch: "Pesquisar",
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

                ajax: "{{ url('categorias') }}",
                columns: [
                    { data: 'id', name: 'id'},
                    { data: 'categoria', name: 'categoria'},
                    { defaultContent: '<div><a href="" class="btn_edit" >'+feather.icons['edit'].toSvg({ class: 'font-small-4' }) + ' </a>' +
                                      '<a href="" class="btn_del" >'+feather.icons['trash-2'].toSvg({ class: 'font-small-4' }) + '</a></div>'
                    }                    
                        
                ],
                order: [
                    [0, 'desc'],
                    
                ],
                dom:
                    '<"d-flex justify-content-between align-items-center header-actions mx-1 row mt-75"' +
                    '<"col-lg-12 col-xl-6" l>' +
                    '<"col-lg-12 col-xl-6 pl-xl-75 pl-0"<"dt-action-buttons text-xl-right text-lg-left text-md-right text-left d-flex align-items-center justify-content-lg-end align-items-center flex-sm-nowrap flex-wrap mr-1"<"mr-1"f>B>>' +
                    '>t' +
                    '<"d-flex justify-content-between mx-2 row mb-1"' +
                    '<"col-sm-12 col-md-6"i>' +
                    '<"col-sm-12 col-md-6"p>' +
                    '>',
                // Buttons with Dropdown
                buttons: [
                    {
                    text: 'Nova Categoria',
                    className: 'add-new btn btn-primary mt-50',
                    action: function ( e, dt, node, config ) {
                        criar();
                    },
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                    }
                    }
                ]
            });

            $('#datatables-categoria tbody').on('click', 'a.btn_edit', function (e) {
                e.preventDefault();
                var row = $(this).closest('tr');
                var id = $('#datatables-categoria').DataTable().row( row ).data().id;
                //novaurl='\{\{ url(conta/' + data + ') \}\}';
                editar(id);
                return;
            });
            $('#datatables-categoria tbody').on('click', 'a.btn_del', function (e) {
                e.preventDefault();
                var row = $(this).closest('tr');
                var idcategoria = $('#datatables-categoria').DataTable().row( row ).data().id;
                var categoria = $('#datatables-categoria').DataTable().row( row ).data().categoria;
                //novaurl='\{\{ url(conta/' + data + ') \}\}';
                //alert(data);
                apagar(idcategoria,categoria);
                return;
            });
        });

        function editar(id) {
            $('#tituloModalLabel').text("Alterar categoria");                        
            $('#btn_criar_atualizar').text('Alterar');


            $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});            
            $.ajax({
                type: "post",
                url: "{{ url('categoria/editar/#registro') }}".replace('#registro',id),
                data: "do=getInfo",
                cache: false,
                async: false,
                success: function(result) {
                    $('#categoria_id').val(result.id);
                    $('#categoria').val(result.categoria);
                    $('#cpfcnpj').val(result.cpfcnpj);
                    $('#div_cadastro_categoria').modal("show");
                },
                error: function(result) {
                    console.log('falha editar');
                }
            });                
            return;
        }

        function criar() {
            $('#categoria_id').val('');
            $('#categoria').val('');
            $('#cpfcnpj').val('');
            $('#tituloModalLabel').text("Criar categoria");                        
            $('#btn_criar_atualizar').text('Criar');
            $('#div_cadastro_categoria').modal("show");
            return;
        }


        function apagar(id,categoria) {
            //alert('entrou no apagar');
            if (confirm('Deseja apagar a conta '+categoria+' realmente?')) {
                $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});            
                $.ajax({
                    type: "post",
                    url: "{{ url('categoria/apagar/#registro') }}".replace('#registro',id),
                    data: "do=getInfo",
                    cache: false,
                    async: false,
                    success: function(result) {
                        //alert('sucesso');
                        $('#datatables-categoria').DataTable().ajax.reload();
                    },
                    error: function(result) {
                        console.log('falha editar');
                    }
                });
            }
            return false;
        };

        var filtroTeclas = function(event) {
            isnumber=((event.charCode >= 48 && event.charCode <= 57) || (event.keyCode == 45 || event.charCode == 44));
            if (event.charCode == 44) {
                teste=event.target.value;
                if (event.target.value.indexOf(",")>=-1) {
                    isnumber=false;
                }
            }
            return isnumber
        };

        $('#gravarCategoriaForm').submit(function(event){
            event.preventDefault();
            if (!$('#categoria_id').val()){
                id='novo';
            }else{
                id=$('#categoria_id').val();
            }
            $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
            $.ajax({
                url: "{{ url('categoria/gravar/#id') }}".replace('#id',id),
                type: "post",
                data: $(this).serialize(),
                dataType:'json',
                success: function(result) {
                    $('#categoria_id').val('');
                    $('#categoria').val('');
                    $('#cpfcnpj').val('');
                    $('#datatables-categoria').DataTable().ajax.reload();
                    $('#div_cadastro_categoria').modal("hide");                        
                },
                error: function(result) {
                    console.log("falha receber ");
                }
            });

        });



    </script>    
    @endsection
