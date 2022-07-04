
    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.bootstrap4.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.responsive.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.bootstrap4.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
    <!-- END: Page Vendor JS-->

    <script type="text/javascript">

        var filtroTeclaDocumento = function(event) {
            isnumber=((event.charCode >= 48 && event.charCode <= 57) || (event.keyCode == 45 || event.charCode == 44));
            if (event.charCode == 44) {
                teste=event.target.value;
                if (event.target.value.indexOf(",")>=-1) {
                    isnumber=false;
                }
            }
            return isnumber
        };

        $(document).ready(function() {
            $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
            $('#datatables-pessoa').DataTable({
                processing: true,
                serverSide: true,
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

                ajax: "{{ url('pessoas') }}",
                columns: [
                    { data: 'id', name: 'id',visible: false},
                    { data: 'nome', name: 'nome'},
                    { data: 'razao', name: 'razao'},
                    { data: 'cpfcnpj', name: 'cpfcnpj'},
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
                    text: 'Nova Pessoa',
                    className: 'btn btn-sm btn-primary align-items-center header-actions mx-1 row mt-50',
                    action: function ( e, dt, node, config ) {
                        criar();
                    },
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                    }
                    }
                ]
            });

            $('#datatables-pessoa tbody').on('click', 'a.btn_edit', function (e) {
                e.preventDefault();
                var row = $(this).closest('tr');
                var id = $('#datatables-pessoa').DataTable().row( row ).data().id;
                //novaurl='\{\{ url(conta/' + data + ') \}\}';
                editar(id);
                return;
            });
            $('#datatables-pessoa tbody').on('click', 'a.btn_del', function (e) {
                e.preventDefault();
                var row = $(this).closest('tr');
                var idpessoa = $('#datatables-pessoa').DataTable().row( row ).data().id;
                var nome = $('#datatables-pessoa').DataTable().row( row ).data().nome;
                //novaurl='\{\{ url(conta/' + data + ') \}\}';
                //alert(data);
                apagar(idpessoa,nome);
                return;
            });
            $('#div_cadastro_pessoa').on('shown.bs.modal', function() {
                $('#pessoa_nome').trigger('focus');
            });

        });

        function editar(id) {
            $('#tituloModalPessoa').text("Alterar pessoa");
            $('#btn_criar_atualizar_pessoa').text('Alterar');


            $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
            $.ajax({
                type: "post",
                url: "{{ url('pessoa/editar/#registro') }}".replace('#registro',id),
                data: "do=getInfo",
                success: function(result) {
                    $('#pessoa_id').val(result.id);
                    $('#pessoa_nome').val(result.nome);
                    $('#pessoa_razao').val(result.razao);
                    $('#pessoa_cpfcnpj').val(result.cpfcnpj);
                    $('#div_cadastro_pessoa').modal("show");
                },
                error: function(result) {
                    console.log('falha editar');
                }
            });
            return;
        }

        function criar() {
            $('#pessoa_id').val('');
            $('#pessoa_nome').val('');
            $('#pessoa_razao').val('');
            $('#pessoa_cpfcnpj').val('');
            $('#tituloModalPessoa').text("Criar pessoa");
            $('#btn_criar_atualizar_pessoa').text('Criar');
            $('#div_cadastro_pessoa').modal("show");
            return;
        }

        function apagar(id,pessoa) {
            //alert('entrou no apagar');
            if (confirm('Deseja apagar a conta '+pessoa+' realmente?')) {
                $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
                $.ajax({
                    type: "post",
                    url: "{{ url('pessoa/apagar/#registro') }}".replace('#registro',id),
                    data: "do=getInfo",
                    cache: false,
                    async: false,
                    success: function(result) {
                        //alert('sucesso');
                        $('#datatables-pessoa').DataTable().ajax.reload();
                    },
                    error: function(result) {
                        console.log('falha editar');
                    }
                });
            }
            return false;
        };

        $('#gravarPessoaForm').submit(function(event){
            event.preventDefault();
            if (!$('#pessoa_id').val()){
                id='novo';
            }else{
                id=$('#pessoa_id').val();
            }
            $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
            $.ajax({
                url: "{{ url('pessoa/gravar/#id') }}".replace('#id',id),
                type: "post",
                data: $(this).serialize(),
                dataType:'json',
                success: function(result) {
                    $('#pessoa_id').val('');
                    $('#nome').val('');
                    $('#razao').val('');
                    $('#cpfcnpj').val('');
                    $('#datatables-pessoa').DataTable().ajax.reload();
                    $('#div_cadastro_pessoa').modal("hide");
                },
                error: function(result) {
                    console.log("falha receber ");
                }
            });

        });


    </script>
