@extends('adminlte::page')

@section('title', 'Hardware Category Creation')

@section('content_header')
    <h1>Hardware Category Creation</h1>
@stop

@section('content')
<form method="post" action="{{ route('hwcategories.store') }}" >
    @csrf
    <x-adminlte-input name="Name" label="Category Name" />
    <x-adminlte-button type="Submit" label="Submit" theme="primary" />
</form>
@stop
