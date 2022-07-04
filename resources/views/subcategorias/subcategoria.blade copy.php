@extends('layouts.modelo')

    @section('header')
        @include('subcategorias.css')

    @endsection

    @section('conteudo')
        <div class="content-wrapper">
            <div class="content-header row">
            </div>

            <div class="content-body">
                <!-- Select2 Start  -->
                <section class="basic-select2">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Teste</h4>
                                </div>
                                <section class="basic-select2">
                                <div class="row">
                                    <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                        <h4 class="card-title">Select2 Options</h4>
                                        </div>
                                        <div class="card-body">
                                        <div class="row">

                                            <!-- Array Data -->
                                            <div class="col-md-6 mb-1">
                                            <label>Array Data</label>
                                            <div class="form-group">
                                                <select class="select2-data-array form-control" id="select2-array"></select>
                                            </div>
                                            </div>

                                            <!-- Remote Data -->
                                            <div class="col-md-6 mb-1">
                                            <label>Remote Data</label>
                                            <div class="form-group">
                                                <select class="select2-data-ajax form-control" id="select2-ajax"></select>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                </section>
                            </div>
                            </div>
                        </div>
                    </div>

                </section>


            </div>
        </div>
    @endsection

    @section('scripts')
        @include('subcategorias.js')

        <script type="text/javascript">
            $(document).ready(function(){

                //$('#category_item').selectpicker();
                //                $('#sub_category_item').selectpicker();

                load_data('category_data');

                function load_data(type, category_id = '')
                {
                    //alert('inicio');
                    $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
                    $.ajax({
                            url:"{{ url('subcategoria/categorias') }}",
                            method:"POST",
                            data:{type:type, category_id:category_id},
                            dataType:"json",

                        success: function(data) {
                            //alert(data.length);
                            var html = '';
                            for(var count = 0; count < data.length; count++){
                                html += '<option value="'+data[count].id+'">'+data[count].categoria+'</option>';
                            }
                            if(type == 'category_data')
                            {
                                $('#category_item').html(html);
                                $('#category_item').selectpicker('refresh');
                            }
                            //alert(html);


                        },
                        error: function(result) {
                            alert('falha');
                        }
                    });
                }


            });
        </script>
    @endsection
