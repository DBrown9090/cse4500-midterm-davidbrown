@extends('adminlte::page')

@section('title', 'Edit User')

@section('content_header')
    <h1>Edit User</h1>
@stop

@section('content')
<pre><?php if (!empty($request)) { var_dump($request);} ?></pre>
<pre><?php if (!empty($req)) { var_dump($req);} ?></pre>
<pre><?php if (!empty($res)) {var_dump($res);} ?></pre>
  <h2>User Number {{ $res->id; }}</h2>
<form method="post" action="{{ route('employees.update', ['employee'=>$res->id]) }}" >
    @method('patch')
    @csrf
    <x-adminlte-input name="Name" label="Name" value="{{$res->Name}}"/>
    <x-adminlte-input name="Name" label="email" value="{{$res->email}}"/>
    <x-adminlte-input name="Name" label="phone" value="{{$res->phone}}"/>
    <x-adminlte-button type="Submit" label="Submit" />
</form>
@stop
