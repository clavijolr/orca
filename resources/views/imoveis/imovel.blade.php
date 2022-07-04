@extends('layouts.modelo')

    @section('vendor-style')
    <!-- vendor css files -->
   <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">

    @endsection

    @section('page-script')
        <!-- Page js files -->
        @include('obras.css')
        <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-flat-pickr.css')) }}">
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
                            <table  class="table table-bordered" id="datatables-obra" name='datatables-obra'>
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Obra</th>
                                        <th>Saldo final</th>
                                        <th>Data inicio</th>
                                        <th>Data final</th>
                                        <th>Ação</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
                 @include('obras.cadastro')
            </section>
        <!-- obras list ends -->
        </div>
    @endsection

    @section('scripts')
    @include('obras.js')
    <script type="text/javascript">



    </script>
    @endsection
