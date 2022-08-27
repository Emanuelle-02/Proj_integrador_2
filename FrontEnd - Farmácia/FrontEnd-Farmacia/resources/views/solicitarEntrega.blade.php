@extends('layouts.master')
@section('content')

<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>Solicitar entrega</h4>
        </div>
        <div class="card-body" style="overflow-x:auto;">
            <div class="card">
                <div class="card-body">
                    <form action="add_entrega" method="get">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-md-10">
                            <div class="form-group">
                                    <label for="medicamento">Medicamento:</label>
                                    <input type="text" name="medicamento" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="nome">Nome:</label>
                                    <input type="text" name="nome" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="rua">Rua:</label>
                                    <input type="text" name="rua" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="numero">Número:</label>
                                    <input type="text" name="numero" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="bairro">Bairro:</label>
                                    <input type="text" name="bairro" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="cep">Cep:</label>
                                    <input type="text" name="cep" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <br>
                        <button class="btn btn-dark"><i class="fa-solid fa-hand-holding-medical"></i> Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection