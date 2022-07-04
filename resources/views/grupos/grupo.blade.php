@extends('layouts.modelo')

    @section('header')
        @include('grupos.css')
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
                                <table  class="table table-bordered" id="datatables-grupo" name='datatables-grupo'>
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Grupo</th>
                                            <th>Permissão</th>
                                            <th>Lançamento</th>
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
            @include('grupos.cadastro')
        </div>
    @endsection

    @section('scripts')
    @include('grupos.js')
    @endsection
