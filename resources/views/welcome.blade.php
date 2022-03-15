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
      List units here.
      Unit ID - Hardware specs(ID) - Unit Manufacturer(ID) - Current User(ID) - Purchase Info(ID) - Notes(From note table, !include)

      Manufacturer Table:
      Manufacturer ID - Manufacturer Name - Manufacturer Sales Contact Info - Manufacturer Tech Support Contact Info

      Hardware Table:
      Hardware ID - Hardware Name - Manufacturer ID - Hardware Category - Hardware CPU - Hardware RAM - Hardware Storage

      User Table:
      User ID - User Name - User Email - User Phone#

      Purchase Table:
      Purchase ID - Invoice # - Price - Purchase Date

      Notes History:
      Note ID - Unit ID - Service provided - Related Software - Notes

    </p>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
