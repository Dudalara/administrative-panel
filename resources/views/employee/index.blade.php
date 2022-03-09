@extends('layouts.app')

@section('content')
    <div class="container">
    <div class="row">
      <div class="input-group input-icon">
            <form class="example" action="{{ route('employee.index') }}" method="get">
                <input type="text" placeholder="Search.." name="search">
                <button type="submit"><i class="fa fa-search"></i></button>'
            </form>
      </div>
      <a class="col-3 btn btn-primary" href="{{ route('employee.create') }}">Cadastrar Funcionário</a>
    </div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Saldo atual</th>
                <th>Data de criação</th>
                <th class="text-sm-center">Ações</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                    <tr>
                        <td>{{ $employee->id }}</td>
                        <td>{{ $employee->fullname }}</td>
                        <td>{{ $employee->current_balance/100}}</td>
                        <td>{{ $employee->created_at}}</td>
                        <td>
                            <nav class="nav nav-pills flex-column flex-sm-row">
                                <a href={{ route('employee.edit', $employee->id) }}>
                                    Editars
                                </a>
                                <form action="{{ route('employee.destroy', $employee->id)}}" method="POST" class="float-right" >
                                            @csrf
                                            @method('DELETE')
                                    <button type="submit">
                                        Excluir
                                </button>
                            </form>
                            </nav>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection]
<script>

</script>