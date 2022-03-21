@extends('adminlte::page')

@section('title', 'Show '.$o)

@section('content_header')
    <h1>Show {{ $o; }}</h1>
@stop

@section('content')
  <h2>Id: {{ $res->id; }}</h2>
  @foreach($valid as $k=>$v)
  <h2>
  <?php if (in_array($k, ['manufacturer_id', 'hwcategory_id'])) {
    if ($k == 'manufacturer_id') { ?>
      Manufacturer: <a href="{{ route('manufacturers.show', ['manufacturer'=>$res->{$k} ] ) }}">{{ $res->manufacturer->Name }}</a>
    <?php } else { ?>
      Category: <a href="{{ route('hwcategories.show', ['hwcategory'=>$res->{$k} ] ) }}">{{ $res->hwcategory->Name }}</a>
    <?php }
    } else { ?>
      {{ $k; }}: {{ $res->{$k}; }}
  <?php } ?>
  </h2>
  @endforeach
  <h2>Associated Units:     (<?php
        $newst = '';
      foreach($res->unit as $p) {
          $newst .= '<a href="'.route('units.show', ['unit'=>$p->id]).'">'.$p->Name.'</a>, ';
      }
      echo substr($newst, 0, -2); ?>)</p>
  </h2>
  <hr>
  <h4><div><a href="{{route($n.'.edit', [(string)$m=>$res->id]) }}" class="btn btn-primary" >Edit</a>
    <form style="display:inline" class="delete" action="{{route($n.'.destroy', [(string)$m=>$res->id])}}" method="post">
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
