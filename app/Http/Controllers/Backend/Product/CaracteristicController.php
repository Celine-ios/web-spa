<?php

namespace App\Http\Controllers\Backend\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CaracteristicCategory;
use App\Models\Caracteristic;
class CaracteristicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$categories = CaracteristicCategory::where('state', 1)->paginate(500);
    	$caracteristics = Caracteristic::all()->pluck('name_caracteristic', 'id_caracteristic');
    	return view('admin.product.caracteristic_category',compact('categories','caracteristics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new CaracteristicCategory; 
        $category->category_name = $request->category_name;
        $category->save();
        $category->caracteristics()->sync($request->caracteristics);

        \Session::flash('message', 'Se ha realizado el registro correctamente.');
        return redirect('admin/category_caracteristic');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = CaracteristicCategory::find($id);
        $caracteristics = Caracteristic::all()->pluck('name_caracteristic','id_caracteristic');

        return view('admin.product.edit_caracteristic_category',compact('category','caracteristics')); 
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
        $category = CaracteristicCategory::find($id);
        $category->category_name = $request->category_name;
        $category->save();
        $category->caracteristics()->sync($request->caracteristics);


        \Session::flash('message', 'Se ha realizado la actualización correctamente.');
        return redirect('admin/category_caracteristic');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
