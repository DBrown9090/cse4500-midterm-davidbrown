@extends('adminlte::page')

@section('title', 'Category')

@section('content_header')
    <h1>Hardware Category</h1>
@stop

@section('content')
  <h2>Category Number {{ $cat->id; }}</h2>
<form method="post" action="{{ route('hwcategories.update', ['hwcategory'=>$cat->id]) }}" >
    @method('patch')
    @csrf
    <x-adminlte-input name="Name" label="Name" value="{{$cat->Name}}"/>
    <x-adminlte-button type="Submit" label="Submit" theme="primary" />
</form>
@stop
