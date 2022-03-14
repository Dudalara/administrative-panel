@extends('layouts.app')

@section('content')

<form action="{{route('movement.new')}}" method="POST" >
    @csrf
   @include('movement.components.form')
</form>
@endsection