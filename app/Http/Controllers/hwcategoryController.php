<?php

namespace App\Http\Controllers;

use App\Models\hwcategory;
use Illuminate\Http\Request;

class hwcategoryController extends Controller
{

  /*
  Category Table Layout:
  id - Name
  */

      public function toJSON()
    {
      $cat = hwcategory::all()->sortBy('id');
      return $cat->toJson();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cats = hwcategory::all()->sortBy('id');
        return view('hwcategories',compact('cats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hwcategories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $validated = $request->validate([
         'Name' => 'required',
      ]);

      $cat = hwcategory::create([
           'Name' => $request->Name,
      ]);
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
      $cat= hwcategory::findOrFail($id);
      return view('hwcategories.show',compact('cat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $cat = hwcategory::findOrFail($id);
      return view('hwcategories.edit',compact('cat'));
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
      $validated = $request->validate([
         'Name' => 'required',
      ]);

      $cat = hwcategory::where('id',$id)->update(['Name'=>$request->Name]);
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
        $deleted = hwcategory::where('id', $id)->delete();
        return $this->index();
    }

    public function restore($id)
    {
        $restored = hwcategory::where('id', $id)->restore();
        return $this->index();
    }
}
