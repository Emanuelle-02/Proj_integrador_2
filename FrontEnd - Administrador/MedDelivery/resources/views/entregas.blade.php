@extends('layouts.master')

@section('content')

<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>Entregas realizadas</h4>
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
                    </tr>
                </thead>
            
                <tbody>
                    @foreach($response2 as $entrega)
                    @if($entrega['entrega_status'] == "Entregue")
                    <tr>
                        <td>{{ $entrega['id_entrega'] }}</td>
                        <td>{{ $entrega['id_cliente'] }}</td>
                        <td>{{ $entrega['entrega_status'] }}</td>
                        <td>{{ $entrega['cidade'] }}</td> 
                        <td>{{ $entrega['created_at'] }}</td> 
                        <td>R$ {{ $entrega['preco'] }},00</td>     
                              
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
