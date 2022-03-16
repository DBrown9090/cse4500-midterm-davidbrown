@extends('adminlte::page')

@section('title', 'Show User')

@section('content_header')
    <h1>Show User</h1>
@stop

@section('content')
{{echo '<pre>';
var_dump($request);
echo '</pre><pre>';
var_dump($req);
echo '</pre><pre>';
var_dump($res);
echo '</pre>';
exit;
die; }}
  <h2>{{ $res->id; }}</h2>
  <h2>{{ $res->Name; }}</h2>
  <h2>{{ $res->email;}}</h2>
  <h2>{{ $res->phone;}}</h2>
  <h3><div><a href="{{route('employees.edit', ['employee'=>$res->id]) }}" class="btn btn-primary" >Edit</a></div></h3>
  <h3><div>
    <form class="delete" action="{{route('employees.destroy', ['employee'=>$res->id])}}" method="post">
      @method('delete')
      @csrf
      <input type="hidden" name="_method" value="DELETE">
      <input type="submit" value="Delete Category">
    </form>
  </div></h3>
@stop

@section('js')
<script>
    $(".delete").on("submit", function(){
      return confirm("Are you sure?");
    });
</script>
@stop
