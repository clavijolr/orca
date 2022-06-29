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
            <section class="app-user-list">
                <!-- users filter start -->
                <!-- users filter end -->
                <!-- list section start -->
                <!-- Modal to add new conta starts-->

                <!-- Modal to add new user Ends-->
                <div class="card">
                    
                    <table id="example" class="display" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Descricao</th>
                                <th>Conta</th>
                                <th>Agencia</th>
                                <th>Saldo</th>
                                <th>edit</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Descricao</th>
                                <th>Conta</th>
                                <th>Agencia</th>
                                <th>Saldo</th>
                                <th>edit</th>
                            </tr>
                        </tfoot>
                    </table>                
                </div>

                <!-- list section end -->
            </section>
        <!-- contas list ends -->
        </div>
    @endsection
    
@section('scripts')
    @include('contas.js')
    <script type="text/javascript">
    $(document).ready( function () {
        var table = $('#example').DataTable({
                ajax: "{{ url('contas') }}",
                columns: [
                    { data: 'id', name: 'id'},
                    { data: 'descricao', name: 'descricao'},
                    { data: 'agencia', name: 'agencia'},
                    { data: 'conta', name: 'conta'},
                    { data: 'saldo', render: $.fn.dataTable.render.number( '.', ',', 2,'R$ ' ), name: 'saldo'},
                    {defaultContent: '<input type="button" class="btid" value="btid"/>'},
                ],
        });

        $('#example tbody').on('click', '.btid', function () {
            var row = $(this).closest('tr');

                var data = table.row( row ).data().descricao;
                alert(data);
        });

        
    } );


    </script>    
@endsection
