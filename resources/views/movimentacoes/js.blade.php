    <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.date.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/pickers/pickadate/legacy.js')) }}"></script>
    {{-- <script src="{{ asset(mix('js/scripts/forms/pickers/form-pickers.js')) }}"></script> --}}

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.bootstrap4.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.responsive.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.bootstrap4.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
    <!-- END: Page Vendor JS-->
    <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>

    <script src="{{asset('js/scripts/components/components-navs.js')}}"></script>

<script type="text/javascript">

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

// FORM DE CADASTROS
    $('#form_movimentacao').submit(function(event)
    {
        event.preventDefault();
        //console.log($(this).serialize());
        $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});

        $.ajax({
            url: "{{ url('movimentacao/nova') }}",
            type: "post",
            data: $(this).serialize(),
            dataType:'json',
            success: function(result) {
                $('#mv_emssao').val('');
                $('#mv_vencimento').val('');
                $('#mv_baixa').val('');
                $('#mv_empresa_id').val('');
                $('#mv_conta_id').val('');
                $('#mv_grupo_id').val('');
                $('#mv_categoria_id').val('');
                $('#mv_subcategoria_id').val('');
                $('#mv_pessoa_id').val('');
                $('#mv_descricao').val('');
                $('#mv_tipo').val('');
                $('#mv_valor').val('');
                $('#datatables-movimentacao').DataTable().ajax.reload();
            },
            error: function(result) {

                //alert('falhou')
                console.log(result);
            }
        });

    });
    $('#gravarEmpresaForm').submit(function(event)
    {
        event.preventDefault();
        id='novo';
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
                atualiza_empresa();
                $('#div_cadastro_empresa').modal("hide");
                $("#mv_empresa_id").focus();
            },
            error: function(result) {
                //console.log("falha receber ");
            }
        });

    });
    $('#gravarContaForm').submit(function(event)
    {
        event.preventDefault();
        id='novo';
        $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
        $.ajax({
            url: "{{ url('conta/gravar/novo') }}",
            type: "post",
            data: $(this).serialize(),
            dataType:'json',
            success: function(result) {
                $('#conta_id').val('');
                $('#conta_descricao').val('');
                $('#agencia').val('');
                $('#conta').val('');
                $('#conta_saldo').val('');
                atualiza_conta();
                $('#div_cadastro_conta').modal("hide");
                $("#mv_conta_id").focus();

            },
            error: function(result) {
                //console.log("falha receber ");
            }
        });

    });
    $('#gravarGrupoForm').submit(function(event)
    {
        event.preventDefault();
        $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
        $.ajax({
            url: "{{ url('grupo/gravar/novo') }}",
            type: "post",
            data: $(this).serialize(),
            dataType:'json',
            success: function(result) {
                $('#grupo_id').val('');
                $('#grupo_grupo').val('');
                $('#grupo_tipo').val('');
                atualiza_grupo();
                $('#div_cadastro_grupo').modal("hide");
                $("#mv_grupo_id").focus();
            },
            error: function(result) {

                //console.log("falha receber ");
            }
        });
    });
    $('#gravarCategoriaForm').submit(function(event)
    {
        event.preventDefault();
        id='novo';
        $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
        $.ajax({
            url: "{{ url('categoria/gravar/#id') }}".replace('#id',id),
            type: "post",
            data: $(this).serialize(),
            dataType:'json',
            success: function(result) {
                atualiza_categoria();
                atualiza_subcategoria();
                $('#div_cadastro_categoria').modal("hide");
                $("#mv_categoria_id").focus();
            },
            error: function(result) {
                //console.log("falha receber ");
            }
        });

    });
    $('#gravarSubcategoriaForm').submit(function(event){
        event.preventDefault();
        id='novo';
        $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
        $.ajax({
            url: "{{ url('subcategoria/gravar/#id') }}".replace('#id',id),
            type: "post",
            data: $(this).serialize(),
            dataType:'json',
            success: function(result) {
                atualiza_subcategoria();
                $('#div_cadastro_subcategoria').modal("hide");
                $("#mv_categoria_id").focus();
            },
            error: function(result) {
                //console.log("falha receber dados");
            }
        });

    });
    $('#gravarPessoaForm').submit(function(event)
    {
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
                atualiza_pessoa();
                $('#div_cadastro_pessoa').modal("hide");
                $("#mv_pessoa_id").focus();
            },
            error: function(result) {
                //console.log("falha receber ");
            }
        });

    });

    // AJAX DOS CADASTROS
    function atualiza_empresa()
    {
        $("#mv_empresa_id").empty();
        var option = "<option value='' selected disabled hidden>Escolha a Empresa</option>";
        $("#mv_empresa_id").append(option);

        $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
        $.ajax({
            url: "{{ url('movimentacao/get_empresa') }}",
            type: "post",
            dataType:'json',
            success: function(result) {
                var len = 0;
                if (result.empresas != null) {
                    len = result.empresas.length;
                }
                if (len>0) {
                    for (var i = 0; i<len; i++) {
                        var id = result.empresas[i].id;
                        var empresa = result.empresas[i].empresa;
                        var tipo_pessoa = result.empresas[i].tipo_pessoa;
                        var option = "<option tipo_pessoa ='" + tipo_pessoa + "' value='" + id + "'>"+empresa+"</option>";
                        $("#mv_empresa_id").append(option);
                    }
                }
            },
            error: function(result) {
                //console.log("falha receber empresa");
            }
        });

    };
    function atualiza_conta()
    {
        $("#mv_conta_id").empty();
        var option = "<option value='' selected disabled hidden>Escolha uma conta</option>";
        $("#mv_conta_id").append(option);

        $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
        $.ajax({
            url: "{{ url('movimentacao/get_conta') }}",
            type: "post",
            dataType:'json',
            success: function(result) {
                var len = 0;
                if (result.contas != null) {
                    len = result.contas.length;
                }
                if (len>0) {
                    for (var i = 0; i<len; i++) {
                        var id = result.contas[i].id;
                        var descricao = result.contas[i].descricao;
                        var option = "<option value='"+id+"'>" + descricao + "</option>";
                        $("#mv_conta_id").append(option);
                    }
                }

            },
            error: function(result) {
                //console.log("falha receber contas");
            }
        });
    };

    function atualiza_grupo()
    {
        $("#mv_grupo_id").empty();
        var option = "<option value='' selected disabled hidden>Escolha um grupo</option>";
        $("#mv_grupo_id").append(option);

        if ($("#mv_empresa_id").val() > 0) {
            var tipo_pessoa  = $("#mv_empresa_id").find(':selected').attr('tipo_pessoa');
            $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
            $.ajax({
                url: "{{ url('movimentacao/get_grupo/#registro') }}".replace('#registro',tipo_pessoa),
                type: "post",
                dataType:'json',
                success: function(result) {
                    var len = 0;
                    if (result.grupos != null) {
                        len = result.grupos.length;
                    }
                    if (len>0) {
                        for (var i = 0; i<len; i++) {
                            var id = result.grupos[i].id;
                            var grupo = result.grupos[i].grupo;
                            var tipo = result.grupos[i].tipo;
                            var option = "<option tipo='" + tipo + "' value='" + id + "'>" + grupo + "</option>";
                            $("#mv_grupo_id").append(option);
                        }
                    }
                },
                error: function(result) {
                    //console.log("falha receber contas");
                }
            });
        }
    };

    function atualiza_categoria()
    {
        $("#mv_categoria_id").empty();
        var option = "<option value='' selected disabled hidden>Escolha uma categoria</option>";
        $("#mv_categoria_id").append(option);

        if ($("#mv_grupo_id").val() > 0) {

            var grupo_id = $('#mv_grupo_id').val();

            $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
            $.ajax({
                url: "{{ url('movimentacao/get_categoria/#registro') }}".replace('#registro',grupo_id),
                type: "post",
                dataType:'json',
                success: function(result) {
                    var len = 0;
                    if (result.categorias != null) {
                        len = result.categorias.length;
                    }
                    if (len>0) {
                        for (var i = 0; i<len; i++) {
                            var id = result.categorias[i].id;
                            var categoria = result.categorias[i].categoria;
                            var option = "<option value='" + id + "'>" + categoria + "</option>";
                            $("#mv_categoria_id").append(option);
                        }
                    }
                },
                error: function(result) {
                    //console.log("falha receber contas");
                }
            });
        }else{
            $("#mv_categoria_id").empty();
            var option = "<option value='' selected disabled hidden>Escolha uma categoria</option>";
            $("#mv_categoria_id").append(option);
        }
    }

    function atualiza_subcategoria()
    {
        $("#mv_subcategoria_id").empty();
        var option = "<option value='' selected disabled hidden>Escolha uma subcategoria</option>";
        $("#mv_subcategoria_id").append(option);
        $('#mv_subcategoria_id').prop('disabled', 'disabled');


        var categoria_id = $('#mv_categoria_id').val();
        if (categoria_id > 0) {
            $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
            $.ajax({
                type: "post",
                url: "{{ url('movimentacao/get_subcategoria/#registro') }}".replace('#registro',categoria_id),
                data: "do=getInfo",

                success: function(result) {
                    var len = 0;
                    if (result.subcategorias != null) {
                        len = result.subcategorias.length;
                    }
                    if (len>0) {
                        $("#mv_subcategoria_id").empty();
                        var option = "<option value='' selected disabled hidden>Escolha uma subcategoria</option>";
                        $("#mv_subcategoria_id").append(option);
                        for (var i = 0; i<len; i++) {
                            var id = result.subcategorias[i].id;
                            var subcategoria = result.subcategorias[i].subcategoria;
                            var option = "<option value='" + id + "'>" + subcategoria + "</option>";
                            $("#mv_subcategoria_id").append(option);
                        }
                        $('#mv_subcategoria_id').prop('disabled', false);
                    }
                },
                error: function(result) {
                    //
                }
            });
        }
    };
    function atualiza_pessoa()
    {
        $("#mv_pessoas_id").empty();
        var option = "<option value='' selected disabled hidden>Escolha uma pessoa</option>";
        $("#mv_pessoas_id").append(option);

        $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
        $.ajax({
            url: "{{ url('movimentacao/get_pessoa') }}",
            type: "post",
            dataType:'json',
            success: function(result) {
                var len = 0;
                if (result.pessoas != null) {
                    len = result.pessoas.length;
                }
                if (len>0) {
                    for (var i = 0; i<len; i++) {
                        var id = result.pessoas[i].id;
                        var nome = result.pessoas[i].nome;
                        var option = "<option value='" + id + "'>" + nome + "</option>";
                        $("#mv_pessoa_id").append(option);
                    }
                }
            },
            error: function(result) {
                //console.log("falha receber contas");
            }
        });
    };
    function apagar(id,descricao)
    {
        if (confirm('Deseja apagar a movimentacao '+descricao+' realmente?')) {
            $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
            $.ajax({
                type: "post",
                url: "{{ url('movimentacao/apagar/#registro') }}".replace('#registro',id),
                data: "do=getInfo",
                success: function(result) {
                    $('#datatables-movimentacao').DataTable().ajax.reload();
                },
                error: function(result) {
                    //console.log('falha apgar');
                }
            });
        }
        return false;
    };

    function lista_grupos(grupo_id_atual='')
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
                        $("#categoria_grupo_id").append(option);
                    }

                }
            },
            error: function(result) {
            }
        });

    };
    function lista_categoria(categoria_id_atual='')
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


    //BOTOES PARA ABRIR FORMULARIOS DE CADASTRO
    $( "#btn_empresa" ).click(function()
    {
        $('#empresa_id').val('');
        $('#empresa').val('');
        $('#cpfcnpj').val('');
        $('#tituloModalEmpresa').text("Criar empresa");
        $('#btn_criar_atualizar_empresa').text('Criar');
        $('#div_cadastro_empresa').modal("show");

        return;
    });
    $( "#btn_conta" ).click(function()
    {
        $('#conta_id').val('');
        $('#descricao').val('');
        $('#cpfcnpj').val('');
        $('#tituloModalConta').text("Criar conta");
        $('#btn_criar_atualizar_conta').text('Criar');
        $('#div_cadastro_conta').modal("show");
        return;
    });
    $( "#btn_grupo" ).click(function()
    {
        $('#grupo_id').val('');
        $('#grupo_grupo').val('');
        $('#grupo_tipo').val('');
        $('#tituloModalGrupo').text("Criar grupo");
        $('#btn_criar_atualizar_grupo').text('Criar');
        $('#div_cadastro_grupo').modal("show");
        return;
    });
    $( "#btn_categoria" ).click(function()
    {
        lista_grupos();
        $('#categoria_id').val('');
        $('#categoria_grupo_id').val('');
        $('#categoria').val('');
        $('#tituloModalCategoria').text("Criar categoria");
        $('#btn_criar_atualizar_categoria').text('Criar');
        $('#div_cadastro_categoria').modal("show");
        return;
    });
    $( "#btn_subcategoria" ).click(function()
    {
        lista_categoria();
        $('#subcategoria_id').val('');
        $('#subcategoria').val('');
        $('#subcategoria_categoria_id').val('');
        $('#tituloModalSubcategoria').text("Criar SubCategoria");
        $('#btn_criar_atualizar_subcategoria').text('Criar');
        $('#div_cadastro_subcategoria').modal("show");
        return;
    });
    $( "#btn_pessoa" ).click(function()
    {
        $('#pessoa_id').val('');
        $('#nome').val('');
        $('#razao').val('');
        $('#tituloModalPessoa').text("Criar pessoa");
        $('#btn_criar_atualizar_pessoa').text('Criar');
        $('#div_cadastro_pessoa').modal("show");
        return;
    });

    // SELECTS QUE DISPARAM ENVENTOS COM ALTERAÇÕES
    $('#mv_empresa_id').change(function()
    {
        atualiza_grupo();
        atualiza_categoria();
        atualiza_subcategoria();
    });
    $('#mv_grupo_id').change(function()
    {
        var tipo  = $("#mv_grupo_id").find(':selected').attr('tipo');
        $('#mv_tipo').val(tipo);
        atualiza_categoria();
        atualiza_subcategoria();
    });
    $('#mv_categoria_id').change(function()
    {
        atualiza_subcategoria();

    });

    // Picker Translations
    $('.pickadate').pickadate();
    $('.pickadate-translations').pickadate({
        formatSubmit: 'yyyy-mm-dd',
        monthsFull: [
            'Janeiro',
            'Fevereiro',
            'Março',
            'Abril',
            'Maio',
            'Junho',
            'Julho',
            'Agosto',
            'Setembro',
            'Outubro',
            'Novembro',
            'Dezembro'
        ],
        monthsShort: [
            'Jan',
            'Fev',
            'Mar',
            'Abr',
            'Mai',
            'Jun',
            'Jul',
            'Ago',
            'Set',
            'Out',
            'Nov',
            'Dez'],
        weekdaysShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],
        today: "Hoje",
        clear: 'Limpar',
        close: 'Sair',
        editable: true

    });

    function validateDate(id) {
        var RegExPattern = /^((((0?[1-9]|[12]\d|3[01])[\.\-\/](0?[13578]|1[02])      [\.\-\/]((1[6-9]|[2-9]\d)?\d{2}))|((0?[1-9]|[12]\d|30)[\.\-\/](0?[13456789]|1[012])[\.\-\/]((1[6-9]|[2-9]\d)?\d{2}))|((0?[1-9]|1\d|2[0-8])[\.\-\/]0?2[\.\-\/]((1[6-9]|[2-9]\d)?\d{2}))|(29[\.\-\/]0?2[\.\-\/]((1[6-9]|[2-9]\d)?(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00)|00)))|(((0[1-9]|[12]\d|3[01])(0[13578]|1[02])((1[6-9]|[2-9]\d)?\d{2}))|((0[1-9]|[12]\d|30)(0[13456789]|1[012])((1[6-9]|[2-9]\d)?\d{2}))|((0[1-9]|1\d|2[0-8])02((1[6-9]|[2-9]\d)?\d{2}))|(2902((1[6-9]|[2-9]\d)?(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00)|00))))$/;
        if (!((id.value.match(RegExPattern)) && (id.value!=''))) {
            alert('Data inválida.');
            id.focus();
        }
    }

    $('#div_cadastro_categoria').on('shown.bs.modal', function() {
        $('#categoria').trigger('focus');
    });


</script>
