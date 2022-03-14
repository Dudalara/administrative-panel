@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="d-flex flex-row-reverse mb-2">
            <a class=" btn btn-dark" href="{{ route('employee.create') }}">Cadastrar Funcionário</a>
        <form class="col-10 row" action="{{ route('employee.index') }}"  method="GET">
            <div class="col-3 mx-2">
                <input type="text" class="form-control" placeholder="Nome" name="fullname">
            </div>
            <div class="col-3 mx-2">
                <input type="date" class="form-control" placeholder="Data de criação" name="date_created">
            </div>
            <button class="col-3 mx-2 btn btn-dark" type="submit">Buscar</button>
        </form>
        </div>
         <div id="app">
        @include('messages-flash')
    </div>

        <table class="table table-dark table-striped" >
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
                            <td>R$ {{ $employee->current_balance}}</td>
                            <td>{{  date_format($employee->created_at, "d/m/Y")}}</td>
                            <td>
                            <nav class="nav nav-pills flex-column flex-sm-row">
                                <a href={{ route('employee.edit', $employee->id) }}>
                                    Editar
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

    {!! prettyPaginationLinks($employees->links()) !!}
    </div>
@endsection

