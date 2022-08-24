@extends('layouts.master')

@section('content')

<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>Minhas Entregas</h4>
            
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
                        <th>id_cliente</th>
                        <th>Status</th>
                        <th>Cidade</th>
                        <th>Ações</th>
                    </tr>
                </thead>
            
                <tbody>
                    @foreach($response2 as $entrega)
                    @if($entrega['entrega_status'] == 'Em andamento' && $entrega['id_entregador'] == $id_log)
                    <tr>
                        <td>{{ $entrega['id_entrega'] }}</td>
                        <td>{{ $entrega['id_cliente'] }}</td>
                        <td>{{ $entrega['entrega_status'] }}</td>
                        <td>{{ $entrega['cidade'] }}</td>     
                        
                        <td>
                            <form class="formulario" action="{{ route('finalizar', ['id' => $entrega['id_entrega']]) }}" method="get"> 
                                <button type="submit" class="btn btn-danger btn-sm" style="margin-bottom:10px; width: 75px;">Finalizar</button>
                            </form>
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
