
    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.bootstrap4.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.responsive.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.bootstrap4.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
    <!-- END: Page Vendor JS-->

    <script type="text/javascript">



        function editar(id) {
            $('#tituloModalGrupo').text("Alterar grupo");
            $('#btn_criar_atualizar_grupo').text('Alterar');

            $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
            $.ajax({
                type: "post",
                url: "{{ url('grupo/editar/#registro') }}".replace('#registro',id),
                data: "do=getInfo",
                success: function(result) {
                    $('#grupo_id').val(result.id);
                    $('#grupo_grupo').val(result.grupo);
                    $('#grupo_tipo').val(result.tipo);
                    $('#grupo_tipo_pessoa').val(result.tipo_pessoa);
                    $('#cpfcnpj').val(result.cpfcnpj);
                    $('#div_cadastro_grupo').modal("show");
                },
                error: function(result) {
                    console.log('falha editar');
                }
            });
            return;
        }

        function criar() {
            $('#grupo_id').val('');
            $('#grupo_grupo').val('');
            $('#cpfcnpj').val('');
            $('#grupo_tipo').val('');
            $('#grupo_tipo_pessoa').val('');
            $('#tituloModalGrupo').text("Criar grupo");
            $('#btn_criar_atualizar_grupo').text('Criar');
            $('#div_cadastro_grupo').modal("show");
            return;
        }


        function apagar(id,grupo) {
            if (confirm('Deseja apagar a conta ' + grupo + ' realmente?')) {
                $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
                $.ajax({
                    type: "post",
                    url: "{{ url('grupo/apagar/#registro') }}".replace('#registro',id),
                    data: "do=getInfo",
                    cache: false,
                    async: false,
                    success: function(result) {
                        $('#datatables-grupo').DataTable().ajax.reload();
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

        $(document).ready(function() {
            $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
            $('#datatables-grupo').DataTable({
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

                ajax: "{{ url('grupos') }}",
                columns: [
                    { data: 'id', name: 'id',visible: false},
                    { data: 'grupo', name: 'grupo'},
                    { //data: 'tipo', name: 'tipo'
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
                    { //data: 'tipo', name: 'tipo'
                        render: function (data, type, full, meta) {
                            var $status_tipo = full['tipo'];
                            var $status = {
                            'D': { title: 'Entrada', class: 'badge-glow badge-success' },
                            'C': { title: 'Saida', class: 'badge-glow badge-danger' },
                            };
                            if (typeof $status[$status_tipo] === 'undefined') {
                            return data;
                            }
                            return (
                            '<span class="badge badge-pill ' +
                            $status[$status_tipo].class +
                            '">' +
                            $status[$status_tipo].title +
                            '</span>'
                            );
                        }
                    },
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
                    text: 'Novo Grupo',
                    className: 'btn btn-sm btn-primary align-items-center header-actions mx-1 row mt-50',
                    action: function ( e, dt, node, config ) {
                        criar();
                    },
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                    }
                    }
                ],
                /*
                "fnRowCallback": function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                    if (aData['tipo'] == 'C') {
                        $('td', nRow).addClass("table-danger");
                    } else  {
                        $('td', nRow).addClass("table-success");
                    }
                }
                */
            });

            $('#datatables-grupo tbody').on('click', 'a.btn_edit', function (e) {
                e.preventDefault();
                var row = $(this).closest('tr');
                var id = $('#datatables-grupo').DataTable().row( row ).data().id;
                //novaurl='\{\{ url(conta/' + data + ') \}\}';
                editar(id);
                return;
            });
            $('#datatables-grupo tbody').on('click', 'a.btn_del', function (e) {
                e.preventDefault();
                var row = $(this).closest('tr');
                var id = $('#datatables-grupo').DataTable().row( row ).data().id;
                var grupo = $('#datatables-grupo').DataTable().row( row ).data().grupo;
                //novaurl='\{\{ url(conta/' + data + ') \}\}';
                //alert(data);
                apagar(id,grupo);
                return;
            });


        });

        $('#gravarGrupoForm').submit(function(event){
            event.preventDefault();
            if (!$('#grupo_id').val()){
                id='novo';
            }else{
                id=$('#grupo_id').val();
            }
            $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
            $.ajax({
                url: "{{ url('grupo/gravar/#id') }}".replace('#id',id),
                type: "post",
                data: $(this).serialize(),
                dataType:'json',
                success: function(result) {
                    $('#grupo_id').val('');
                    $('#grupo_grupo').val('');
                    $('#grupo_tipo').val('');
                    $('#grupo_tipo_pessoa').val('');
                    $('#datatables-grupo').DataTable().ajax.reload();
                    $('#div_cadastro_grupo').modal("hide");
                },
                error: function(result) {
                    alert('falha ao gravar');
                    console.log("falha receber ");
                }
            });

        });

        $('#div_cadastro_grupo').on('shown.bs.modal', function() {
            $('#grupo_grupo').trigger('focus');
        });

    </script>
