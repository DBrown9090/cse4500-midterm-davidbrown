@extends('adminlte::page')

@section('title', 'User Creation')

@section('content_header')
    <h1>User Creation</h1>
@stop

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@section('content')
<form method="post" action="{{ route('employees.store') }}" >
    @csrf
    <x-adminlte-input name="Name" label="User Name" />
    <x-adminlte-input name="email" label="User Email" />
    <x-adminlte-input name="phone" label="User Phone" />
    <x-adminlte-button type="Submit" label="Submit" />
</form>
@stop
