@extends('admin.layouts.master')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Visualizar dados do Livro</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <a href="{{ route('livros.index') }}">
                        <button type="button" class="btn btn-primary float-right"><i class="fas fa-undo"></i>
                            Voltar
                        </button>
                    </a>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Visualizar Livro</h3>
                </div>
            </div>


            <div class="card-body">
                <!--card-body -->

                <section class="content">
                    <!--section textarea  -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-outline card-info">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <strong>Titulo do Livro</strong> : {{ $livro->titulo }}
                                    </h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <td> <strong>Autor</strong> : {{ $livro->autor }}</td>
                                                <td> <strong>Serie</strong> : {{ $livro->serie }}</td>
                                                <td> <strong>Volume</strong> : {{ $livro->volume }}</td>
                                            </tr>
                                            <tr>
                                                <td> <strong>Editora</strong> : {{ $livro->editora }}</td>
                                                <td> <strong>Número de páginas</strong>: {{ $livro->numero_pagina }}</td>
                                                <td> <strong>Data de Inicio Leitura</strong>:
                                                    {{ date('d/m/Y', strtotime($livro->data_inicio_leitura)) }}</td>
                                            </tr>

                                            <tr>

                                                <td> <strong>Data de Fim Leitura</strong>:
                                                    {{ date('d/m/Y', strtotime($livro->data_fim_leitura)) }}</td>
                                                <td><strong>Tempo de Leitura:</strong>
                                                    {{ $tempo }} dias
                                                </td>
                                                <td></td>

                                            </tr>
                                        </thead>

                                    </table>

                                    <table class="table  table-bordered rounded">
                                        <thead>
                                            <tr>
                                                <td align="center">
                                                    <div class="container-fluid card mb-3"><strong> Sinopse</strong>
                                                        <hr>
                                                        <div class=" card-body mb-5">   {!! $livro->sinopse !!}
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </thead>
                                    </table>

                                    <table class="table  table-bordered rounded">
                                        <thead>
                                            <tr>
                                                <td align="center">Foto Capa</td>
                                            </tr>

                                        </thead>

                                        <tbody>
                                            <tr align="center">
                                                <td> <img src="{{ $livro->getfoto() }}" class="img-fluid" width="240" height="140" alt="{{ $livro->slug }}" >
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /.col-->
                    </div>
                </section>


            </div><!-- fim card-body -->
        </div>
    </section>
@endsection
