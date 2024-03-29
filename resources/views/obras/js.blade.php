
    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.bootstrap4.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.responsive.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.bootstrap4.min.js')) }}"></script>

    <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
    <script src="{{ asset('vendors/js/pickers/flatpickr/pt.js') }}"></script>

    <!-- END: Page Vendor JS-->
    <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
    <script type="text/javascript">
        const $dta_ini = $("#obra_data_inicio").flatpickr({
            locale: "pt" ,
            defaultdate:"null",            
            altInput: true,
            dateFormat: "Y-m-d",
        });

        const $dta_fim = $("#obra_data_fim").flatpickr({
            locale: "pt" ,
            defaultdate:"null",            
            altInput: true,
            dateFormat: "Y-m-d",
            
        });

        var filtroTeclas = function(event) 
        {
            isnumber=((event.charCode >= 48 && event.charCode <= 57) || (event.keyCode == 45 || event.charCode == 44));
            if (event.charCode == 44) {
                teste=event.target.value;
                if (event.target.value.indexOf(",")>-1) {
                    isnumber=false;
                }
            }
            return isnumber
        };

        function criar() 
        {
            $('#obra_id').val('');
            $('#obra_descricao').val('');
            $dta_ini.clear();
            $dta_fim.clear();
            $('tituloModalObra').text("Criar Obra");
            $('#btn_criar_atualizar_obra').text('Criar');
            $('#div_cadastro_obra').modal("show");
            
            return;
        }
        function editar(id) 
        {
            $('tituloModalObra').text("Alterar Obra");
            $('#btn_criar_atualizar_obra').text('Alterar');
            $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
            $.ajax({
                type: "post",
                url: "{{ url('obra/editar/#registro') }}".replace('#registro',id),
                data: "do=getInfo",
                success: function(result) {
                    $('#obra_id').val(result.id);
                    $('#obra_descricao').val(result.descricao);
                    if(result.data_inicio){
                        $dta_ini.setDate(result.data_inicio.substring(0,10), true, 'Y/m/d');
                    }else(
                        $dta_ini.clear()
                    )
                    if(result.data_fim){
                        $dta_fim.setDate(result.data_fim.substring(0,10), true, 'Y/m/d');
                    }else{
                        $dta_fim.clear();
                    }
                    $('#div_cadastro_obra').modal("show");

                },
                error: function(result) {
                    //console.log(result);
                }
            });
            return;
        }
        function apagar(id,descricao) 
        {
            if (confirm('Deseja apagar a obra '+descricao+' realmente?')) {
                $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
                $.ajax({
                    type: "post",
                    url: "{{ url('obra/apagar/#registro') }}".replace('#registro',id),
                    data: "do=getInfo",
                    success: function(result) {
                        $('#datatables-obra').DataTable().ajax.reload();
                    },
                    error: function(result) {
                        console.log('falha apagar');
                    }
                });
            }
            return false;
        };

        $(document).ready(function() {
            $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
            $('#datatables-obra').DataTable({
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

                ajax: "{{ url('obras') }}",
                columns: [
                    { data: 'id', name: 'id'},
                    { data: 'descricao', name: 'descricao'},
                    { data: 'saldo_final', render: $.fn.dataTable.render.number( '.', ',', 2,'R$ ' ), name: 'saldo_final'},
                    { data: 'data_inicio', name: 'data_inicio'},
                    { data: 'data_fim', name: 'data_fim'},
                    { defaultContent: '<div><a href="" class="btn_edit" >'+feather.icons['edit'].toSvg({ class: 'font-small-4' }) + ' </a>' +
                                    '<a href="" class="btn_del" >'+feather.icons['trash-2'].toSvg({ class: 'font-small-4' }) + '</a></div>'
                    }
                ],
                columnDefs: [
                    {
                        targets: 0,
                        width: "5%",
                    },                    
                    {
                        targets: 1,
                        width: "55%",
                    },

                    {
                        targets: 2,
                        width: "10%",
                    },
                    {
                        targets: 3,
                        width: "10%",
                        render: function (data, type, full, meta) {
                            const meses = ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul","Ago","Set","Out","Nov","Dez"];
                            var data = new Date(full['data_inicio']);
                            let dataFormatada = ((data.getDate() + " " + meses[(data.getMonth())] + " " + data.getFullYear()));
                            if (!full['data_inicio']){
                                return '<span class=" badge badge-pill badge-light-dark">'+ dataFormatada +'</span>';
                            }else{
                                return '<span class=" badge badge-pill badge-primary">'+ dataFormatada +'</span>';
                            }
                        }
                    },
                    {
                        targets: 4,
                        width: "10%",

                        render: function (data, type, full, meta) {
                            const meses = ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul","Ago","Set","Out","Nov","Dez"];
                            let dataFormatada;
                            let retorno;
                            if(full['data_fim']){
                                var data = new Date(full['data_fim']);
                                dataFormatada = ((data.getDate() + " " + meses[(data.getMonth())] + " " + data.getFullYear()));
                                retorno ='<span class=" badge badge-pill d-block badge-light-secondary">'+ dataFormatada +'</span>';
                            }else{
                                dataFormatada = ' - - ';
                                retorno = '<span class=" badge badge-pill d-block badge-light-primary">'+ dataFormatada +'</span>';
                            }
                            

                            return retorno;
                        }
                    },
                    {
                        targets: 5,
                        width: "10%",

                    },
                ],
                order: [
                    //[0, 'asc'],
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
            $('#datatables-obra tbody').on('click', 'a.btn_edit', function (e) {
                e.preventDefault();
                var row = $(this).closest('tr');
                var id = $('#datatables-obra').DataTable().row( row ).data().id;
                //novaurl='\{\{ url(obra/' + data + ') \}\}';
                editar(id);
                return;
            });
            $('#datatables-obra tbody').on('click', 'a.btn_del', function (e) {
                e.preventDefault();
                var row = $(this).closest('tr');
                var id = $('#datatables-obra').DataTable().row( row ).data().id;
                var descricao = $('#datatables-obra').DataTable().row( row ).data().descricao;
                //novaurl='\{\{ url(obra/' + data + ') \}\}';
                apagar(id,descricao);
                return;
            });
        });

        $('#gravarObraForm').submit(function(event){
            event.preventDefault();
            if (!$('#obra_id').val()){
                id='novo';
            }else{
                id=$('#obra_id').val();
            }
            $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
            $.ajax({
                url: "{{ url('obra/gravar/#id') }}".replace('#id',id),
                type: "post",
                data: $(this).serialize(),
                dataType:'json',
                success: function(result) {
                    //console.log(result);

                    $('#obra_id').val('');
                    $('#obra_descricao').val('');

                    $('#datatables-obra').DataTable().ajax.reload();
                    $('#div_cadastro_obra').modal("hide");
                },
                error: function(result) {
                    console.log(result);
                }
            });

        });

        $('#div_cadastro_obra').on('shown.bs.modal', function() {
            $('#obra_descricao').trigger('focus');
        });

    </script>
