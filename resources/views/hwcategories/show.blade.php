@extends('adminlte::page')

@section('title', 'Category')

@section('content_header')
    <h1>Category</h1>
@stop

@section('content')
  <h2>{{ $cat->id; }} - {{ $cat->Name; }}</h2>
  <div><a href="{{route('hwcategories.edit', ['hwcategory'=>$cat->id]) }}" class="btn btn-primary" >Edit</a></div>
  <div>
    <form class="delete" action="{{route('hwcategories.destroy', ['hwcategory'=>$cat->id])}}" method="POST">
      @csrf
      <input type="hidden" name="_method" value="DELETE">
      <input type="submit" value="Delete User">
    </form>
  </div>
@stop

@section('js')
<script>
    $(".delete").on("submit", function(){
      return confirm("Are you sure?");
    });
</script>
@stop
