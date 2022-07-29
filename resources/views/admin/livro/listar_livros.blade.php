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

                </div><!-- /.col -->
                <div class="col-sm-6">
                    <a href="{{ route('livros.index') }}">
                        <button type="button" class="btn btn-success float-right"><i class="fas fa-book"></i>
                            Livros Lidos
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
                    <h3 class="card-title ">Pesquisar Livros</h3>
                </div>

                <!-- /.card-header -->
                <div class="card-body">
                    <form enctype="multipart/form-data" action="{{ route('livros.listarLivros') }}" method="post">
                        @csrf
                        <div class="row">
                            <!--teirceio row -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Data Inicio Da Pesquisa:</label>
                                    <input type="date" class="form-control" name="data_inicio_pesquisa"
                                        value="{{ old('data_inicio_pesquisa') }}">
                                    @error('data_inicio_pesquisa')
                                        <div class="form-control is-invalid">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Data Fim da Pesquisa:</label>
                                    <input type="date" class="form-control" name="data_fim_pesquisa"
                                        value="{{ old('data_fim_leitura') }}">
                                </div>
                            </div>
                        </div><!-- fim tericeiro row -->
                        <div class="row">
                            <div class="form-group">
                                <label for="pesquisarLivros">Pesquisar:</label>
                                <button type="submit" id="pesquisarLivros" class="btn btn-success">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.row -->
            <!-- Main row -->
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">

            <!-- Small boxes (Stat box) -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title ">Livro Lidos no Periodo Pesquisado</h3>
                </div>

                <!-- /.card-header -->


                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>

                            <tr>
                                <th>#</th>
                                <th>Titulo</th>
                                <th>Nome Autor</th>
                                <th>Número de Páginas</th>
                                <th>Data de Inicio</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($pesquisarLivros != null)
                                @foreach ($pesquisarLivros as $livro)
                                    <tr>
                                        <td>{{ $livro->id }}</td>
                                        <td>{{ $livro->titulo }}</td>
                                        <td>{{ $livro->autor }}</td>
                                        <td> {{ $livro->numero_pagina }}</td>
                                        <td>{{ date('d-m-Y', strtotime($livro->data_inicio_leitura)) }}</td>
                                    </tr>
                                @endforeach
                            @endif
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
