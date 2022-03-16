<?php

namespace App\Http\Controllers;

use App\Models\hardware;
use Illuminate\Http\Request;

class hardwareController extends Controller
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

     public static $controllerName = 'hardwares';
     public static $tableName = 'hardware';
     public static $validationArray = [
        'Name' => ['required','unique:hardwares'],
        'ManufacturerID' => ['required'],
        'CategoryID' => ['required'],
        'CPU' => ['required'],
        'RAM' => ['required'],
        'Storage' => ['required'],
     ];
     public static $controlName = 'Hardware';

    public function toJSON()
    {
      $res = hardware::all()->sortBy('id');
      return $res->toJson();
    }

    public function index()
    {
      $res = hardware::all()->sortBy('id');
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
      $n = self::$controllerName;
      $m = self::$tableName;
      $o = self::$controlName;
      return view(self::$controllerName.'.create', compact('valid','n','m','o'));
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
      $res = hardware::create($req);
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
      $res= hardware::findOrFail($id);
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
      $res = hardware::findOrFail($id);
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
      $ret = hardware::where('id',$id)->update($req);
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
      $deleted = hardware::where('id', $id)->delete();
      return $this->index();
    }

    public function restore($id)
    {
        $restored = hardware::where('id', $id)->restore();
        return $this->index();
    }
}
