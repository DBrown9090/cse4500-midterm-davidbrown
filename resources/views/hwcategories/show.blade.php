@extends('adminlte::page')

@section('title', 'Category')

@section('content_header')
    <h1>Category</h1>
@stop

@section('content')
  <h2>{{ $cat->id; }} - {{ $cat->Name; }}</h2>
  <h3><div><a href="{{route('hwcategories.edit', ['hwcategory'=>$cat->id]) }}" class="btn btn-primary" >Edit</a></div></h3>
  <h3><div>
    <form class="delete" action="{{route('hwcategories.destroy', ['hwcategory'=>$cat->id])}}" method="delete">
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
