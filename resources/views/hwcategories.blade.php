@extends('adminlte::page')

@section('title', 'Hardware Categories')

@section('content_header')
    <h1>Hardware Categories</h1>
@stop

@section('content')
<div class="card">
  <p>This lists all the different categories of hardware available to us</p>
  <div class="card-body">
    <table id="table" class="table table-bordered">
      <thead>
        <tr>
          <th style="width: 10px">#</th><th>Name</th><th>View</th><th>Delete</th>
        </tr>
      </thead>
      <tbody>

        @foreach($cats AS $cat)
        <tr>
          <td>{{ $cat->id }}</td>
          <td>{{ $cat->Name }}</td>
          <td><a href="{{ route('hwcategories.show',['hwcategory'=>$cat->id])}}">View</a></td>
          <td><a href="{{ route('hwcategories.delete', ['hwcategory'=>$cat->id])}}">Delete</a></td>
        </tr>
        @endforeach

      </tbody>
    </table>
  </div>
</div>
<a href="{{ route('hwcategories.create') }} " class="btn btn-primary" >Create New Category</a>
@stop

@section('js')
<script>
    $(document).ready(function() {
        $('#table').DataTable();
    } );
</script>
@stop
