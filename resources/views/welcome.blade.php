@extends('adminlte::page')

@section('title', 'Electronic Equipment Organizer')

@section('content_header')
    <h1>Electronic Equipment Organizer</h1>
@stop

@section('content')
    <p>Welcome to the Electronic Equipment Organizer. This app will allow you to track equipment,
      Keep Notes on maintenance, and view who has checked out each unit.
    </p>
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
