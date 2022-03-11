@extends('layouts.app')

@section('content')
    <div class="container">
    <div class="row">
      <div class="input-group input-icon">
            <form class="example" action="{{ route('movement.index') }}" method="get">
                <input type="text" placeholder="Search.." name="search">
                <button type="submit"><i class="fa fa-search"></i></button>'
            </form>
      </div>
      <a class="col-3 btn btn-primary" href="{{ route('movement.create') }}">Cadastrar Movimentação</a>
    </div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Tipo</th>
                <th>Valor</th>
                <th>Funcionário</th>
                <th>Observação</th>
                <th>Data de Criação</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($movements as $movement)
                    <tr>
                        <td>{{ $movement->id }}</td>
                        <td>{{ $movement->type }}</td>
                        <td>{{ $movement->amount}}</td>
                        <td>{{ $movement->employee_name}}</td>
                        <td>{{ $movement->note}}</td>
                        <td>{{ $movement->created_at}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection]
<script>

</script>