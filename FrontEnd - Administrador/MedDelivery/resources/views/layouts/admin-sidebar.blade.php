            <div id="layoutSidenav_nav">
    
                <nav class="sb-sidenav accordion navbar navbar-light" style="background: linear-gradient(to bottom, #eee8ce 0%, #f8d751 100%);" id="sidenavAccordion">
                    <div class="sb-sidenav-menu" style = "color: black">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages" style = "color: black">
                                <div class="sb-nav-link-icon" style = "color: black"><i class="fas fa-user-plus"></i></div>
                                Cadastro de usuários
                                <div class="sb-sidenav-collapse-arrow" style = "color: black"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link" href="/add_farmacia" style = "color: black">
                                        Cadastrar Farmácia
                                    </a>
                                    <a class="nav-link" href="/add_entregador" style = "color: black">
                                        Cadastrar Entregador
                                    </a>
                                </nav>
                            </div>

                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePage" aria-expanded="false" aria-controls="collapsePage" style = "color: black">
                                <div class="sb-nav-link-icon" style = "color: black"><i class="fas fa-table"></i></div>
                                Entregas
                                <div class="sb-sidenav-collapse-arrow" style = "color: black"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePage" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link" href="/pendentes" style = "color: black">
                                        Pendentes
                                    </a>
                                    <a class="nav-link" href="/em_andamento" style = "color: black">
                                        Em andamento
                                    </a>
                                    <a class="nav-link" href="/entregas" style = "color: black">
                                        Entregues
                                    </a>
                                </nav>
                            </div>

                            <div class="sb-sidenav-menu-heading">Gerenciar</div>
                            <a class="nav-link" href="/home" style = "color: black">
                                <div class="sb-nav-link-icon" style = "color: black"><i class="fa-solid fa-hand-holding-medical"></i> </div>
                                Farmácias
                            </a>
                            <a class="nav-link" href="/entregadores" style = "color: black">
                                <div class="sb-nav-link-icon" style = "color: black"><i class="fa-solid fa-motorcycle"></i></div>
                                Entregadores
                            </a>
                            
                            <a class="nav-link" href="/auditoria" style = "color: black">
                                <div class="sb-nav-link-icon" style = "color: black"><i class="fas fa-table"></i></div>
                                Auditoria
                            </a>
                            <a class="nav-link" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();" style = "color: black">
                                        <i class="fa fa-sign-out nav-icon"> </i>
                                {{ __('Sair') }}
                            </a>
                                    
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                  
                </nav>
            </div>