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
    <?php if ($k == 'unit_id') {
      $mana = array();
      foreach($res->units as $r)
      {
        $mana[$r->id] = $r->Name;
      }
      ?>
      <x-adminlte-select name="unit_id" label="Unit">
        <x-adminlte-options :options="$mana" placeholder="Unit" />
      </x-adminlte-select>
    <?php } else { ?>
      <x-adminlte-input name="{{ $k; }}" label="{{ $o; }} {{ $k; }}" />
    <?php } ?>

    @endforeach
    <x-adminlte-button type="Submit" label="Submit" theme="primary" />
</form>
@stop
