@extends('adminlte::page')

@section('title', 'Show '.$o)

@section('content_header')
    <h1>Show {{ $o; }}</h1>
@stop

@section('content')
  <h2>Id: {{ $res->id; }}</h2>
  @foreach($valid as $k=>$v)
  <h2>{{ $k; }}:
      @if($k == 'Price')
        {{$res->getFormattedPriceAttribute($res->{$k});}}
      @else
        {{ $res->{$k}; }}
      @endif
  </h2>
  @endforeach
  <hr>
  <h4><div><a href="{{route($n.'.edit', [(string)$m=>$res->id]) }}" class="btn btn-primary" >Edit</a>
    <form style="display:inline;" class="delete" action="{{route($n.'.destroy', [(string)$m=>$res->id])}}" method="post">
      @method('delete')
      @csrf
      <input type="hidden" name="_method" value="DELETE">
      <input type="submit" value="Delete {{ $o; }}" class="btn btn-danger">
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
