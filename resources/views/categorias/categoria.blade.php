@extends('layouts.modelo')

    @section('page-script')
        <!-- Page js files -->
        @include('categorias.css')
    @endsection

    @section('conteudo')
        <div class="content-wrapper">
            <div class="content-header row">
            </div>

            <div class="content-body">
            <!-- conatas list start -->
                <section class="app-conta-list">
                    <div  class="card">
                        <div  class="card-datatable table-responsive pt-0">
                            <div class="card-body">
                                <table  class="table table-bordered" id="datatables-categoria" name='datatables-categoria'>
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Categoria</th>
                                            <th>Grupo</th>
                                            <th>Acesso a </th>
                                            <th>Ação</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                    {{-- @include('name') --}}
                </section>
            <!-- contas list ends -->
            </div>
            @include('categorias.cadastro')
        </div>
    @endsection

    @section('scripts')
    @include('categorias.js')


    @endsection
