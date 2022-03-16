@extends('adminlte::page')

@section('title', $o.'s')

@section('content_header')
    <h1>{{ $o; }} List</h1>
@stop

@section('content')
<div class="card">
  <p>This lists all of the {{ $o; }}s available</p>
  <div class="card-body">
    <table id="table" class="table table-bordered">
      <thead>
        <tr>
          <th style="width: 10px">#</th>
          @foreach($valid as $k=>$v)
          <th>{{ $k }}</th>
          @endforeach
          <th>View</th>
        </tr>
      </thead>
      <tbody>

        @foreach($res AS $r)
        <tr>
          <td>{{ $r->id }}</td>
          @foreach($r as $k=>$v)
          <?php dump($v); ?>
          @endforeach
          <td><a href="{{ route($n.'.show',[(string)$m=>$r->id])}}">View</a></td>
        </tr>
        @endforeach

      </tbody>
    </table>
  </div>
</div>
<a href="{{ route($n.'.create') }} " class="btn btn-primary" >Create New {{ $o; }}</a>
@stop

@section('js')
<script>
    /*$(document).ready(function() {
        $('#table').DataTable();
    } );
    */
</script>
@stop
