<?php

namespace App\Http\Controllers\Backend\Product;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\ProductFilter;
use App\ProductCategory;
use App\ProductSubcategory;

class ProductFilterController extends Controller{
    public function __construct(){
        $this->middleware('admin');
    }

    public function index(){
        $pfilters = ProductFilter::where('estado', 1)->paginate(20);
        $pcats = array();
        array_map(function($item) use (&$pcats) {
            $pcats[$item['nombre']] = ProductSubcategory::where('estado', 1)->where('product_categories_id', $item['id'])->pluck('nombre', 'id')->toArray();
        }, ProductCategory::where('estado', 1)->get()->toArray());

        return view('admin.product.product_filter', compact('pfilters', 'pcats'));
    }

    public function store(Request $request){
        $validator = \Validator::make($request->all(), [
            'nombre'                   => 'required|max:150',
            'product_subcategories_id' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            $pcats = $request->input('product_subcategories_id');

            $pfilter = ProductFilter::create($request->all());
            if ($pfilter) {
                if ($pfilter->product_categories()->sync($pcats)) {
                    \Session::flash('message', 'Filtro Creado Correctamente');
                } else {
                    $pfilter->delete();
                    \Session::flash('message-error', 'Error en el guardado del Filtro');
                }
            } else {
                \Session::flash('message-error', 'Error en el guardado del Filtro');
            }
        }

        return redirect('admin/product_filter');
    }

    public function edit($id){
        $pfilter = ProductFilter::find($id);

        if ($pfilter) {
            $pcats = array();
            array_map(function($item) use (&$pcats) {
                $pcats[$item['nombre']] = ProductSubcategory::where('estado', 1)->where('product_categories_id', $item['id'])->pluck('nombre', 'id')->toArray();
            }, ProductCategory::where('estado', 1)->get()->toArray());

            return view('admin.product.edit-product_filter', compact('pfilter','pcats'));
        } else {
            \Session::flash('message-error', 'El Filtro no se encuentra');
            return redirect('admin/product_filter');
        }
    }

    public function update($id, Request $request){
        $pfilter = ProductFilter::find($id);

        if ($pfilter) {
            $validator = \Validator::make($request->all(), [
                'nombre'                   => 'required|max:150',
                'product_subcategories_id' => 'required'
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator);
            } else {
                $pfilter->fill($request->all())->save();
                if ($pfilter) {
                    $pcats = $request->input('product_subcategories_id');

                    if ($pfilter->product_categories()->sync($pcats)) {
                        \Session::flash('message', 'Filtro Actualizado Correctamente');
                    } else {
                        \Session::flash('message-error', 'Error en el guardado del Filtro');
                    }
                }
            }
        } else {
            \Session::flash('message-error', 'El Filtro no se encuentra');
        }

        return redirect('admin/product_filter');
    }

    public function destroy($id){
        $pfilter = ProductFilter::find($id);
        if ($pfilter) {
            $pfilter->estado = 0;
            $pfilter->save();
            if ($pfilter) {
                $pfilter->product_categories()->sync([]);
                \Session::flash('message', 'Filtro Borrado Correctamente');
            } else {
                \Session::flash('message-error', 'El Filtro no puede ser borrado');
            }
        } else {
            \Session::flash('message-error', 'El Filtro no se encuentra');
        }
        return redirect('admin/product_filter');
    }
    public function filterupdate(Request $request)
    {
        $filter = ProductFilter::find($request->pk);
        $filter->fill([$request->name => $request->value])->save();
         return \Response::json(['status' => 1], 200);
    }
}
