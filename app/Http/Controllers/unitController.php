<?php

namespace App\Http\Controllers;

use App\Models\unit;
use Illuminate\Http\Request;

class unitController extends Controller
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

     public static $controllerName = 'units';
     public static $tableName = 'unit';
     public static $validationArray = [
        'Name' => ['required','unique:unit'],
        'hardware_id' => ['required'],
        'employee_id' => ['required'],
        'purchase_id' => ['required'],
     ];
     public static $controlName = 'Unit';

    public function toJSON()
    {
      $res = unit::with('hardware', 'employee', 'purchase')->get()->sortBy('id');
      return $res->toJson();
    }

    public function index()
    {
      $res = unit::with('hardware', 'employee', 'purchase')->get()->sortBy('id');

      $valid = self::$validationArray;
      $n = self::$controllerName;
      $m = self::$tableName;
      $o = self::$controlName;
      return view(self::$controllerName,compact('res', 'valid','n','m','o'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $valid = self::$validationArray;
      $res = (object) array();
      //$res->cat = hwcategory::all();
      //$res->man = manufacturer::all();
      //$res->cat = unit::with('hwcategory')->get()->lists('id', 'Name');//DB::table('hwcategories')->get();
      //$res->man = unit::with('manufacturer','hwcategory')->get()->lists('id', 'Name');//DB::table('manufacturers')->get();
      $n = self::$controllerName;
      $m = self::$tableName;
      $o = self::$controlName;
      return view(self::$controllerName.'.create', compact('res', 'valid','n','m','o'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $validated = $request->validate(self::$validationArray);
      $req = array();
      foreach (self::$validationArray as $k=>$v)
      {
        $req[$k] = $request->{$k};
      }
      $res = unit::create($req);
      return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $res= unit::with('hardware', 'employee', 'purchase')->findOrFail($id);
      //$res->cat = DB::table('hwcategories')->find($res->hwcategory_id);
      //$res->man = DB::table('manufacturers')->find($res->manufacturer_id);
      $valid = self::$validationArray;
      $n = self::$controllerName;
      $m = self::$tableName;
      $o = self::$controlName;
      return view(self::$controllerName.'.show',compact('res', 'valid', 'n', 'm','o'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $res = unit::with('hardware', 'employee', 'purchase')->findOrFail($id);
      //$res->cat = hwcategory::all();
      //$res->man = manufacturer::all();
      $valid = self::$validationArray;
      $n = self::$controllerName;
      $m = self::$tableName;
      $o = self::$controlName;
      return view(self::$controllerName.'.edit',compact('res','valid','n','m','o'));
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
      $validated = $request->validate(self::$validationArray);
      $req = array();
      foreach (self::$validationArray as $k=>$v)
      {
        $req[$k] = $request->{$k};
      }
      $ret = unit::where('id',$id)->update($req);
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
      $deleted = unit::where('id', $id)->delete();
      return $this->index();
    }

    public function restore($id)
    {
        $restored = unit::where('id', $id)->restore();
        return $this->index();
    }
}
