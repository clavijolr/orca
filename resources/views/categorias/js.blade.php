
    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.bootstrap4.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.responsive.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.bootstrap4.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
    <!-- END: Page Vendor JS-->


    <script type="text/javascript">

        function criar() {

            atualiza_grupo();
            $('#categoria_id').val('');
            $('#categoria_grupo_id').val('');
            $('#categoria').val('');
            $('tituloModalCategoria').text("Criar categoria");
            $('#btn_criar_atualizar_categoria').text('Criar');

            $('#div_cadastro_categoria').modal("show");
            return;
        }

        function editar(id) {

            $('tituloModalCategoria').text("Alterar categoria");
            $('#btn_criar_atualizar_categoria').text('Alterar');
            $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
            $.ajax({
                type: "post",
                url: "{{ url('categoria/editar/#registro') }}".replace('#registro',id),
                data: "do=getInfo",
                success: function(result) {
                    $('#categoria_id').val(result.id);
                    $('#categoria').val(result.categoria);
                    $('#categoria_grupo_id').val(result.grupo_id);
                    atualiza_grupo(result.grupo_id);
                    $('#div_cadastro_categoria').modal("show");
                },
                error: function(result) {
                    console.log('falha editar');
                }
            });
            return;
        }

        function apagar(id,categoria) {
            if (confirm('Deseja apagar a conta '+categoria+' realmente?')) {
                $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
                $.ajax({
                    type: "post",
                    url: "{{ url('categoria/apagar/#registro') }}".replace('#registro',id),
                    data: "do=getInfo",
                    cache: false,
                    async: false,
                    success: function(result) {
                        $('#datatables-categoria').DataTable().ajax.reload();
                    },
                    error: function(result) {
                        console.log('falha editar');
                    }
                });
            }
            return false;
        };

        function atualiza_grupo(grupo_id_atual='')
        {

            $("#categoria_grupo_id").empty();
            var option = "<option value='' disabled hidden>Escolha um grupo</option>";
            $("#categoria_grupo_id").append(option);

            $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
            $.ajax({
                url: "{{ url('categoria/grupos') }}",
                type: "post",
                dataType:'json',
                success: function(result) {
                    var len = 0;
                    if (result.grupos != null) {
                        len = result.grupos.length;
                    }
                    if (len>0) {
                        var optionteste ='';
                        for (var i = 0; i<len; i++) {
                            var id = result.grupos[i].id;
                            var grupo = result.grupos[i].grupo;
                            var option = "<option value='" + id + (grupo_id_atual === id ? "' selected >" : "'>")+  grupo + "</option>";
                            optionteste += option +'\n';
                            $("#categoria_grupo_id").append(option);
                        }
                    }
                },
                error: function(result) {

                }
            });

        };

        $(document).ready(function() {
            $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
            
            $('#datatables-categoria').DataTable({
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

                ajax: "{{ url('categorias') }}",
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'grupo.grupo', name: 'grupo'},
                    { data: 'categoria', name: 'categoria'},
                    { data: 'grupo.tipo_pessoa', name: 'tipo_pessoa'},
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
                        targets: 3,
                        width: "10%",
                        render: function (data, type, full, meta) {

                            var $tipo_pessoa = full['grupo']['tipo_pessoa'];

                            if ($tipo_pessoa === "J") {
                                return '<span class=" badge badge-pill badge-glow badge-secondary">Pessoa Jurídica</span>';
                            }else if ($tipo_pessoa === "A"){
                                return '<span class=" badge badge-pill badge-glow badge-secondary">Pessoa Física</span> <span class=" badge badge-pill badge-glow badge-secondary">Jurídica</span>';
                            }else{
                                return '<span class=" badge badge-pill badge-glow badge-secondary">Pessoa Física</span>';
                            }

                        }
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
                    text: 'Nova Categoria',
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

            // $('#datatables-categoria').DataTable({
            //     processing: true,
            //     serverSide: true,
            //     lengthChange: false,
            //     language : {
            //         decimal: ",",
            //         thousands: ",",
            //         sEmptyTable: "Nenhum registro encontrado",
            //         sInfo: "Mostrando  _START_ até _END_ de _TOTAL_ Resultados",
            //         sInfoEmpty: "Mostrando 0 até 0 de 0 registros",
            //         sInfoFiltered: "(Filtrados de MAX registros)",
            //         sInfoPostFix: "",
            //         sInfoThousands: ".",
            //         sLengthMenu: "_MENU_ resultados por página",
            //         sLoadingRecords: "Carregando...",
            //         sProcessing: "Processando...",
            //         sZeroRecords: "Nenhum registro encontrado",
            //         sSearch: "",
            //         sSearchPlaceholder: "Digite a procura",
            //         oPaginate: {
            //             sNext: "Próximo",
            //             sPrevious: "Anterior",
            //             sFirst: "Primeiro",
            //             sLast: "Último"
            //         },
            //         oAria: {
            //             sSortAscending: ": Ordenar colunas de forma ascendente",
            //             sSortDescending: ": Ordenar colunas de forma descendente"
            //         }
            //     },

            //     ajax: "{{ url('categorias') }}",
            //     columns: [
            //         { data: 'id', name: 'id'},
            //         { data: 'categoria', name: 'categoria'},
            //         { data: 'grupo.tipo_pessoa', name: 'tipo_pessoa'},
            //         { data: 'grupo.grupo', name: 'grupo'},
            //         { defaultContent: 
            //             '<div><a href="" class="btn_edit" >'+feather.icons['edit'].toSvg({ class: 'font-small-4' }) + ' </a>' +
            //             '<a href="" class="btn_del" >'+feather.icons['trash-2'].toSvg({ class: 'font-small-4' }) + '</a></div>'
            //         }
            //     ],
            //     columnDefs: [
            //         {
            //             targets: 0,
            //             width: "4%",
            //         },                    
            //         {
            //             targets: 1,
            //             width: "35%",
            //         },

            //         {
            //             targets: 2,
            //             width: "35%",
            //             render: function (data, type, full, meta) {
            //                 let cpfcnpj = full['cpfcnpj'];
            //                 return '<span class=" badge badge-pill badge-light-dark">'+ cpfcnpj +'</span>';
            //             }
            //         },
            //         {
            //             targets: 3,
            //             width: "10%",
            //             render: function (data, type, full, meta) {
            //                 var $tipo_pessoa = full['tipo_pessoa'];
            //                 if ($tipo_pessoa === "J") {
            //                     return '<span class=" badge badge-pill badge-glow badge-secondary">Jurídica</span>';
            //                 }else if ($tipo_pessoa === "A"){
            //                     return '<span class=" badge badge-pill badge-glow badge-secondary">Física</span> <span class=" badge badge-pill badge-glow badge-secondary">Jurídica</span>';
            //                 }else{
            //                     return '<span class=" badge badge-pill badge-glow badge-secondary">Física</span>';
            //                 }
            //             }
            //         },
            //         {
            //             targets: 4,
            //             width: "6%",

            //         },

            //         {
            //             targets: 5,
            //             width: "10%",

            //         },
            //     ],            
            //     order: [
            //         [0, 'desc'],

            //     ],
            //     dom:
            //         '<"d-flex justify-content-between align-items-center header-actions mx-1 row mt-75"' +
            //         '<"col-lg-12 col-xl-6" l>' +
            //         '<"col-lg-12 col-xl-6 pl-xl-75 pl-0"<"dt-action-buttons text-xl-right text-lg-left text-md-right text-left d-flex align-items-center justify-content-lg-end align-items-center flex-sm-nowrap flex-wrap mr-1"<"mr-1"f>B>>' +
            //         '>t' +
            //         '<"d-flex justify-content-between mx-2 row mb-1"' +
            //         '<"col-sm-12 col-md-6"i>' +
            //         '<"col-sm-12 col-md-6"p>' +
            //         '>',
            //     // Buttons with Dropdown
            //     buttons: [
            //         {
            //             text: 'Nova Categoria',
            //             className: 'btn btn-sm btn-primary align-items-center header-actions mx-1 row mt-50',

            //             action: function ( e, dt, node, config ) {
            //                 criar();
            //             },
            //             init: function (api, node, config) {
            //                 $(node).removeClass('btn-secondary');
            //             }
            //         }
            //     ]
            // });


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
                apagar(idcategoria,categoria);
                return;
            });
        });

        $('#div_cadastro_categoria').on('shown.bs.modal', function() {
            $('#categoria').trigger('focus');
        });

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
                    $('#categoria_grupo_id').val('');
                    $('#categoria').val('');
                    $('#datatables-categoria').DataTable().ajax.reload();
                    $('#div_cadastro_categoria').modal("hide");
                },
                error: function(result) {
                    console.log("falha receber ");
                }
            });

        });

    </script>
