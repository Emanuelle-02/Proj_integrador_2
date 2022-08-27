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
    <nav class="sb-topnav navbar navbar-expand navbar navbar-light" style="background: linear-gradient(to bottom, #003366 0%, #0099cc 100%);">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="/home" style="color: white;">MedDelivery</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!" style="color: white;"><i class="fas fa-bars"></i></button>
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
            <nav class="sb-sidenav accordion navbar navbar-light" style="background: linear-gradient(to bottom, #003366 0%, #0099cc 100%);" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading" style="color: white">Interface</div>
                        <a class="nav-link collapsed" style="color: white;" href="/home">
                            <div class="sb-nav-link-icon" style="color: #f4261e;"><i class="fas fa-home"></i></div>
                            Início
                        </a>

                        <a class="nav-link collapsed" style="color: white;" href="/solicitarEntrega">
                            <div class="sb-nav-link-icon" style="color: red;"><i class="fas fa-plus"></i></div>
                            Solicitar entrega
                        </a>

                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePage" aria-expanded="false" aria-controls="collapsePage" style = "color: white">
                                <div class="sb-nav-link-icon" style = "color: red"><i class="fas fa-table"></i></div>
                                Minhas Entregas
                                <div class="sb-sidenav-collapse-arrow" style = "color: white"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePage" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link" href="/home" style = "color: white">
                                        Pendentes
                                    </a>
                                    <a class="nav-link" href="/andamento" style = "color: white">
                                        Em andamento
                                    </a>
                                    <a class="nav-link" href="/entregues" style = "color: white">
                                        Entregues
                                    </a>
                                </nav>
                            </div>

                        <a class="nav-link" style="color: white;" href="/">
                            <div class="sb-nav-link-icon" style="color: red;"><i class="fa-solid fa-right-from-bracket"></i> </div>
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
                            <h4>Editar Dados da Entrega</h4>
                        </div>
                        <div class="card-body" style="overflow-x:auto;">
                            <div class="card">
                                <div class="card-body">
                                @csrf
                                    <form action="{{ route('editar_entregas', ['id' => $response2['id_entrega']]) }}"  method="get">   
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label for="medicamento">Medicamento:</label>
                                                    <input type="text" name="medicamento" value="{{$response2['medicamento']}}" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="nome">Nome:</label>
                                                    <input type="text" name="nome" value="{{$response2['nome']}}" class="form-control">
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
                                                    <label for="cep">Cep:</label>
                                                    <input type="number" name="cep" value="{{$response2['cep']}}" class="form-control">
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
                </div>
            </main>
        </div>
    </div>
    
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
    <script src="js/scripts.js"></script>    
</body>
</html>
