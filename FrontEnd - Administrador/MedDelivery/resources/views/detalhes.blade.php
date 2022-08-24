@extends('layouts.master')
@section('content')

<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>Endereço:</h4>
        </div>
        <div class="card-body" style="overflow-x:auto;">
            <div class="card">
                <div class="card-body">
                @csrf   
                <div class="row">        
                    <div class="form-group">
                        <label for="rua">Rua:</label>
                        <p>{{$responseArray['rua']}}</p>
                    </div>
                    <div class="form-group">
                        <label for="numero">Número:</label>
                        <p>{{$responseArray['numero']}}</p>
                    </div>
                    <div class="form-group">
                        <label for="bairro">Bairro:</label>
                        <p>{{$responseArray['bairro']}}</p>
                    </div>
                    <div class="form-group">
                        <label for="cidade">Cidade:</label>
                        <p>{{$responseArray['cidade']}}</p>
                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>
</div>


@endsection