<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('livros.index') }}" class="brand-link">
        <img src="{{ asset('backend/assets/adminlte/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Catálago Livros Lidos</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ url('storage/' .auth()->user()->perfil) }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="{{ route('user.index') }} " class="d-block">{{\Illuminate\Support\Facades\Auth::user()->name}}</a>
            </div>
        </div>



        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class="fas fa-bars"></i>
                        <p>
                            Menu
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.home.index') }}" class="nav-link active">
                                <i class="fas fa-tachometer-alt"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('livros.index') }}" class="nav-link">
                                <i class="fas fa-book"></i>
                                <p>Livros</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('livros.listarLivros') }}" class="nav-link">
                                <i class="fas fa-search"></i>
                                <p>Listar livros lidos por periodo</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{  route('rodape.index') }}" class="nav-link">
                                <i class="fas fa-columns"></i>
                                <p>Frase - Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('user.index') }}" class="nav-link">
                                <i class="fas fa-user"></i>
                                <p>Dados Leitor</p>
                            </a>
                        </li>
                         <li class="nav-item">
                            <a href="{{ route('user.logout') }}" class="nav-link">
                                <i class="fas fa-sign-out-alt"></i>
                                <p>Sair</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
