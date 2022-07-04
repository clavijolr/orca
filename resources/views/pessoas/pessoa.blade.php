@extends('layouts.modelo')

    @section('header')
        @include('pessoas.css')
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
                                <table  class="table table-bordered" id="datatables-pessoa" name='datatables-pessoa'>
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Nome</th>
                                            <th>Razão</th>
                                            <th>Documento</th>
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
            @include('pessoas.cadastro')
        </div>
    @endsection

    @section('scripts')
    @include('pessoas.js')

    @endsection
