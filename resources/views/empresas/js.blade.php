
    <!-- BEGIN: Page Vendor JS-->

    <script src="vendors/js/tables/datatable/jquery.dataTables.min.js"></script>
    <script src="vendors/js/tables/datatable/datatables.bootstrap4.min.js"></script>
    <script src="vendors/js/tables/datatable/dataTables.responsive.min.js"></script>
    <script src="vendors/js/tables/datatable/datatables.buttons.min.js"></script>
    <script src="vendors/js/tables/datatable/buttons.bootstrap4.min.js"></script>
    <script src="vendors/js/forms/validation/jquery.validate.min.js"></script>
    <!-- END: Page Vendor JS-->
    <script src="vendors/js/forms/validation/jquery.validate.min.js"></script>

<script>

    function criar() {
        $('#empresa_id').val('');
        $('#empresa').val('');
        $('#cpfcnpj').val('');
        $('#empresa_tipo_pessoa').val("");
        $("#empreiteira").prop('checked', false);

        $('#tituloModalEmpresa').text("Criar entidade");
        $('#btn_criar_atualizar_empresa').text('Criar');
        $('#div_cadastro_empresa').modal("show");
        return;
    }
    function editar(id) {
        $('#tituloModalEmpresa').text("Alterar entidade");
        $('#btn_criar_atualizar_empresa').text('Alterar');

        $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
        $.ajax({
            type: "post",
            url: "{{ url('empresa/editar/#registro') }}".replace('#registro',id),
            data: "do=getInfo",
            success: function(result) {
                $('#empresa_id').val(result.id);
                $('#empresa').val(result.empresa);
                $('#cpfcnpj').val(result.cpfcnpj);
                $("#empreiteira").prop('checked', result.empreiteira);
                $('#empresa_tipo_pessoa').val(result.tipo_pessoa);
                $('#div_cadastro_empresa').modal("show");
            },
            error: function(result) {
                console.log('falha editar');
            }
        });
        return;
    }


    function apagar(id,empresa) {
        if (confirm('Deseja apagar a conta '+empresa+' realmente?')) {
            $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
            $.ajax({
                type: "post",
                url: "{{ url('empresa/apagar/#registro') }}".replace('#registro',id),
                data: "do=getInfo",
                success: function(result) {
                    $('#datatables-empresa').DataTable().ajax.reload();
                },
                error: function(result) {
                    console.log('falha editar');
                }
            });
        }
        return false;
    };

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
        $('#datatables-empresa').DataTable({
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

            ajax: "{{ url('empresas') }}",
            columns: [
                { data: 'id', name: 'id'},
                { data: 'empresa', name: 'empresa'},
                { data: 'cpfcnpj', name: 'cpfcnpj'},
                {},
                { data: 'empreiteira', name: 'empreiteira'},
                { defaultContent: '<div><a href="" class="btn_edit" >'+feather.icons['edit'].toSvg({ class: 'font-small-4' }) + ' </a>' +
                                    '<a href="" class="btn_del" >'+feather.icons['trash-2'].toSvg({ class: 'font-small-4' }) + '</a></div>'
                }

            ],
                columnDefs: [
                    {
                        targets: 0,
                        width: "4%",
                    },                    
                    {
                        targets: 1,
                        width: "50%",
                    },

                    {
                        targets: 2,
                        width: "20%",
                        render: function (data, type, full, meta) {
                            let cpfcnpj = full['cpfcnpj'];
                            return '<span class=" badge badge-pill badge-light-dark">'+ cpfcnpj +'</span>';
                        }
                    },
                    {
                        targets: 3,
                        width: "10%",
                        render: function (data, type, full, meta) {
                            var $tipo_pessoa = full['tipo_pessoa'];
                            if ($tipo_pessoa === "J") {
                                return '<span class=" badge badge-pill badge-glow badge-secondary">Jurídica</span>';
                            }else if ($tipo_pessoa === "A"){
                                return '<span class=" badge badge-pill badge-glow badge-secondary">Física</span> <span class=" badge badge-pill badge-glow badge-secondary">Jurídica</span>';
                            }else{
                                return '<span class=" badge badge-pill badge-glow badge-secondary">Física</span>';
                            }
                        }
                    },
                    {
                        targets: 4,
                        width: "6%",
                        render: function (data, type, full, meta) {
                            if (full['empreiteira'] === 1) {
                                return '<span class="badge badge-pill badge-glow badge-secondary">Sim</span>';
                            }else{
                                return '<span class=" badge badge-pill badge-light-dark">Não</span>';
                            }
                        }
                    },

                    {
                        targets: 5,
                        width: "10%",

                    },
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
                text: 'Nova Entidade',
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

        $('#datatables-empresa tbody').on('click', 'a.btn_edit', function (e) {
            e.preventDefault();
            var row = $(this).closest('tr');
            var id = $('#datatables-empresa').DataTable().row( row ).data().id;
            //novaurl='\{\{ url(conta/' + data + ') \}\}';
            editar(id);
            return;
        });
        $('#datatables-empresa tbody').on('click', 'a.btn_del', function (e) {
            e.preventDefault();
            var row = $(this).closest('tr');
            var idempresa = $('#datatables-empresa').DataTable().row( row ).data().id;
            var empresa = $('#datatables-empresa').DataTable().row( row ).data().empresa;
            apagar(idempresa,empresa);
            return;
        });
    });


    $('#gravarEmpresaForm').submit(function(event){
        event.preventDefault();
        if (!$('#empresa_id').val()){
            id='novo';
        }else{
            id=$('#empresa_id').val();
        }
        alert($(this).serialize());

        $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
        $.ajax({
            url: "{{ url('empresa/gravar/#id') }}".replace('#id',id),
            type: "post",
            data: $(this).serialize(),
            dataType:'json',
            success: function(result) {

                $('#empresa_id').val('');
                $('#empresa').val('');
                $('#cpfcnpj').val('');
                $('#empresa_tipo_pessoa').val("");
                $( "#empreiteira").prop('checked', false);
                $('#datatables-empresa').DataTable().ajax.reload();
                $('#div_cadastro_empresa').modal("hide");
            },
            error: function(result) {
                console.log("falha receber ");
            }
        });
    });

    $('#div_cadastro_empresa').on('shown.bs.modal', function() {
        $('#empresa').trigger('focus');
    });

</script>
