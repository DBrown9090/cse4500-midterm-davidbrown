@extends('adminlte::page')

@section('title', 'Electronic Equipment Organizer')

@section('content_header')
    <h1>Electronic Equipment Organizer</h1>
@stop

@section('content')
    <p>Welcome to the Electronic Equipment Organizer. This app will allow you to track equipment,
      Keep Notes on maintenance, and view who has checked out each unit.
    </p>

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

    
    <p><pre>

      *Notes History:
      Note ID - Unit ID - Service(provided) -(Related)Software - Notes

      Notes -> Unit
      Unit ID - Unit Name - Hardware specs(ID) - Current User(ID) - Purchase Info(ID) - Notes(From note table, !include)

      Unit -> Hardware, User, Purchase
          **Hardwares Table:
          Hardware ID - Hardware Name - Manufacturer ID - Hardware Category ID - Hardware CPU - Hardware RAM - Hardware Storage

          Hardware -> Manufacturer
              **Manufacturers Table:
              Manufacturer ID - Manufacturer Name - Manufacturer (Sales) Contact Info - Manufacturer Tech (Support) Contact Info

              Manufacturer -> Category
                  **Hardware Category Table:
                  Category ID - Category Name


          **Employees Table:
          User ID - Name - User Email - User Phone#

          **Purchases Table:
          Purchase ID - Invoice - Price - PurchaseDate


    </pre>
    </p>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
