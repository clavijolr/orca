    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.bootstrap4.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.responsive.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.bootstrap4.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
    <!-- END: Page Vendor JS-->


    <script type="text/javascript">
        $(document).ready(function() {
            $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
            $('#datatables-subcategoria').DataTable({
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

                ajax: "{{ url('subcategorias') }}",
                columns: [
                    { data: 'id', name: 'id',visible: false },
                    { data: 'categoria.categoria', name: 'categoria'},
                    { data: 'subcategoria', name: 'subcategoria'},
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
                    text: 'Nova Subcategoria',
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

            $('#datatables-subcategoria tbody').on('click', 'a.btn_edit', function (e) {
                e.preventDefault();
                var row = $(this).closest('tr');
                var id = $('#datatables-subcategoria').DataTable().row( row ).data().id;
                //novaurl='\{\{ url(conta/' + data + ') \}\}';
                editar(id);
                return;
            });
            $('#datatables-subcategoria tbody').on('click', 'a.btn_del', function (e) {
                e.preventDefault();
                var row = $(this).closest('tr');
                var idsubcategoria = $('#datatables-subcategoria').DataTable().row( row ).data().id;
                var subcategoria = $('#datatables-subcategoria').DataTable().row( row ).data().subcategoria;
                //novaurl='\{\{ url(conta/' + data + ') \}\}';
                //alert(data);
                apagar(idsubcategoria,subcategoria);
                return;
            });
            $('#div_cadastro_subcategoria').on('shown.bs.modal', function() {
                $('#subcategoria').trigger('focus');
            });

        });

        $('#gravarSubcategoriaForm').submit(function(event){
            event.preventDefault();
                    //alert( $(this).serialize());
            if (!$('#subcategoria_id').val()){
                id='novo';
            }else{
                id=$('#subcategoria_id').val();
            }
            $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
            $.ajax({
                url: "{{ url('subcategoria/gravar/#id') }}".replace('#id',id),
                type: "post",
                data: $(this).serialize(),
                dataType:'json',
                success: function(result) {
                    //alert( result);
                    $('#subcategoria_id').val('');
                    $('#subcategoria_categoria_id').val('');
                    $('#subcategoria').val('');
                    $('#datatables-subcategoria').DataTable().ajax.reload();
                    $('#div_cadastro_subcategoria').modal("hide");
                },
                error: function(result) {
                    //alert( result);
                    console.log("falha receber dados");
                }
            });

        });


        function editar(id) {
            $('#tituloModalSubcategoria').text("Alterar subcategoria");
            $('#btn_criar_atualizar_subcategoria').text('Alterar');
            $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
            $.ajax({
                type: "post",
                url: "{{ url('subcategoria/editar/#registro') }}".replace('#registro',id),
                data: "do=getInfo",
                success: function(result) {

                    $('#subcategoria_id').val(result.id);
                    $('#subcategoria').val(result.subcategoria);
                    atualiza_categoria(result.categoria_id);
                    $('#subcategoria_categoria_id').val(result.categoria_id);
                    $('#div_cadastro_subcategoria').modal("show");
                },
                error: function(result) {
                    console.log('falha editar');
                }
            });

            return;
        }

        function criar() {
            atualiza_categoria();
            $('#subcategoria_id').val('');
            $('#subcategoria_categoria_id').val('');
            $('#subcategoria').val('');
            $('#tituloModalSubcategoria').text("Criar subcategoria");
            $('#btn_criar_atualizar_subcategoria').text('Criar');
            $('#div_cadastro_subcategoria').modal("show");
            return;
        }

        function apagar(id,subcategoria) {
            //alert('entrou no apagar');
            if (confirm('Deseja apagar a conta '+subcategoria+' realmente?')) {
                $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
                $.ajax({
                    type: "post",
                    url: "{{ url('subcategoria/apagar/#registro') }}".replace('#registro',id),
                    data: "do=getInfo",
                    cache: false,
                    async: false,
                    success: function(result) {
                        //alert('sucesso');
                        $('#datatables-subcategoria').DataTable().ajax.reload();
                    },
                    error: function(result) {
                        console.log('falha apagar');
                    }
                });
            }
            return false;
        };


        function atualiza_categoria(categoria_id_atual='')
        {
            $("#subcategoria_categoria_id").empty();
            var option = "<option value='' disabled hidden>Escolha uma categoria</option>";
            $("#subcategoria_categoria_id").append(option);

            $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
            $.ajax({
                url: "{{ url('subcategoria/categorias') }}",
                type: "post",
                dataType:'json',
                success: function(result) {
                    var len = 0;
                    if (result.categorias != null) {
                        len = result.categorias.length;
                    }
                    if (len>0) {
                        var optionteste ='';
                        for (var i = 0; i<len; i++) {
                            var id = result.categorias[i].id;
                            var categoria = result.categorias[i].categoria;
                            var option = "<option value='" + id + (categoria_id_atual === id ? "' selected >" : "'>")+  categoria + "</option>";
                            optionteste += option +'\n';
                            $("#subcategoria_categoria_id").append(option);
                        }

                    }
                },
                error: function(result) {

                }
            });

        };

    </script>
