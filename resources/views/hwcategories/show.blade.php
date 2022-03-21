@extends('adminlte::page')

@section('title', 'Category')

@section('content_header')
    <h1>Hardware Category</h1>
@stop

@section('content')
  <h3>{{ $cat->id; }} - {{ $cat->Name; }}</h3>
  <h4><div><a href="{{route('hwcategories.edit', ['hwcategory'=>$cat->id]) }}" class="btn btn-primary" >Edit</a>
    <form style="display:inline"class="delete" action="{{route('hwcategories.destroy', ['hwcategory'=>$cat->id])}}" method="post">
      @method('delete')
      @csrf
      <input type="hidden" name="_method" value="DELETE">
      <input type="submit" value="Delete Category" class="btn btn-danger">
    </form>
  </div></h4>
@stop

@section('js')
<script>
    $(".delete").on("submit", function(){
      return confirm("Are you sure?");
    });
</script>
@stop
