@extends('adminlte::page')

@section('title', 'Show '.$o)

@section('content_header')
    <h1>Show {{ $o; }}</h1>
@stop

@section('content')
  <h2>Id: {{ $res->id; }}</h2>
  <?php dump($res); ?>
  @foreach($valid as $k=>$v)
  <?php if (in_array($k, ['manufacturer_id', 'hwcategory_id'])) {
    if ($k == 'manufacturer_id') { ?>
      <h2>Manufacturer:<pre><a href="{{route('manufacturers.show',['manufacturer'=>1])}}">{{ $res->{$k}->Name}}</a></pre></h2>
    <?php } else { ?>
      <h2>Category:<pre><a href="{{route('hwcategories.show',['hwcategories'=>1])}}">{{ $res->{$k}->Name}}</a></pre></h2>
    <?php }
    } else { ?>
    <h2>{{ $k; }}:<pre>{{ $res->{$k}; }}</pre></h2>
  <?php } ?>
  @endforeach
  <h3><div><a href="{{route($n.'.edit', [(string)$m=>$res->id]) }}" class="btn btn-primary" >Edit</a></div></h3>
  <h3><div>
    <form class="delete" action="{{route($n.'.destroy', [(string)$m=>$res->id])}}" method="post">
      @method('delete')
      @csrf
      <input type="hidden" name="_method" value="DELETE">
      <input type="submit" value="Delete {{ $o; }}">
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
