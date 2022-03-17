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
    <?php if ($k == 'manufacturer_id') {
      $mana = array();
      foreach($res->man as $r)
      {
        $mana[$r->id] = $r->name;
      }
      ?>
      <x-adminlte-select name="manufacturer_id">
        <x-adminlte-options :options="$mana" placeholder="Manufacturer" />
      </x-adminlte-select>
    <?php } else if ($k == 'hwcategory_id') {
      $cata = array();
      foreach($res->cat as $r)
      {
        $cata[$r->id] = $r->name;
      }
      ?>
      <x-adminlte-select name="hwcategory_id">
        <x-adminlte-options :options="$cata" placeholder="Category" />
      </x-adminlte-select>
    <?php } else { ?>
      <x-adminlte-input name="{{ $k; }}" label="{{ $o; }} {{ $k; }}" />
    <?php } ?>

    @endforeach
    <x-adminlte-button type="Submit" label="Submit" />
</form>
@stop

<?php /*   <x-adminlte-input name="Name" label="User Name" />
    <x-adminlte-input name="email" label="User Email" />
    <x-adminlte-input name="phone" label="User Phone" />*/ ?>
