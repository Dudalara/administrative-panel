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
        <div class="messages">
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
                                <button type="button" class="btn btn-success btn-lg mt-2 ml-2" data-toggle="modal" data-target="#deleteModal" data-id="{{  $employee->id}}">Excluir</button>
                            </nav>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    {!! prettyPaginationLinks($employees->links()) !!}
    </div>
    <div id="deleteModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <p>Tem certeza que deseja excluir? </p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Fechar</button>
                    <form action="{{ route('employee.destroy', $employee->id)}}" method="POST" class="float-right" >
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="employee_id" id="employee_id">
                        <button type="submit" class="btn btn-success">Excluir</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<script type="text/javascript">
    $('#deleteModal').on('show.bs.modal', function (event){
        var button = $(event.relatedTarget);
        var recipientId = button.data('id');

        var modal = $(this);
        modal.find('#employee_id').val(recipientId);
    })
</script>
@endsection
