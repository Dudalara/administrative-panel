@extends('layouts.app')

@section('content')
@if ($errors->any())
@endif
<form action="{{route('employee.update', $employee->id)}}" method="POST">
    @method('PATCH')
    @csrf
   @include('employee.components.form', ['employee' => $employee ])
</form>
@endsection