@extends('layouts.master')

@section('content')

<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>Em andamento</h4>
        </div>
        <div class="card-body" style="overflow-x:auto;">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Cliente</th>
                        <th>Status</th>
                        <th>Cidade</th>
                        <th>Data</th>
                    </tr>
                </thead>
            
                <tbody>
                    @foreach($response2 as $entrega)
                    
                    @if($entrega['entrega_status'] == 'Em andamento' && $entrega['id_cliente'] == $id_log && $entrega['active'])
                    <tr>
                        <td>{{ $entrega['nome'] }}</td>
                        <td>{{ $entrega['entrega_status'] }}</td>
                        <td>{{ $entrega['cidade'] }}</td>  
                        <td>{{ $entrega['created_at']}}</td>      
                    </tr>
                    @endif
                    @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
