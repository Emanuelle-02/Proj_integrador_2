@extends('layouts.master')

@section('content')

<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>Gerenciar Farmácias</h4>
            <a href="add_farmacia" class="btn btn-dark btn-sm float-end">
                <i class="fa-solid fa-hand-holding-medical"></i>    
                Adicionar Farmácia 
            </a>
            <!--form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form -->
        </div>
        <div class="card-body" style="overflow-x:auto;">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Telefone</th>
                        <th>Cidade</th>
                        <th>Ações</th>
                    </tr>
                </thead>
            
                <tbody>
                    @foreach($response2 as $farmacia)
                    @if($farmacia['active'])
                    <tr>
                        <td>{{ $farmacia['id'] }}</td>
                        <td>{{ $farmacia['nome_farmacia'] }}</td>
                        <td>{{ $farmacia['email'] }}</td>
                        <td>{{ $farmacia['telefone'] }}</td>
                        <td>{{ $farmacia['cidade'] }}</td>
                        
                        <td>
                            <form class="formulario" action="{{ route('farmDetails', ['id' => $farmacia['id']]) }}" method="get"> 
                                <button type="submit" class="btn btn-dark btn-sm" style="margin-bottom:10px; width: 75px;">Detalhes</button>
                            </form>
                            <form class="formulario" action="{{ route('edit_farmacia', ['id' => $farmacia['id']]) }}" method="get"> 
                                <button type="submit" class="btn btn-primary btn-sm" style="margin-bottom:10px; width: 75px;">Editar</button>
                            </form>
                            <form class="formulario" action="{{ route('delete_farmacia', ['id' => $farmacia['id']]) }}" method="get"> 
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
