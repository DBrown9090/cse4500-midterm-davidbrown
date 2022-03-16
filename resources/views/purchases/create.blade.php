@extends('adminlte::page')

@section('title', $o.' Creation')

@section('content_header')
    <h1>{{ $o; }} Creation</h1>
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
    <?php if (in_array('date',$v)) { ?>
      <x-adminlte-input name="{{ $k; }}" label="{{ $k; }}" type="date" />
    <?php } else if (in_array('numeric', $v)) {
      $step = "0";
      if ($k == 'Price') { $step = "0.01";}
    ?>
      <x-adminlte-input name="{{ $k; }}" label="{{ $k; }}" type="number" step="{{ $step; }}" />
    <?php } else { ?>
      <x-adminlte-input name="{{ $k; }}" label="{{ $k; }}" />
    <?php } ?>
    @endforeach
    <x-adminlte-button type="Submit" label="Submit" />
</form>
@stop
