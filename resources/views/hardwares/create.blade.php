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
        $mana[$r->id] = $r->Name;
      }
      ?>
      <x-adminlte-select name="manufacturer_id" label="Manufacturer">
        <x-adminlte-options :options="$mana" placeholder="Manufacturer" />
      </x-adminlte-select>
    <?php } else if ($k == 'hwcategory_id') {
      $cata = array();
      foreach($res->cat as $r)
      {
        $cata[$r->id] = $r->Name;
      }
      ?>
      <x-adminlte-select name="hwcategory_id" label="Category">
        <x-adminlte-options :options="$cata" placeholder="Category" />
      </x-adminlte-select>
    <?php } else { ?>
      <x-adminlte-input name="{{ $k; }}" label="{{ $o; }} {{ $k; }}" />
    <?php } ?>

    @endforeach
    <x-adminlte-button type="Submit" label="Submit" theme="primary" />
</form>
@stop
