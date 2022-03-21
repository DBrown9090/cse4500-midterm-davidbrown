@extends('adminlte::page')

@section('title', 'Show '.$o)

@section('content_header')
    <h1>Show {{ $o; }}</h1>
@stop

@section('content')
<div class="card">
  <div class="card-body">
    <table id="table" class="table table-bordered">
      <tbody>
        <tr><td>Id</td><td>{{ $res->id }}</td></tr>
        @foreach($valid as $k=>$v)
        @if($k == 'unit_id')<tr><td>Unit</td><td><a href="{{ route('units.show', ['unit'=>$res->{$k} ] ) }}">{{ $res->unit->Name }}</a></td></tr>
        @else<tr><td>{{$k}}</td><td style="white-space: pre-line;">{{ $res->{$k} }}</td>@endif
        @endforeach
      </tbody>
    </table>
  </div>
</div>
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
