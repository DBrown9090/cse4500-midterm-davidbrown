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
      @if ($k == 'Invoice')
        <x-adminlte-input name="{{ $k; }}" label="{{ $k; }}" type="date" value="{{ $res->{$k}; }}"/>
      <?php //@elseif ($k == 'Price')
        //<x-adminlte-input name="{{ $k; }}" label="{{ $k; }}" value="{{ $res->{$k}; }}" step="0.01" /> ?>
      @else
        <x-adminlte-input name="{{ $k; }}" label="{{ $k; }}" value="{{ $res->{$k}; }}"/>
      @endif
    @endforeach
    <x-adminlte-button type="Submit" label="Submit" />
</form>
@stop

<?php /*     <x-adminlte-input name="Name" label="Name" value="{{$res->Name}}"/>
    <x-adminlte-input name="email" label="email" value="{{$res->email}}"/>
    <x-adminlte-input name="phone" label="phone" value="{{$res->phone}}"/> */ ?>
