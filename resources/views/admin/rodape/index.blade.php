@extends('admin.layouts.master')


@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Frase Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <a href="{{ route('rodape.create') }}">
                        <button type="button" class="btn btn-success float-right"><i class="fas fa-pen-alt"></i>
                            Criar Frase do Dashboard
                        </button>
                    </a>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title ">Frase Motivacional do Dashboard</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Nome Autor</th>
                                <th>Frase</th>
                                <th>Ações</th>


                            </tr>
                        </thead>
                        <tbody>
                            @foreach($rodapes as $rodape)
                                <tr>
                                    <td>{{ $rodape->autor_frase }}</td>
                                    <td>{!! $rodape->frase !!}</td>

                                    <td>
                                        <a href="{{ route('rodape.edit', ['rodape' => $rodape->id]) }}"
                                            class="btn btn-outline-warning"><i class="fas fa-edit"></i> Editar</a>


                                    </td>
                                    <td class="text align-center">
                                        <form action="{{ route('rodape.destroy', ['rodape' => $rodape->id]) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                class="btn btn-outline-danger"><i class="fas fa-trash"></i> Excluir</button>
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
