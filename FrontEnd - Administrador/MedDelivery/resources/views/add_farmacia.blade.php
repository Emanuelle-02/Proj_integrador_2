@extends('layouts.master')
@section('content')

<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>Adicionar Farmácia</h4>
        </div>
        <div class="card-body" style="overflow-x:auto;">
            <div class="card">
                <div class="card-body">
                    <form action="add_farmacias" method="get">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for="nome_farmacia">Nome:</label>
                                    <input type="text" name="nome_farmacia" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="text" name="email" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="password" aria-hidden="true">Senha:</label>
                                    <input type="password" name="password" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="cnpj">Cnpj:</label>
                                    <input type="text" name="cnpj" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="telefone">Telefone:</label>
                                    <input type="text" name="telefone" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="rua">Rua:</label>
                                    <input type="text" name="rua" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="numero">Número:</label>
                                    <input type="text" name="numero" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="bairro">Bairro:</label>
                                    <input type="text" name="bairro" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="cidade">Cidade:</label>
                                    <input type="text" name="cidade" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <br>
                        <button class="btn btn-dark"><i class="fa-solid fa-hand-holding-medical"></i> Adicionar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection