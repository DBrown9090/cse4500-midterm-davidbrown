@extends('adminlte::page')

@section('title', 'Show '.$o)

@section('content_header')
    <h1>Show {{ $o; }}</h1>
@stop

@section('content')
  <h2>Id: {{ $res->id; }}</h2>
  @foreach($valid as $k=>$v)
  <h2>
    @if($k == 'hardware_id')
      Hardware: <a href="{{ route('hardwares.show', ['hardware'=>$res->{$k} ?: 0 ] ) }}">{{ isset($res->hardware->Name) ? $res->hardware->Name : 'None' }}</a>
    @elseif($k == 'employee_id')
      Employee: <a href="{{ route('employees.show', ['employee'=>$res->{$k} ?: 0 ] ) }}">{{ isset($res->employee->Name) ? $res->employee->Name : 'None' }}</a>
    @elseif($k == 'purchase_id')
      Purchase: <a href="{{ route('purchases.show', ['purchase'=>$res->{$k} ?: 0 ] ) }}">{{ isset($res->purchase->Invoice) ? $res->purchase->Invoice : 'None' }}</a>
    @else
      {{ $k }}: {{ $res->{$k} }}
    @endif
  </h2>
  @endforeach
  <h2>Notes:</h2>
  <h3>
    @foreach($res->Notes as $note)
      <div>{{$note->id}}: <a href="{{ route('notes.show', ['note'=>$note->id ] ) }}">{{$note->Service;}}</a></div>
    @endforeach
  </h3>
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
