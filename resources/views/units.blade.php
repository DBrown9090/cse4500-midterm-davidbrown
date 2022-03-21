@extends('adminlte::page')

@section('title', $o.'s')

@section('content_header')
    <h1>{{ $o; }} List</h1>
@stop

@section('content')
<div class="card">
  <p>This lists all of the {{ $o; }}s available</p>
  <div class="card-body">
    <table id="table" class="table table-bordered">
      <thead>
        <tr>
          <th style="width: 10px">#</th>
          @foreach($valid as $k=>$v)
          <th>
            @if($k == 'hardware_id')
              Hardware
            @elseif($k == 'employee_id')
              Employee
            @elseif($k == 'purchase_id')
              Purchase
            @else
              {{ $k }}
            @endif
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
              @if($k == 'hardware_id')
                <a href="{{ route('hardwares.show', ['hardware'=>$r->{$k} ] ) }}">{{ $r->hardware->Name }}</a>
              @elseif($k == 'employee_id')
                <a href="{{ route('employees.show', ['employee'=>$r->{$k} ] ) }}">{{ $r->employee->Name }}</a>
              @elseif($k == 'purchase_id')
                <a href="{{ route('purchases.show', ['purchase'=>$r->{$k} ] ) }}">{{ $r->purchase->Invoice }}</a>
              @else
                {{ $r->{$k} }}
              @endif
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
