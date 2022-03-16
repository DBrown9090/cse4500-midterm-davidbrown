<?php

namespace App\Http\Controllers;

use App\Models\employee;
use Illuminate\Http\Request;

class employeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     /*
     Employee Table Layout:
     id - Name - email - phone
     */

     public static $controllerName = 'employees';
     public static $validationArray = [
        'Name' => 'required',
        'phone' => 'required|digits:10',
        'email' => 'required|email|unique:employees',
     ];
     public static $createOrUpdateArray = [
          'Name' => '$request->Name',
          'phone' => '$request->phone',
          'email' => '$request->email'
     ];

    public function test()
    {
      $res = employee::all();
      return $res->toJson();
    }

    public function index()
    {
      $res = employee::all();
      return view($controllerName,compact('res'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($controllerName.'.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $validated = $request->validate($validationArray);
      $cou = array();
      foreach ($createOrUpdateArray as $k=>$v)
      {
        $cou[$k] = $$v;
      }
      var_dump($cou);
      $res = employee::create($cou);
      return $this->index()->with('message', 'User Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $res= employee::findOrFail($id);
      return view($controllerName.'.show',compact('res'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $res = employee::findOrFail($id);
      return view($controllerName.'.edit',compact('res'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $validated = $request->validate($validationArray);
      $cou = array();
      foreach ($createOrUpdateArray as $k=>$v)
      {
        $cou[$k] = $$v;
      }
      var_dump($cou);
      $res = employee::where('id',$id)->update($cou);
      return $this->show($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $deleted = employee::where('id', $id)->delete();
      return $this->index();
    }

    public function restore($id)
    {
        $restored = employee::where('id', $id)->restore();
        return $this->index();
    }
}
