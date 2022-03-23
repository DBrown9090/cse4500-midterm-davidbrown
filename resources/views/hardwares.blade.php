@extends('adminlte::page')

@section('title', $o.'s')

@section('content_header')
    <h1>{{ $o; }} List</h1>
@stop

@section('content')
<div class="card">
  <p>This lists all of the types of {{ $o; }} available</p>
  <div class="card-body">
    <table id="table" class="table table-bordered">
      <thead>
        <tr>
          <th style="width: 10px">#</th>
          @foreach($valid as $k=>$v)
          <th>
          <?php if ($k == 'manufacturer_id') { ?>
            Manufacturer
          <?php } else if ($k == 'hwcategory_id') { ?>
            Category
          <?php } else { ?>
            {{ $k }}
          <?php } ?>
          </th>
          @endforeach
          <th>View</th>
        </tr>
      </thead>
      <tbody>
        @foreach($res AS $r)
        <tr>
          <td>{{ $r->id }}</td>
          @foreach($valid as $k=>$v)
            <td>
          <?php if ($k == 'manufacturer_id') { ?>
            <a href="{{ route('manufacturers.show', ['manufacturer'=>$r->{$k} ?: 0 ] ) }}">{{ isset($r->manufacturer->Name) ? $r->manufacturer->Name : 'None'; }}</a>
          <?php } else if ($k == 'hwcategory_id') { ?>
            <a href="{{ route('hwcategories.show', ['hwcategory'=>$r->{$k} ?: 0 ] ) }}">{{ isset($r->hwcategory->Name) ? $r->hwcategory->Name : 'None'; }}</a>
          <?php } else { ?>
            {{ $r->{$k} }}
          <?php } ?>
            </td>
          @endforeach
          <td><a href="{{ route($n.'.show',[(string)$m=>$r->id])}}">View</a></td>
        </tr>
        @endforeach

      </tbody>
    </table>
  </div>
</div>
<a href="{{ route($n.'.create') }} " class="btn btn-primary" >Create New {{ $o; }}</a>
@stop
