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
      @if ($k == 'PurchaseDate')
        <x-adminlte-input name="{{ $k; }}" label="{{ $k; }}" type="date" value="{{ $res->{$k}; }}"/>
      @else
        <x-adminlte-input name="{{ $k; }}" label="{{ $k; }}" value="{{ $res->{$k}; }}"/>
      @endif
    @endforeach
    <x-adminlte-button type="Submit" label="Submit" theme="primary"/>
</form>
@stop
