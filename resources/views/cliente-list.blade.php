@extends('layouts.app')

@section('body')

<div class="content">
        <div class="card border mt-3 table-style">
            <div class="card-body">
                <div class="row">
                    <div class="col-10">
                        <h5 class="card-title"><i class="fas fa-user-circle"></i> Lista de Clientes </h5>
                    </div>





                </div>
                <div class="row">
                    <div class="col-9">
                        <div class="card">
                            <div class="card-header"> Pesquisar

                            </div>
                            <div class="card-body">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-3">
                                                <label for="birth_date">Dt. Nascimento:</label>
                                                <div class="input-group mb-3">
                                                    <input type="date" class="form-control datepicker form-control-alternative" name="birth_date" id="input-birth_date" value="">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="nome">Nome:</label>
                                                    <input type="text" id="nome" class="form-control " name="nome" placeholder="Ex: João Victor" value="">
                                                    <div class="invalid-feedback">
                                                    </div>
                                                </div>
                                            </div>



                                            <div class="col-3" style="text-align: center">
                                                        <a class="btn btn-create"><i class="fas fa-search"></i><strong> Pesquisar </strong></a>
                                            </div>
                                        </div>


                                    </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-3">
                        <div class="card">
                            <div class="card-header"> Novo Cliente

                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12" style="text-align: center">
                                            <a class="btn btn-create" href="{{ route('novo_cliente') }}"><i class="fas fa-plus"></i><strong> Cliente </strong></a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>





            </div>

                <table class="table table-ordered table-hover table-striped" id="table_cliente">
                    <thead>
                        <tr>
                            <!-- <th>Id <i class="fas fa-sort-alpha-down ml-2"></i></th> -->
                            <th>Nome <i class="fas fa-sort-alpha-down ml-2"></i></th>
                            <th>Email <i class="fas fa-sort-alpha-down ml-2"></i></th>
                            <th>Idade <i class="fas fa-sort-alpha-down ml-2"></i></th>
                            <th>Telefone <i class="fas fa-sort-alpha-down ml-2"></i></th>
                            <th>Alterar <i class="fas fa-sort-alpha-down ml-2"></i></th>
                            <th>Deletar <i class="fas fa-sort-alpha-down ml-2"></i></th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($clientes as $cliente)
                            <tr>

                                <td>{{$cliente->nome}}</td>
                                <td>{{$cliente->email}}</td>
                                <td>{{$cliente->idade}}</td>
                                <td>{{$cliente->telefone}}</td>
                                <td> <a href="/clientes/edit/{{ $cliente->id }}" class="btn btn-sm btn-primary">Alterar</a> </td>
                                <td> <a href="/clientes/deletar/{{ $cliente->id }}" class="btn btn-sm btn-danger">Deletar</a> </td>

                            </tr>
                        @endforeach

                    </tbody>

                </table>
            </div>
        </div>
</div>

@endsection

@section('javascriptPagination')

<script type="text/javascript">




$(document).ready(function() {

    // var table = $('#table_cliente').DataTable();
    //
    // // Event listener to the two range filtering inputs to redraw on input
    // $('#nome').keyup( function() {
    //     table.draw();
    // } );

    // $('#table_cliente').DataTable( {
    //     initComplete: function () {
    //         this.api().columns().every( function () {
    //             var column = this;
    //             var select = $('<select><option value=""></option></select>')
    //                 .appendTo( $(column.footer()).empty() )
    //                 .on( 'change', function () {
    //                     var val = $.fn.dataTable.util.escapeRegex(
    //                         $(this).val()
    //                     );
    //
    //                     column
    //                         .search( val ? '^'+val+'$' : '', true, false )
    //                         .draw();
    //                 } );
    //
    //             column.data().unique().sort().each( function ( d, j ) {
    //                 select.append( '<option value="'+d+'">'+d+'</option>' )
    //             } );
    //         } );
    //     }
    // } );



        // "language": {
        //     "search": "Filtrar",
        //     "lengthMenu": "Itens por página _MENU_",
        //     "zeroRecords": "Nenhum cliente",
        //     "info": "Página _PAGE_ de _PAGES_",
        //     "infoEmpty": "Nenhum Registro",
        //     "infoFiltered": "",
        //     "paginate": {
        //         "previous": "Início",
        //         "next": "Próxima",
        //         "last": "Última",
        //     }
        // }

} );

</script>

@endsection
