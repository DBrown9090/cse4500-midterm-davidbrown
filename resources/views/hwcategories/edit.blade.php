@extends('adminlte::page')

@section('title', 'Category')

@section('content_header')
    <h1>Category</h1>
@stop

@section('content')
  <h2>Category Number {{ $cat->id; }}</h2>
<form method="patch" action="{{ route('hwcategories.update', ['hwcategory'=>$cat->id]) }}" >
    @csrf
    <x-adminlte-input name="Name" label="Name" value="{{$cat->Name}}"/>
    <x-adminlte-button type="Submit" label="Submit" />
</form>
@stop
