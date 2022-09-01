@extends('layouts.master')
@section('content')

<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>Relatório Anual</h4>
            <a href="/" class="btn btn-dark btn-sm float-end">
            <i class="fa-solid fa-download"></i>  
                Fazer download 
            </a>
        </div>
        <div class="card-body" style="overflow-x:auto;">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Total de solicitações - 2022</th>
                        <th>Solicitações canceladas - 2022</th>
                        <th>Entregas efetuadas - 2022</th>
                        <th>Entregas em andamento - 2022</th>
                        <th>Valor gasto em entregas - 2022</th>
                    </tr>
                </thead>
            
                <tbody>
                    <tr>
                        <td>{{ $responseArray2['totalEntregas'] }}</td>
                        <td>{{ $responseArray2['totalCancel'] }}</td>
                        <td>{{ $responseArray2['entregasRealizadas'] }}</td>
                        <td>{{ $responseArray2['totalAndamento'] }}</td>
                        <td>R$ {{ $responseArray2['totalFrete'] }}</td>
                        
                    </tr>
                </tbody>
            </table>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Cliente</th>
                        <th>Rua</th>
                        <th>Cidade</th>
                        <th>Medicamento</th>
                        <th>Preço</th>
                    </tr>
                </thead>
            
                <tbody>
                @foreach($responseArray as $entrega)
                @if($entrega['active'])
                    <tr>
                        <td>{{ $entrega['nome'] }}</td>
                        <td>{{ $entrega['rua'] }}</td>
                        <td>{{ $entrega['cidade'] }}</td>
                        <td>{{ $entrega['medicamento'] }}</td>
                        <td>{{ $entrega['preco'] }}</td>
                    </tr>
                @endif
                @endforeach
                </tbody>
            </table>
            
        </div>
    </div>
</div>






@endsection