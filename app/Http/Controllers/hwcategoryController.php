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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cats = hwcategory::all();
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
         'name' => 'required',
      ]);

      $cat = hwcategory::create([
           'name' => $validated->name,
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
      $cat-> hwcategory::findOrFail($id);
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
         'name' => 'required',
      ]);

      $cat = hwcategory::findorFail($id)->update(['name'=>$validated->name]);
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
}