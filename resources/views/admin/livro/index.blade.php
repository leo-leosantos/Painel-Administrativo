@extends('admin.layouts.master')

@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">

    <link rel="stylesheet"
        href="{{ asset('backend/assets/css/plugins/datatables-responsive/css/responsive.bootstrap4.css') }}">

    <link rel="stylesheet" href="{{ asset('backend/assets/css/plugins/datatables-buttons/css/buttons.bootstrap4.css') }}">
@endsection



@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Livros Lidos</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <a href="{{ route('livros.create') }}">
                        <button type="button" class="btn btn-success float-right"><i class="fas fa-plus"></i>
                            Cadastrar Livro
                        </button>
                    </a>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <!-- Small boxes (Stat box) -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title ">Lista dos Livros Lidos</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Titulo</th>
                                <th>Nome Autor</th>
                                <th>Serie</th>
                                <th>Número de Páginas</th>
                                <th>Data de Inicio</th>
                                <th>Foto</th>
                                <th>Acoes</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($livros as $livro)
                                <tr>
                                    <td>{{ $livro->id }}</td>
                                    <td>{{ $livro->titulo }}</td>
                                    <td>{{ $livro->autor }}</td>
                                    <td> {{ $livro->serie }}</td>
                                    <td>{{ $livro->numero_pagina }}</td>
                                    <td>{{ date('d/m/Y', strtotime($livro->data_inicio_leitura)) }}</td>
                                    <td><img src="{{ $livro->getfoto() }}" class="img-fluid" width="100" height="100" alt="{{ $livro->slug }}" ></td>
                                    <td>
                                        <a href="{{ route('livros.show', ['livro' => $livro->slug]) }}"
                                            class="btn  btn-outline-info"><i class="fas fa-eye"></i> Visualizar</a>

                                        <a href="{{ route('livros.edit', ['livro' => $livro->slug]) }}"
                                            class="btn btn-outline-warning"><i class="fas fa-edit"></i> Editar</a>

                                            <form id="form_{{ $livro->slug }}" method="post"
                                                action="{{ route('livros.destroy', ['livro' => $livro->slug]) }}">
                                                @method('DELETE')
                                                @csrf
                                                <a href="#" class="btn btn-outline-danger"
                                                    onclick="document.getElementById('form_{{ $livro->slug }}').submit()"
                                                    class="btn btn-danger"><i class="fas fa-trash"></i>Excluir</a>
                                            </form>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.row -->
            <!-- Main row -->
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
@section('js')

    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('backend/assets/js/plugins/bootstrap/js/bootstrap.bundle.js') }}"></script>

    <!-- DataTables  & Plugins -->
    <script src="{{ asset('backend/assets/js/plugins/datatables/jquery.dataTables.js') }}"></script>

    <script src="{{ asset('backend/assets/js/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>

    <script src="{{ asset('backend/assets/js/plugins/datatables-responsive/js/dataTables.responsive.js') }}"></script>

    <script src="{{ asset('backend/assets/js/plugins/datatables-responsive/js/responsive.bootstrap4.js') }}"></script>

    <script src="{{ asset('backend/assets/js/plugins/datatables-buttons/js/dataTables.buttons.js') }}"></script>


    <script src="{{ asset('backend/assets/js/plugins/datatables-buttons/js/buttons.bootstrap4.js') }}"></script>


    <script src="{{ asset('backend/assets/js/plugins/jszip/jszip.js') }}"></script>

    <script src="{{ asset('backend/assets/js/plugins/pdfmake/pdfmake.js') }}"></script>

    <script src="{{ asset('backend/assets/js/plugins/pdfmake/vfs_fonts.js') }}"></script>

    <script src="{{ asset('backend/assets/js/plugins/datatables-buttons/js/buttons.html5.js') }}"></script>

    <script src="{{ asset('backend/assets/js/plugins/datatables-buttons/js/buttons.print.js') }}"></script>

    <script src="{{ asset('backend/assets/js/plugins/datatables-buttons/js/buttons.colVis.js') }}"></script>

@endsection
