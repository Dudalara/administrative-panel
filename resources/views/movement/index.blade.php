@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="d-flex flex-row-reverse mb-2">
            <a class="col-2 btn btn-dark" href="{{ route('movement.create') }}">Cadastrar Movimentação</a>
        <form class="col-10 row" action="{{ route('movement.index') }}"  method="GET">
            <div class="col-3 mx-2">
                <input type="text" class="form-control" placeholder="Nome do funcionário" name="fullname">
            </div>
            <div class="col-3 mx-2">
                <input type="date" class="form-control" placeholder="Data de criação" name="date_created">
            </div>
            <div class="col-2 mx-2">
                <select class="form-control" name="type">
                    <option value="">Tipo de movimentação</option>
                    <option value="IN">Entrada</option>
                    <option value="OUT">Saída</option>[]
                </select>
            </div>
             <button class="col-2 mx-2 btn btn-dark" type="submit">Buscar</button>
        </form>
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
