@extends('layouts.modelo')

    @section('header')
        @include('contas.css')
    @endsection


    @section('conteudo')
        <div class="content-wrapper">
            <div class="content-header row">
        </div>
        
        <div class="content-body">
        <!-- conatas list start -->
            <section class="app-user-list">

                <div  class="card">
                    <div  class="card-datatable table-responsive pt-0">
                        <div class="card-body">
                            <table  class="table table-bordered" id="ajax-conta-datatable" name='ajax-conta-datatable'>
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Descricao</th>
                                        <th>Conta</th>
                                        <th>Agencia</th>
                                        <th>Saldo</th>
                                        <th>Ação</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>   
                @include('cadastros.contas')                                   
            </section>
        <!-- contas list ends -->
        </div>
    @endsection
    
    @section('scripts')
    @include('contas.js')
    <script type="text/javascript">

        $(function() {
            $('form[name="updateForm"]').submit(function(event){
                event.preventDefault();
                $('#updatesaldo').val($('#updatesaldo').val().replace(',','.'));
                //alert($('#updateconta_id').val());
                $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
                $.ajax({
                    url: "{{ url('gravar-conta') }}",
                    type: "post",
                    data: $(this).serialize().replace(/update/g,''),
                    dataType:'json',
                    success: function(result) {
                        //alert(result);
                    },
                    error: function(result) {
                        alert("falha receber ");
                    }
                });
            });
        });        

        var filtroTeclas = function(event) {
            isnumber=((event.charCode >= 48 && event.charCode <= 57) || (event.keyCode == 45 || event.charCode == 44));
            if (event.charCode == 44) {
                teste=event.target.value;
                if (event.target.value.indexOf(",")>-1) {
                    isnumber=false;
                }
            }
            return isnumber
        };

        window.addEventListener('conta-gravada', event => {
            $('#create_modals-slide-in').modal('hide');
            $('#ajax-conta-datatable').DataTable().ajax.reload();
            //$('#ajax-conta-datatable').data.reload();
        });


        $(document).ready(function() {

            $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});            
            //$.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});

            $('#ajax-conta-datatable').DataTable({
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

                ajax: "{{ url('contas') }}",
                columns: [
                    { data: 'id', name: 'id'},
                    { data: 'descricao', name: 'descricao'},
                    { data: 'agencia', name: 'agencia'},
                    { data: 'conta', name: 'conta'},
                    { data: 'saldo', render: $.fn.dataTable.render.number( '.', ',', 2,'R$ ' ), name: 'saldo'},
                    //{ defaultContent: '<button id="btedit" data-toggle="modal" data-target="#update_modals-slide-in" wire:click="edit">teste</button>'}                    
                    { defaultContent: '<a href="" class="editor_edit" >Edit</a>'}                    

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
                    text: 'Nova Conta',
                    className: 'add-new btn btn-primary mt-50',
                    attr: {
                        'data-toggle': 'modal',
                        'data-target': '#create_modals-slide-in'
                    },
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                    }
                    }
                ]
            });

            $('#ajax-conta-datatable tbody').on('click', 'a.editor_edit', function (e) {
                e.preventDefault();
                var row = $(this).closest('tr');
                var data = $('#ajax-conta-datatable').DataTable().row( row ).data().id;
                
                //novaurl='\{\{ url(conta/' + data + ') \}\}';
                editar(data);
                return;
            });
            function editar(id) {
                //alert("{{ url('conta/#registro') }}".replace('#registro',id));
                //alert("{{ url('conta/#registro') }}".replace('#registro',id)); 
                $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});            
                $.ajax({
                    type: "post",
                    url: "{{ url('conta/#registro') }}".replace('#registro',id),
                    data: "do=getInfo",
                    cache: false,
                    async: false,
                    success: function(result) {
                        //$('#updateDescricao').placeholder="Banco azul";
                        //$('#updateDescricao').value='mudeiteste';
                        alert(result.id);
                        $('#updateconta_id').val(result.id);
                        $('#updatedescricao').val(result.descricao);
                        $('#updateagencia').val(result.agencia);
                        $('#updateconta').val(result.conta);
                        $('#updatesaldo').val(result.saldo.replace('.',','));
                        $('#update_modals-slide-in').modal("show");
                    },
                    error: function(result) {
                        alert("Data not found");
                    }
                });                
                return;
            }
            
            
            /* 
            $('#ajax-conta-datatable tbody').on('click', 'a.editor_edit', function (e) {
                e.preventDefault();
                var row = $(this).closest('tr');
                var data = $('#ajax-conta-datatable').DataTable().row( row ).data().descrica
                alert(data);
            });
            */            

            
        });
        

    </script>    
    @endsection
