@extends('layouts.app')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger mt-5">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{route('employee.new')}}" method="POST" >
    @csrf
   @include('employee.components.form')
</form>
@endsection