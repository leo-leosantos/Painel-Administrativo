@extends('admin.layouts.master')


@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dados do Usuário </h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title ">Dados do Usuario</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Ações</th>


                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <td>{{$user->name }}</td>
                                    <td>{{$user->email }}</td>

                                    <td>
                                        <a href="{{ route('user.edit', ['user' => $user->id]) }}"
                                            class="btn btn-outline-warning"><i class="fas fa-edit"></i> Editar</a>


                                    </td>
                                    <td class="text align-center">
                                        <form action="{{ route('user.destroy', ['user' => $user->id]) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                class="btn btn-outline-danger"><i class="fas fa-trash"></i> Excluir</button>
                                        </form>



                                    </td>

                                </tr>

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
