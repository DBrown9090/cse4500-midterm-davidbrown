<?php

namespace App\Http\Controllers;

use App\Models\purchase;
use Illuminate\Http\Request;

class purchaseController extends Controller
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

    protected $casts = ['Price'=>'integer'];
    public static $controllerName = 'purchases';
    public static $tableName = 'purchase';
    public static $validationArray = [
      'Invoice' => ['required','integer','numeric', 'max:2147483647'],
      'Price' => ['required', 'numeric', 'max:2147483647'],
      'PurchaseDate' => ['required', 'date'],
    ];
    public static $controlName = 'Purchase';

    public function test()
    {
      $res = purchase::all();
      return $res->toJson();
    }

    public function index()
    {
      $res = purchase::all()->sortBy('id');
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
      $req["Price"] = purchase::priceUpdate($req['Price']);
      $res = purchase::create($req);
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
      $res= purchase::findOrFail($id);
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
      $res = purchase::findOrFail($id);
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
      $req["Price"] = purchase::priceUpdate($req['Price']);
      $ret = purchase::where('id',$id)->update($req);
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
      $deleted = purchase::where('id', $id)->delete();
      return $this->index();
    }

    public function restore($id)
    {
        $restored = purchase::where('id', $id)->restore();
        return $this->index();
    }
}
