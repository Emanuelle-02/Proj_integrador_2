@extends('layouts.master')

@section('content')
                <div class="container-fluid px-4">
                    <div class="card mt-4">
                        <div class="card-header">
                            <h4>Editar Entrega</h4>
                        </div>
                        <div class="card-body" style="overflow-x:auto;">
                            <div class="card">
                                <div class="card-body">
                                @csrf
                                    <form action="{{ route('editar_entregas', ['id' => $response2['id_entrega']]) }}"  method="get">   
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label for="nome">Nome:</label>
                                                    <input type="text" name="nome" value="{{$response2['nome']}}" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="entrega_status">Status:</label>
                                                    <input type="text" name="entrega_status" value="{{$response2['entrega_status']}}" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="rua">Rua:</label>
                                                    <input type="text" name="rua" value="{{$response2['rua']}}" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="numero">Número:</label>
                                                    <input type="text" name="numero" value="{{$response2['numero']}}" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="bairro">Bairro:</label>
                                                    <input type="text" name="bairro" value="{{$response2['bairro']}}" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="cidade">Cidade:</label>
                                                    <input type="text" name="cidade" value="{{$response2['cidade']}}" class="form-control">
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
                    </main>
            @include('layouts.entregador-footer')
        </div>
    </div>
@endsection