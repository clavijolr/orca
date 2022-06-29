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
            <section class="app-conta-list">

                <div  class="card">
                    <div  class="card-datatable table-responsive pt-0">
                        <div class="card-body">
                            <table  class="table table-bordered" id="datatables-conta" name='datatables-conta'>
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Descricao</th>
                                        <th>Agencia</th>
                                        <th>Conta</th>
                                        <th>Saldo</th>
                                        <th>Ação</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>   
                @livewire('cadastro-contas')                                   
            </section>
        <!-- contas list ends -->
        </div>
    @endsection
    
    @section('scripts')
    @include('contas.js')
    <script type="text/javascript">
    
        $('form[name="updateForm"]').submit(function(event){
            event.preventDefault();
            $('#updatesaldo').val($('#updatesaldo').val().replace(',','.'));
            id=$('#updateconta_id').val();
            
            $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
            $.ajax({
                url: "{{ url('conta/gravar/#id') }}".replace('#id',id),
                type: "post",
                data: $(this).serialize().replace(/update/g,''),
                dataType:'json',
                success: function(result) {
                    $('#datatables-conta').DataTable().ajax.reload();
                    $('#update_modals-slide-in').modal("hide");                        
                },
                error: function(result) {
                    console.log("falha receber ");
                }
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
            $('#datatables-conta').DataTable().ajax.reload();
        });

        $(document).ready(function() {
            $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});            

            $('#datatables-conta').DataTable({
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
                    //{ defaultContent: '<button id="btedit" data-toggle="modal" data-target="#update_modals-slide-in" wire:click="edit"></button>'}                    
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

            $('#datatables-conta tbody').on('click', 'a.btn_edit', function (e) {
                e.preventDefault();
                var row = $(this).closest('tr');
                var data = $('#datatables-conta').DataTable().row( row ).data().id;
                //novaurl='\{\{ url(conta/' + data + ') \}\}';
                editar(data);
                return;
            });
            $('#datatables-conta tbody').on('click', 'a.btn_del', function (e) {
                e.preventDefault();
                var row = $(this).closest('tr');
                var idconta = $('#datatables-conta').DataTable().row( row ).data().id;
                var descricao = $('#datatables-conta').DataTable().row( row ).data().descricao;
                //novaurl='\{\{ url(conta/' + data + ') \}\}';
                //alert(data);
                apagar(idconta,descricao);
                return;
            });
            function editar(id) {
                $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});            
                $.ajax({
                    type: "post",
                    url: "{{ url('conta/editar/#registro') }}".replace('#registro',id),
                    data: "do=getInfo",
                    cache: false,
                    async: false,
                    success: function(result) {
                        $('#updateconta_id').val(result.id);
                        $('#updatedescricao').val(result.descricao);
                        $('#updateagencia').val(result.agencia);
                        $('#updateconta').val(result.conta);
                        $('#updatesaldo').val((result.saldo==null || result.saldo=="" ? "" : result.saldo.replace('.',',')));
                        $('#update_modals-slide-in').modal("show");
                    },
                    error: function(result) {
                        console.log('falha editar');
                        //alert("Data not found");
                    }
                });                
                return;
            }
            function apagar(id,descricao) {
                //alert('entrou no apagar');
                if (confirm('Deseja apagar a conta '+descricao+' realmente?')) {
                    $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});            
                    $.ajax({
                        type: "post",
                        url: "{{ url('conta/apagar/#registro') }}".replace('#registro',id),
                        data: "do=getInfo",
                        cache: false,
                        async: false,
                        success: function(result) {
                            //alert('sucesso');
                            $('#datatables-conta').DataTable().ajax.reload();
                        },
                        error: function(result) {
                            //alert('falha');
                            console.log('falha editar');
                        }
                    });
                }
                return false;
            };
            

            
            /* 
            $('#datatables-conta tbody').on('click', 'a.btn_edit', function (e) {
                e.preventDefault();
                var row = $(this).closest('tr');
                var data = $('#datatables-conta').DataTable().row( row ).data().descrica
                alert(data);
            });
            */            

            
        });
    </script>    
    @endsection
