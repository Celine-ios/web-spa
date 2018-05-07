<?php

namespace App\Http\Controllers\Backend\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;

use App\ProductSubcategory;
use App\ProductCategory;
use App\Models\CaracteristicCategory;

class ProductSubcategoryController extends Controller{

    public function __construct(){
        $this->middleware('admin');
    }

    public function index(){
        $pcats = ProductSubcategory::where('estado', 1)->paginate(10);
        $cats  = ProductCategory::pluck('nombre', 'id');
        $categoryCaracteristics = CaracteristicCategory::all()->pluck('category_name', 'id_caracteristic_category');
        return view('admin.product.product_subcategory', compact('pcats', 'cats','categoryCaracteristics'));
    }

    public function store(Request $request){
        $validator = \Validator::make($request->all(), [
            'nombre'                => 'required|max:150',
            'product_categories_id' => 'required|integer'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else 
        {
            $pcat = ProductSubcategory::create($request->all());
            dd($request->all());
            $pcat->categoryCaracteristics()->sync($request->category);
            if ($pcat) {
                \Session::flash('message', 'Categoría Creada Correctamente');
                return redirect('admin/product_subcategory');
            } else {
                \Session::flash('message-error', 'Error en el guardado de la Categoría');
            }
        }
    }

    public function update($id, Request $request){
        $pcat = ProductSubcategory::find($id);

        if ($pcat) {
           
            $pcat->fill($request->all())->save();
            $pcat->categoryCaracteristics()->sync($request->categoryCaracteristics);
            if ($pcat) {
                \Session::flash('message', 'Categoría Actualizada Correctamente');
            }
            
        } else {
            \Session::flash('message-error', 'La Categoría no se encuentra');
        }
        return redirect('admin/product_subcategory');
    }

    public function destroy($id){
        $pcat = ProductSubcategory::find($id);

        if ($pcat) {
            $pcat->estado = 0;
            $pcat->save();
            if ($pcat) {
                \Session::flash('message', 'Categoría Borrada Correctamente');
            } else {
                \Session::flash('message-error', 'La Categoría no puede ser borrado');
            }
        } else {
            \Session::flash('message-error', 'La Categoría no se encuentra');
        }

        return redirect('admin/product_subcategory');
    }
}
