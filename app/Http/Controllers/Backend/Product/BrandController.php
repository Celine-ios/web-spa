<?php

namespace App\Http\Controllers\Backend\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\ProductBrand;

class BrandController extends Controller{
    public function __construct(){
        $this->middleware('admin');
    }

    public function index(){
        $brands  = ProductBrand::where('estado', 1)->paginate(10);

        return view('admin.product.brand', compact('brands'));
    }

    public function store(Request $request){
        $validator = \Validator::make($request->all(), [
            'nombre'  => 'required|max:150'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            $brand = ProductBrand::create($request->all());
            if ($brand) {
                \Session::flash('message', 'Marca Creada Correctamente');
                return redirect('admin/brand');
            } else {
                \Session::flash('message-error', 'Error en el guardado de la Marca');
                return redirect()->back();
            }
        }
    }

    public function update($id, Request $request){
        $brand = ProductBrand::find($id);

        if ($brand) {
            $validator = \Validator::make($request->all(), [
                'nombre'  => 'required|max:150'
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator);
            } else {
                $brand->fill($request->all());
                if ($brand->save()) {
                    \Session::flash('message', 'Marca Actualizada Correctamente');
                }
            }
        } else {
            \Session::flash('message-error', 'La Marca no Existe');
        }

        return redirect('admin/brand');

    }

    public function destroy($id){
        $brand = ProductBrand::find($id);

        if ($brand) {
            $brand->estado = 0;
            $brand->save();
            if ($brand) {
                \Session::flash('message', 'Marca Borrada Correctamente');
            } else {
                \Session::flash('message-error', 'La Marca no puede ser borrado');
            }
        } else {
            \Session::flash('message-error', 'La Marca no Existe');
        }

        return redirect('admin/brand');
    }
    public function brandupdate(Request $request)
    {
        $brand = ProductBrand::find($request->pk);
        $brand->fill([$request->name => $request->value])->save();
         return \Response::json(['status' => 1], 200);
    }
}
