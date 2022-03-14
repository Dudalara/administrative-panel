@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="d-flex flex-row-reverse mb-2">
        <a class="col-3 btn btn-dark" href="{{ route('movement.create') }}">Cadastrar Movimentação</a>
        </div>
        <table class="table table-dark table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Tipo</th>
                <th>Valor</th>
                <th>Funcionário</th>
                <th>Observação</th>
                <th class="text-sm-right">Data de Criação</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($movements as $movement)
                    <tr>
                        <td>{{ $movement->id }}</td>
                        <td>{{ $movement->type }}</td>
                        <td>R$ {{ $movement->amount}}</td>
                        <td>{{ $movement->employee_name}}</td>
                        <td>{{ $movement->note}}</td>
                        <td>{{ date_format($movement->created_at, "d/m/Y")}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
<div class="mt-5 float-right flex-wrap">
  {!! prettyPaginationLinks($movements->links()) !!}
</div>
    </div>
@endsection
