@extends('adminlte::page')

@section('title', 'Edit '.$o)

@section('content_header')
    <h1>Edit {{$o}}</h1>
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
  <h2>{{ $o; }} Number {{ $res->id; }}</h2>
<form method="post" action="{{ route($n.'.update', [(string)$m=>$res->id]) }}" >
    @method('patch')
    @csrf
    @foreach($valid as $k=>$v)
    <x-adminlte-input name="{{ $k; }}" label="{{ $o; }} {{ $k; }}" value="{{ $res->{$k} }}" />
    @endforeach
    <x-adminlte-button type="Submit" label="Submit" theme="primary" />
</form>
@stop

<?php /*     <x-adminlte-input name="Name" label="Name" value="{{$res->Name}}"/>
    <x-adminlte-input name="email" label="email" value="{{$res->email}}"/>
    <x-adminlte-input name="phone" label="phone" value="{{$res->phone}}"/> */ ?>
