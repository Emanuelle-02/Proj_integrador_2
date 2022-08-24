@extends('layouts.master')
@section('content')

<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>Cadastrar Entregador</h4>
        </div>
        <div class="card-body" style="overflow-x:auto;">
            <div class="card">
                <div class="card-body">
                    <form action="add_entregadores" method="get">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for="nome">Nome:</label>
                                    <input type="text" name="nome" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="cpf">Cpf:</label>
                                    <input type="text" name="cpf" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="text" name="email" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="senha">Senha:</label>
                                    <input type="password" name="senha" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="telefone">Telefone:</label>
                                    <input type="text" name="telefone" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <br>
                        
                        <button class="btn btn-dark"><i class="fa-solid fa-motorcycle"></i>  Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection