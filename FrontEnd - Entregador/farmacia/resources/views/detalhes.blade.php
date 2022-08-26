@extends('layouts.master')

@section('content')
                <div class="container-fluid px-4">
                    <div class="card mt-4">
                        <div class="card-header">
                            <h4>Detalhes da entrega:</h4>
                        </div>
                        <div class="card-body" style="overflow-x:auto;">
                            <div class="card">
                                <div class="card-body">
                                @csrf   
                                <div class="row">  
                                    <div class="form-group">
                                        <label for="rua">Nome:</label>
                                        <p>{{$response2['nome']}}</p>
                                    </div>      
                                    <div class="form-group">
                                        <label for="rua">Rua:</label>
                                        <p>{{$response2['rua']}}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="numero">Número:</label>
                                        <p>{{$response2['numero']}}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="bairro">Bairro:</label>
                                        <p>{{$response2['bairro']}}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="cidade">Cidade:</label>
                                        <p>{{$response2['cidade']}}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="cep">Cep:</label>
                                        <p>{{$response2['cep']}}</p>
                                    </div>
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            @include('layouts.entregador-footer')
        </div>
    </div>
@endsection