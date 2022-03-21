@extends('adminlte::page')

@section('title', $o.' Creation')

@section('content_header')
    <h1>{{ $o;}} Creation</h1>
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
<form method="post" action="{{ route($n.'.store') }}" >
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
            <x-adminlte-options :options="$mana" placeholder="Hardware" />
          </x-adminlte-select>
        <?php } else if ($k == 'employee_id') {
          $mana = array();
          foreach($res->employee as $r)
          {
            $mana[$r->id] = $r->Name;
          }
          ?>
          <x-adminlte-select name="employee_id" label="Employee">
            <x-adminlte-options :options="$mana" placeholder="Employee"  />
          </x-adminlte-select>
        <?php } else if ($k == 'purchase_id') {
          $mana = array();
          foreach($res->purchase as $r)
          {
            $mana[$r->id] = $r->Invoice;
          }
          ?>
          <x-adminlte-select name="purchase_id" label="Purchase">
            <x-adminlte-options :options="$mana" placeholder="Purchase" />
          </x-adminlte-select>
        <?php } else { ?>
          <x-adminlte-input name="{{ $k; }}" label="{{ $o; }} {{ $k; }}" />
        <?php } ?>

    @endforeach
    <x-adminlte-button type="Submit" label="Submit" theme="primary" />
</form>
@stop

<?php /*   <x-adminlte-input name="Name" label="User Name" />
    <x-adminlte-input name="email" label="User Email" />
    <x-adminlte-input name="phone" label="User Phone" />*/ ?>
