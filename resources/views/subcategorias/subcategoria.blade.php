@extends('layouts.modelo')

    @section('vendor-style')
    <!-- vendor css files -->
    @endsection



    @section('page-script')
        <!-- Page js files -->
        @include('subcategorias.css')
    @endsection


    @section('conteudo')
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <section class="app-conta-list">
                                <div  class="card">
                                    <div  class="card-datatable table-responsive pt-0">
                                        <div class="card-body">
                                            <table  class="table table-bordered" id="datatables-subcategoria" name='datatables-subcategoria'>
                                                <thead>
                                                    <tr>
                                                        <th>Id</th>
                                                        <th>Categoria</th>
                                                        <th>Subcategoria</th>
                                                        <th>Ação</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            @include('subcategorias.cadastro')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @section('scripts')
        @include('subcategorias.js')

    @endsection
