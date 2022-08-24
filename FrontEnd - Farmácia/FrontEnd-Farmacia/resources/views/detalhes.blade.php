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
                            <h4>Detalhes da entrega:</h4>
                        </div>
                        <div class="card-body" style="overflow-x:auto;">
                            <div class="card">
                                <div class="card-body">
                                @csrf   
                                <div class="row">  
                                    <div class="form-group">
                                        <label for="medicamento">Medicamento:</label>
                                        <p>{{$response2['medicamento']}}</p>
                                    </div> 
                                    <div class="form-group">
                                        <label for="nome">Nome do cliente:</label>
                                        <p>{{$response2['nome']}}</p>
                                    </div>      
                                    <div class="form-group">
                                        <label for="rua">Rua:</label>
                                        <p>{{$response2['rua']}}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="numero">Número:</label>
                                        <p>{{$response2['numero']}}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="bairro">Bairro:</label>
                                        <p>{{$response2['bairro']}}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="cidade">Cidade:</label>
                                        <p>{{$response2['cidade']}}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="cep">Cep:</label>
                                        <p>{{$response2['cep']}}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="cep">Valor da entrega:</label>
                                        <p>R$ {{$response2['preco']}},00.</p>
                                    </div>
                                </div>
                                <br>
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
