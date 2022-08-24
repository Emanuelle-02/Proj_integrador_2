<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.MedDelivery', 'MedDelivery') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="sb-topnav navbar navbar-expand navbar navbar-light" style="background: linear-gradient(to bottom, #eee9d3 0%, #fee89a 100%);">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="/home" style="color:black">MedDelivery</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" style="color:black" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <img src="../img/user.png"
                style="border: 1px solid #cccccc; border-radius: 50%; width: 40px; height:auto; float:left; margin-right: 7px;">
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="/"></a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion navbar navbar-light" style="background: linear-gradient(to bottom, #eee9d3 0%, #fee89a 100%);" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading" style="color:black">Interface</div>
                        <a class="nav-link collapsed" href="/home" style="color:black">
                            <div class="sb-nav-link-icon" style="color:black"><i class="fas fa-home"></i></div>
                            Início - Entregas
                        </a>

                        <div class="sb-sidenav-menu-heading" style="color:black">Gerenciar</div>
                        <a class="nav-link collapsed" href="/gerenciar" style="color:black">
                            <div class="sb-nav-link-icon" style="color:black"><i class="fas fa-home"></i></div>
                            Gerenciar entregas
                        
                        <a class="nav-link" href="/minhasEntregas" style="color:black">
                            <div class="sb-nav-link-icon" style="color:black"><i class="fa-solid fa-motorcycle"></i> </div>
                            Minhas entregas
                        </a>

                        <a class="nav-link" href="/" style="color:black">
                            <div class="sb-nav-link-icon" style="color:black"><i class="fa-solid fa-right-from-bracket"></i> </div>
                            Sair
                        </a>
                    </div>
                </div>
          
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <div class="card mt-4">
                        <div class="card-header">
                            <h4>Editar Entrega</h4>
                        </div>
                        <div class="card-body" style="overflow-x:auto;">
                            <div class="card">
                                <div class="card-body">
                                @csrf
                                    <form action="{{ route('editar_entregas', ['id' => $response2['id_entrega']]) }}"  method="get">   
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label for="nome">Nome:</label>
                                                    <input type="text" name="nome" value="{{$response2['nome']}}" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="entrega_status">Status:</label>
                                                    <input type="text" name="entrega_status" value="{{$response2['entrega_status']}}" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="rua">Rua:</label>
                                                    <input type="text" name="rua" value="{{$response2['rua']}}" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="numero">Número:</label>
                                                    <input type="text" name="numero" value="{{$response2['numero']}}" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="bairro">Bairro:</label>
                                                    <input type="text" name="bairro" value="{{$response2['bairro']}}" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="cidade">Cidade:</label>
                                                    <input type="text" name="cidade" value="{{$response2['cidade']}}" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <button class="btn btn-dark" type="submit"><i class="fa-solid fa-hand-holding-medical"></i>  Salvar alterações</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    </main>
            @include('layouts.entregador-footer')
        </div>
    </div>

    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
    <script src="js/scripts.js"></script>    
</body>
</html>