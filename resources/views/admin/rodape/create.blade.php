@extends('admin.layouts.master')
@section('css')
    <link rel="stylesheet" href="{{ asset('recursos/admin/plugins/summernote/summernote-bs4.min.css') }}">
@endsection
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <a href="{{ route('rodape.index') }}">
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
                    <h3 class="card-title ">Criar Rodapé</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <!--card-body -->
                    <!--inicio do formulario create -->
                    <form action="{{ route('rodape.store') }}" method="post">
                        @csrf
                        <section class="content">
                            <!--section textarea  -->
                            <div class="row">
                                <!--primeiro row -->
                                <div class="col-12 col-sm-12">
                                    <div class="form-group">
                                        <label>Nome Autor da frase</label>

                                        <input type="text" class="form-control" name="autor_frase"
                                            placeholder="Digite o nome do autor da frase"
                                            value="{{ old('autor_frase') }}">

                                        @error('autor_frase')
                                            <div class="form-control is-invalid">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                </div>
                                <div class="col-12 col-sm-12">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <label class="label">
                                            <input data-bootstrap-switch   type="checkbox" name="status" {{ (old('status') == 'on' || old('status') == true ? 'checked' : '') }}>
                                        </label>

                                        @error('status')
                                            <div class="form-control is-invalid">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card card-outline card-info">
                                        <div class="card-header">
                                            <h3 class="card-title">
                                                Frase do Rodapé
                                            </h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <textarea id="summernote" name="frase">

                                            </textarea>
                                            @error('frase')
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



                        <div class="row">
                            <!--botões  row -->
                            <div class="card-footer container-fluid">
                                <div class="row">
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-success btn-lg"><i class="far fa-save"></i>
                                            Salvar</button>

                                    </div>
                                    <div class="col-md-6">
                                        <a class="btn btn-danger btn-lg" href="{{ route('rodape.index') }}"><i class="fas fa-backspace"></i> Cancelar</a>

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
    <script src="{{ asset('recursos/admin/plugins/summernote/lang/summernote-pt-BR.min.js') }}"></script>
    <script src="{{ asset('recursos/admin/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>


    <script>
        $(function() {
            // Summernote
            $('#summernote').summernote({
                lang: 'pt-BR',
            });
        });

        $("input[data-bootstrap-switch]").each(function() {
            $(this).bootstrapSwitch('on', $(this).prop('checked'));
        });
    </script>

@endsection
