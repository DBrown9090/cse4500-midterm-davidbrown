@extends('adminlte::page')

@section('title', 'Electronic Equipment Organizer')

@section('content_header')
    <h1>Electronic Equipment Organizer</h1>
@stop

@section('content')
    <p>Welcome to the Electronic Equipment Organizer. This app will allow you to track equipment,
      Keep Notes on maintenance, and view who has checked out each unit.
    </p>
    <p>
      *List units here.
      Unit ID - Hardware specs(ID) - Unit Manufacturer(ID) - Current User(ID) - Purchase Info(ID) - Notes(From note table, !include)

      *Manufacturers Table:
      Manufacturer ID - Manufacturer Name - Manufacturer (Sales) Contact Info - Manufacturer Tech (Support) Contact Info

      *Hardwares Table:
      Hardware ID - Hardware Name - Manufacturer ID - Hardware Category ID - Hardware CPU - Hardware RAM - Hardware Storage

      *Employees Table:
      User ID - Name - User Email - User Phone#

      *Purchases Table:
      Purchase ID - Invoice - Price - PurchaseDate

      *Notes History:
      Note ID - Unit ID - Service(provided) -(Related)Software - Notes

      *Hardware Category Table:
      Category ID - Category Name

      For money:
      class product extends model
        pub funct getPriceAttribute()
          return $this->attributes['price']/100;
        pub funct setPriceAttribute()
          $this->attributes['price'] = $value*100;
    </p>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
