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
    <?php if (!in_array('date',$v)) { ?>
      <x-adminlte-input name="{{ $k; }}" label="{{ $k; }}" />
    <?php } else { ?>
      <x-adminlte-input-date name="{{ $k; }}" label="{{ $k; }}" />
    <?php } ?>
    @endforeach
    <x-adminlte-button type="Submit" label="Submit" />
</form>
@stop
