@extends('layouts.master')
@section('content')

<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>Editar Entregador</h4>
        </div>
        <div class="card-body" style="overflow-x:auto;">
            <div class="card">
                <div class="card-body">
                @csrf
                    <form action="{{ route('editar_entregadores', ['id' => $responseArray['id_entregador']]) }}" method="get">
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for="nome">Nome:</label>
                                    <input type="text" name="nome" value="{{$responseArray['nome']}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="cpf">Cpf:</label>
                                    <input type="text" name="cpf" value="{{$responseArray['cpf']}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="text" name="email" value="{{$responseArray['email']}}" class="form-control">
                                </div>
                                
                                <div class="form-group">
                                    <label for="telefone">Telefone:</label>
                                    <input type="text" name="telefone" value="{{$responseArray['telefone']}}" class="form-control">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <button class="btn btn-dark" type="submit"><i class="fa-solid fa-motorcycle"></i>  Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection