@extends('adminlte::page')

@section('title', 'Show '.$o)

@section('content_header')
    <h1>Show {{ $o; }}</h1>
@stop

@section('content')
<div class="card">
  <div class="card-body">
    <table id="table" class="table table-bordered">
      <thead>
        <tr>
          <th style="width: 10px">#</th>
          @foreach($valid as $k=>$v)
          <th>
            @if($k == 'SalesInfo')
              Sales Information
            @elseif($k == 'SupportInfo')
              Support Information
            @else
              {{ $k }}
            @endif
          </th>
          @endforeach
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>{{ $res->id }}</td>
          @foreach($valid as $k=>$v)
          <td style="white-space: pre-line;">{{ $res->{$k} }}</td>
          @endforeach
        </tr>
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
