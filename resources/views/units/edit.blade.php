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

    <?php if ($k == 'hardware_id') {
      $mana = array();
      foreach($res->hardware as $r)
      {
        $mana[$r->id] = $r->Name;
      }
      ?>
      <x-adminlte-select name="hardware_id" label="Hardware">
        <x-adminlte-options :options="$mana" placeholder="Hardware" :selected="$res->{$k}" />
      </x-adminlte-select>
    <?php } else if ($k == 'employee_id') {
      $mana = array();
      foreach($res->employee as $r)
      {
        $mana[$r->id] = $r->Name;
      }
      ?>
      <x-adminlte-select name="employee_id" label="Employee">
        <x-adminlte-options :options="$mana" placeholder="Employee" :selected="$res->{$k}" />
      </x-adminlte-select>
    <?php } else if ($k == 'purchase_id') {
      $mana = array();
      foreach($res->purchase as $r)
      {
        $mana[$r->id] = $r->Invoice;
      }
      ?>
      <x-adminlte-select name="purchase_id" label="Purchase">
        <x-adminlte-options :options="$mana" placeholder="Purchase" :selected="$res->{$k}" />
      </x-adminlte-select>
    <?php } else { ?>
      <x-adminlte-input name="{{ $k; }}" label="{{ $o; }} {{ $k; }}" value="{{ $res->{$k} }}" />
    <?php } ?>

    @endforeach

    <x-adminlte-button type="Submit" label="Submit" theme="primary" />
</form>
@stop
