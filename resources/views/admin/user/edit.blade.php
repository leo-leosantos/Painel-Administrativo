@extends('admin.layouts.master')
@section('css')
    <!-- dropzonejs -->
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
                    <h3 class="card-title ">Editar Usuário</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <!--card-body -->

                    <form action="{{ route('user.update', ['user' => $user->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                        <!--inicio do formulario create -->
                        <div class="row">
                            <!--primeiro row -->
                            <div class="col-6 col-sm-6">
                                <div class="form-group">
                                    <label>Nome</label>

                                    <input type="text" class="form-control" name="name"
                                        placeholder="Digite o nome do usuario" value=" {{ $user->name }}">
                                        @error('name')
                                        <div class="form-control is-invalid">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6 col-sm-6">
                                <div class="form-group">
                                    <label>E-mail</label>
                                    <input type="email" name="email" class="form-control"
                                        placeholder="Digite o e-mail" value=" {{ $user->email }}">
                                </div>
                            </div>

                        </div>

                        <!--section fotos -->
                        <section class="content">
                            <div class="card card-outline card-info">
                                <div class="card-header">
                                    <h3 class="card-title card-info">
                                        <span>Foto do Perfil </span>
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <img src="{{ $user->getfoto() }}" class="img-fluid" width="240"
                                                height="140" alt="{{ $user->name }}"  >
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="file"   name="perfil" id="bootstrapfileinput"  >
                                            </div>
                                        </div>
                                        @error('perfil')
                                        <div class="form-control is-invalid">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    </div>


                                </div>
                            </div>
                        </section>

                        <!--section fotos -->
                        <div class="row">
                            <!--botões  row -->
                            <div class="card-footer container-fluid">
                                <div class="row">
                                    <div class="col-md-6">
                                        <button  type="submit" class="btn btn-success btn-lg"><i class="far fa-save"></i> Salvar</button>
                                    </div>
                                    <div class="col-md-6">
                                        <a class="btn btn-danger btn-lg" href="{{ route('user.index') }}"><i class="fas fa-backspace"></i> Cancelar</a>
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
