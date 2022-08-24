@extends('layouts.master')

@section('content')

<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>Gerenciar Entregadores</h4>
            <a href="#" class="btn btn-dark btn-sm float-end">
            <i class="fa-solid fa-motorcycle"></i>    
                Adicionar Entregador 
            </a>
        </div>
        <div class="card-body" style="overflow-x:auto;">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Cpf</th>
                        <th>Email</th>
                        <th>Telefone</th>
                        <th>Ações</th>
                    </tr>
                </thead>
            
                <tbody>
                    @foreach($responseArray as $entregador)
                    @if($entregador['active'])
                    <tr>
                        <td>{{ $entregador['id_entregador'] }}</td>
                        <td>{{ $entregador['nome'] }}</td>
                        <td>{{ $entregador['cpf'] }}</td>
                        <td>{{ $entregador['email'] }}</td>
                        <td>{{ $entregador['telefone'] }}</td>
                        
                        <td>
                            <form class="formulario" action="{{ route('edit_entregadores', ['id' => $entregador['id_entregador']]) }}" method="get"> 
                                <button type="submit" class="btn btn-primary btn-sm" style="margin-bottom:10px; width: 75px;">Editar</button>
                            </form>
                            <form class="formulario" action="{{ route('delete_entregador', ['id' => $entregador['id_entregador']]) }}" method="get"> 
                                <button type="submit" class="btn btn-danger btn-sm" style="margin-bottom:10px; width: 75px;">Remover</button>
                            </form>
                        </td>        
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
