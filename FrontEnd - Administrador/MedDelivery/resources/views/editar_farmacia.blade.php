@extends('layouts.master')
@section('content')

<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>Editar Dados da Farmácia</h4>
        </div>
        <div class="card-body" style="overflow-x:auto;">
            <div class="card">
                <div class="card-body">
                @csrf
                    <form action="{{ route('editar_farmacias', ['id' => $responseArray['id']]) }}"  method="get">   
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="nome_farmacia">Nome:</label>
                                    <input type="text" name="nome_farmacia" value="{{$responseArray['nome_farmacia']}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="text" name="email" value="{{$responseArray['email']}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="cnpj">Cnpj:</label>
                                    <input type="text" name="cnpj" value="{{$responseArray['cnpj']}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="telefone">Telefone:</label>
                                    <input type="text" name="telefone" value="{{$responseArray['telefone']}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="rua">Rua:</label>
                                    <input type="text" name="rua" value="{{$responseArray['rua']}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="numero">Número:</label>
                                    <input type="text" name="numero" value="{{$responseArray['numero']}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="bairro">Bairro:</label>
                                    <input type="text" name="bairro" value="{{$responseArray['bairro']}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="cidade">Cidade:</label>
                                    <input type="text" name="cidade" value="{{$responseArray['cidade']}}" class="form-control">
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


@endsection