@extends('adminlte::page')

@section('title', 'Category')

@section('content_header')
    <h1>Category</h1>
@stop

@section('content')
  <h2>Category Number {{ $cat->id; }}</h2>
<form method="post" action="{{ route('hwcategories.update', ['hwcategory'=>$cat->id]) }}" >
    @csrf
    <x-adminlte-input name="Name" label="Name" />
    <x-adminlte-button type="Submit" label="Submit" />
</form>
@stop
