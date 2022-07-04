@extends('layouts.modelo')

    @section('header')
        @include('empresas.css')
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
                                <table  class="table table-bordered" id="datatables-empresa" name='datatables-empresa'>
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Entidade</th>
                                            <th>Documento</th>
                                            <th>Tipo Pessoa</th>
                                            <th>Especial</th>
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
            @include('empresas.cadastro')
        </div>
    @endsection

    @section('scripts')
    @include('empresas.js')

    @endsection
