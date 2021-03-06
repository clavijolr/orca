@extends('layouts.modelo')

    @section('header')
        @include('contas.css')
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
                            <table  class="table table-bordered" id="datatables-conta" name='datatables-conta'>
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Descricao</th>
                                        <th>Agencia</th>
                                        <th>Conta</th>
                                        <th>Saldo</th>
                                        <th>Ação</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
                 @include('contas.cadastro')
            </section>
        <!-- contas list ends -->
        </div>
    @endsection

    @section('scripts')
    @include('contas.js')
    <script type="text/javascript">



    </script>
    @endsection
