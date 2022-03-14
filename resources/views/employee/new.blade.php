@extends('layouts.app')

@section('content')
<form action="{{route('employee.new')}}" method="POST" >
    @csrf
   @include('employee.components.form')
</form>
@endsection