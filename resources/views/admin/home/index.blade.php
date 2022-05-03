@extends('admin.layouts.master')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Painel Administrativo</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <a href="{{ route('livros.index') }}">
                        <button type="button" class="btn btn-primary  float-right"><i class="fas fa-book"></i>
                            Meus Livros
                        </button></a>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid ">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title ">Dashboard</h3>
                </div>
                <div class="card-body">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-3 col-6 ">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>{{ $livrosLidos }}</h3>

                                    <p>Total Livros lidos</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-book-reader"></i>
                                </div>

                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>{{ $paginasLidas }}</h3>

                                    <p>Total de páginas Lidas</p>
                                </div>
                                <div class="icon">
                                    <i class="far fa-file"></i>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title ">Frase </h3>
                </div>
                <div class="card-body">
                    @if ($rodape)
                        <strong> {!! $rodape->frase !!} - Autor: {{ $rodape->autor_frase }}</strong>
                    @else
                        <strong class="text-danger"> Nenhuma frase com o status Ativo</strong>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
