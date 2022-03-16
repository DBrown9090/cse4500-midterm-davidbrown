@extends('adminlte::page')

@section('title', 'Users')

@section('content_header')
    <h1>User List</h1>
@stop

@section('content')
<div class="card">
  <p>This lists all of the Users available</p>
  <div class="card-body">
    <table id="table" class="table table-bordered">
      <thead>
        <tr>
          <th style="width: 10px">#</th><th>Name</th><th>email</th><th>phone</th><th>View</th>
        </tr>
      </thead>
      <tbody>

        @foreach($res AS $r)
        <tr>
          <td>{{ $r->id }}</td>
          <td>{{ $r->Name }}</td>
          <td>{{ $r->email}}</td>
          <td>{{ $r->phone}}</td>
          <td><a href="{{ route('employees.show',['employee'=>$r->id])}}">View</a></td>
        </tr>
        @endforeach

      </tbody>
    </table>
  </div>
</div>
<a href="{{ route('employees.create') }} " class="btn btn-primary" >Create New Category</a>
@stop

@section('js')
<script>
    /*$(document).ready(function() {
        $('#table').DataTable();
    } );*/
</script>
@stop
