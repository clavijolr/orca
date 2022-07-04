
    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.bootstrap4.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.responsive.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.bootstrap4.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
    <!-- END: Page Vendor JS-->
    <script type="text/javascript">
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

        function criar() {
            $('#conta_id').val('');
            $('#conta_descricao').val('');
            $('#agencia').val('');
            $('#conta').val('');
            $('#conta_saldo').val('');
            $('tituloModalConta').text("Criar Conta");
            $('#btn_criar_atualizar_conta').text('Criar');
            $('#div_cadastro_conta').modal("show");
            return;
        }

        function editar(id) {
            $('tituloModalConta').text("Alterar Conta");
            $('#btn_criar_atualizar_conta').text('Alterar');

            $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
            $.ajax({
                type: "post",
                url: "{{ url('conta/editar/#registro') }}".replace('#registro',id),
                data: "do=getInfo",
                success: function(result) {
                    $('#conta_id').val(result.id);
                    $('#conta_descricao').val(result.descricao);
                    $('#agencia').val(result.agencia);
                    $('#conta').val(result.conta);
                    $('#conta_saldo').val((result.saldo==null || result.saldo=="" ? "" : result.saldo.replace('.',',')));                    $('#div_cadastro_conta').modal("show");
                },
                error: function(result) {
                    console.log('falha editar');
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

        $(document).ready(function() {
            $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});

            $('#datatables-conta').DataTable({
                processing: true,
                serverSide: true,
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

                ajax: "{{ url('contas') }}",
                columns: [
                    { data: 'id', name: 'id',visible: false},
                    { data: 'descricao', name: 'descricao'},
                    { data: 'agencia', name: 'agencia'},
                    { data: 'conta', name: 'conta'},
                    { data: 'saldo', render: $.fn.dataTable.render.number( '.', ',', 2,'R$ ' ), name: 'saldo'},
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
                buttons: [{
                            text: 'Nova Conta',
                            className: 'btn btn-block btn-sm btn-primary align-items-center header-actions mx-1 row mt-50',
                            action: function ( e, dt, node, config ) {
                                criar();
                            },
                            init: function (api, node, config) {
                                $(node).removeClass('btn-secondary');
                            }
                }]
            });
            $('#datatables-conta tbody').on('click', 'a.btn_edit', function (e) {
                e.preventDefault();
                var row = $(this).closest('tr');
                var id = $('#datatables-conta').DataTable().row( row ).data().id;
                //novaurl='\{\{ url(conta/' + data + ') \}\}';
                editar(id);
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
        });

        $('#gravarContaForm').submit(function(event){
            event.preventDefault();
            if (!$('#conta_id').val()){
                id='novo';
            }else{
                id=$('#conta_id').val();
            }
            $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
            $.ajax({
                url: "{{ url('conta/gravar/#id') }}".replace('#id',id),
                type: "post",
                data: $(this).serialize(),
                dataType:'json',
                success: function(result) {
                    $('#conta_id').val('');
                    $('#conta_descricao').val('');
                    $('#agencia').val('');
                    $('#conta').val('');
                    $('#conta_saldo').val('');
                    $('#datatables-conta').DataTable().ajax.reload();
                    $('#div_cadastro_conta').modal("hide");
                },
                error: function(result) {
                    console.log("falha receber ");
                }
            });

        });

        $('#div_cadastro_conta').on('shown.bs.modal', function() {
            $('#conta_descricao').trigger('focus');
        });

    </script>
