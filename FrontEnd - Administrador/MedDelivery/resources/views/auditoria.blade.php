@extends('layouts.master')

@section('content')

<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>Auditoria - Status das entregas</h4>
        </div>
        <div class="card-body" style="overflow-x:auto;">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Coluna alterada</th>
                        <th>Status anterior</th>
                        <th>Novo status</th>
                        <th>Data</th>
                    </tr>
                </thead>
            
                <tbody>
                    @foreach($response2 as $audit)
                    <tr>
                        <td>{{ $audit['id'] }}</td>
                        <td>{{ $audit['coluna_alterada'] }}</td>
                        <td>{{ $audit['old_status'] }}</td>
                        <td>{{ $audit['new_status'] }}</td>
                        <td>{{ $audit['created_at'] }}</td>
                               
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
