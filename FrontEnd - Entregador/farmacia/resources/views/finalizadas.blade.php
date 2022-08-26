@extends('layouts.master')

@section('content')

<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>Entregas finalizadas</h4>
        </div>
        <div class="card-body" style="overflow-x:auto;">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>id_cliente</th>
                        <th>Status</th>
                        <th>Cidade</th>
                        <th>Data</th>
                        <th>Valor</th>
                        <th>Ações</th>
                    </tr>
                </thead>
            
                <tbody>
                    @foreach($response2 as $entrega)
                    @if($entrega['entrega_status'] == 'Entregue' && $entrega['id_entregador'] == $id_log)
                    <tr>
                        <td>{{ $entrega['id_entrega'] }}</td>
                        <td>{{ $entrega['id_cliente'] }}</td>
                        <td>{{ $entrega['entrega_status'] }}</td>
                        <td>{{ $entrega['cidade'] }}</td>
                        <td>{{ $entrega['created_at'] }}</td> 
                        <td>R$ {{ $entrega['preco'] }},00</td>      
                        
                        <td>
                            <form class="formulario" action="{{ route('details', ['id' => $entrega['id_entrega']]) }}" method="get"> 
                                <button type="submit" class="btn btn-dark btn-sm" style="margin-bottom:10px; width: 75px;">Detalhes</button>
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
