@extends('layouts.master')

@section('content')

<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>Minhas solicitações</h4>
            <a href="solicitarEntrega" class="btn btn-dark btn-sm float-end">
            <i class="fa-solid fa-circle-plus"></i>   
                Solicitar entrega 
            </a>
        </div>
        <div class="card-body" style="overflow-x:auto;">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Cliente</th>
                        <th>Status</th>
                        <th>Cidade</th>
                        <th>Data</th>
                        <th>Ações</th>
                    </tr>
                </thead>
            
                <tbody>
                    @foreach($response2 as $entrega)
                    
                    @if($entrega['entrega_status'] == 'Pendente' && $entrega['id_cliente'] == $id_log && $entrega['active'])
                    <tr>
                        <td>{{ $entrega['nome'] }}</td>
                        <td>{{ $entrega['entrega_status'] }}</td>
                        <td>{{ $entrega['cidade'] }}</td>  
                        <td>{{ $entrega['created_at']}}</td>     
                        
                        <td>
                            <form class="formulario" action="{{ route('details', ['id' => $entrega['id_entrega']]) }}" method="get"> 
                                <button type="submit" class="btn btn-primary btn-sm" style="margin-bottom:10px; width: 75px;">Detalhes</button>
                            </form>
                    
                            <form class="formulario" action="{{ route('edit_entregas', ['id' => $entrega['id_entrega']]) }}" method="get"> 
                                <button type="submit" class="btn btn-warning btn-sm" style="margin-bottom:10px; width: 75px;">Editar</button>
                            </form>
                            <form class="formulario" action="{{ route('delete_entrega', ['id' => $entrega['id_entrega']]) }}" method="get"> 
                                <button type="submit" class="btn btn-danger btn-sm" style="margin-bottom:10px; width: 75px;">Cancelar</button>
                            </form>
                        </td>        
                    </tr>
                    @endif
                    @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
