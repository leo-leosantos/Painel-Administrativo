@extends('admin.layouts.master')
@section('css')
    <!-- dropzonejs -->
    <link rel="stylesheet" href="{{ asset('recursos/admin/plugins/dropzone/min/dropzone.min.css') }}">
    <link rel="stylesheet" href="{{ asset('recursos/admin/plugins/summernote/summernote-bs4.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.min.css"
        crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.7/css/fileinput.min.css" media="all"
        rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <a href="{{ route('livros.index') }}">
                        <button type="button" class="btn btn-primary  float-right"><i class="fas fa-undo"></i>
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
            <!-- Small boxes (Stat box) -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title ">Cadastrar Novo Livro</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <!--card-body -->

                    <form enctype="multipart/form-data" action="{{ route('livros.store') }}" method="post">
                        @csrf
                        <!--inicio do formulario create -->
                        <div class="row">
                            <!--primeiro row -->
                            <div class="col-4 col-sm-4">
                                <div class="form-group">
                                    <label>Titulo</label>

                                    <input type="text" class="form-control" name="titulo"
                                        placeholder="Digite o Titulo do Livro" value="{{ old('titulo') }}">

                                    @error('titulo')
                                        <div class="form-control is-invalid">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-4 col-sm-4">
                                <div class="form-group">
                                    <label>Autor</label>
                                    <input type="text" name="autor" class="form-control"
                                        placeholder="Digite o nome do autor do Livro" value="{{ old('autor') }}">
                                    @error('autor')
                                        <div class="form-control is-invalid">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4 col-sm-4">
                                <div class="form-group">
                                    <label>Serie</label>
                                    <input type="text" name="serie" class="form-control" placeholder="ex: Harry Potter"
                                        value="{{ old('serie') }}">
                                </div>
                            </div>
                        </div>
                        <!--fim do primeiro row -->

                        <div class="row">
                            <!--segundo row -->
                            <div class="col-4 col-sm-4">
                                <div class="form-group">
                                    <label>Volume</label>
                                    <input type="text" name="volume" class="form-control" placeholder="ex: Volume 1"
                                        value="{{ old('volume') }}">
                                </div>
                            </div>
                            <div class="col-4 col-sm-4">
                                <div class="form-group">
                                    <label>Número de Páginas</label>
                                    <input type="number" min="0" class="form-control" name="numero_pagina"
                                        class="form-control" placeholder="Digite o número de páginas do livro"
                                        value="{{ old('numero_pagina') }}">
                                    @error('numero_pagina')
                                        <div class="form-control is-invalid">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4 col-sm-4">
                                <div class="form-group">
                                    <label>Editora</label>
                                    <input type="text" name="editora" class="form-control"
                                        placeholder="Digite o nome da editora" value="{{ old('editora') }}">
                                    @error('editora')
                                        <div class="form-control is-invalid">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <!--fim do segundo row -->

                        <div class="row">
                            <!--teirceio row -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Data Inicio Da Leitura:</label>
                                    <input type="date" class="form-control" name="data_inicio_leitura"
                                        value="{{ old('data_inicio_leitura') }}">
                                    @error('data_inicio_leitura')
                                        <div class="form-control is-invalid">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Data Fim Da Leitura:</label>
                                    <input type="date" class="form-control" name="data_fim_leitura"
                                        value="{{ old('data_fim_leitura') }}">
                                </div>
                            </div>
                        </div><!-- fim tericeiro row -->

                        <section class="content">
                            <!--section textarea  -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card card-outline card-info">
                                        <div class="card-header">
                                            <h3 class="card-title">
                                                Sinopse
                                            </h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <textarea id="summernote" name="sinopse" value="{{ old('sinopse') }}">
                                            </textarea>
                                            @error('sinopse')
                                                <div class="form-control is-invalid">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <!-- /.col-->
                            </div>
                        </section>
                        <!--fim do section textarea -->

                        <!--section fotos -->
                        <section class="content">
                            <div class="card card-outline card-info">
                                <div class="card-header">
                                    <h3 class="card-title card-info">
                                        <span>Foto da capa </span>
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <input type="file" name="foto_capa" id="bootstrapfileinput">
                                    @error('foto_capa')
                                        <span class="red-text text-accent-3"><small> {{ $message }}</small></span>
                                    @enderror
                                </div>
                            </div>
                        </section>
                        <!--section fotos -->
                        <div class="row">
                            <!--botões  row -->
                            <div class="card-footer container-fluid">
                                <div class="row">
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-success btn-lg"><i class="far fa-save"></i>
                                            Salvar</button>

                                    </div>
                                    <div class="col-md-6">
                                        <a class="btn btn-danger btn-lg" href="{{ route('livros.index') }}"><i class="fas fa-backspace"></i> Cancelar</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--botoes row -->


                    </form>
                    <!--fim do formulario create -->

                </div> <!-- /.card-body -->
            </div> <!-- /.card-->
        </div><!-- /.container-fluid -->
    </section><!-- /.section html -->
@endsection
<!-- /.section do laravel do content -->
@section('js')
    <!-- /.section do laravel do js -->
    <script src="{{ asset('recursos/admin/plugins/summernote/lang/summernote-pt-BR.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.7/js/plugins/piexif.min.js"
        type="text/javascript"></script>

    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.7/js/fileinput.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.7/js/locales/pt-BR.js"></script>


    <script>
        $(function() {
            // Summernote
            $('#summernote').summernote({
                lang: 'pt-BR',
            });
        });
    </script>


    <script>
        $(function() {
            //Date picker
            $('#data_inicio').datetimepicker({
                format: 'L'
            });
            //Date picker
            $('#data_fim').datetimepicker({
                format: 'L'
            });
        });


        $("#bootstrapfileinput").fileinput({
            'theme': "fas",
            'showUpload': false,
            'showRemove': true,
            'previewFileType': 'any',
            'maxFileSize': '25600',
            'maxFileCount': '6',
            'maxFilePreviewSize': '15360',
            'allowedFileExtensions': ['jpeg', 'jpg', 'png'],
            'language': 'pt-BR',
            'removeClass': 'btn btn-danger'
        });
    </script>
@endsection
<!-- fim /.section do laravel do js -->
