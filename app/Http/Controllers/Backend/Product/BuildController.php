<?php

namespace App\Http\Controllers\Backend\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\PcBuild;
use App\PcBuildProduct;
use App\Product;

class BuildController extends Controller{
    public function __construct(){
        $this->middleware('admin');
    }

    public function index(){
        $builds = PcBuild::where('activo', 1)->paginate(10);

        return view('admin.product.pcbuild', compact('builds'));
    }

    public function store(Request $request){
        $validator = \Validator::make($request->all(), [
            'product_id'  => 'required',
            'cantidad'    => 'required|numeric',
            'pc_build_id' => 'required',
            ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $product = PcBuildProduct::create($request->all());

            \Session::flash('message', 'El Producto ha sido Guardado Correctamente');
            return redirect()->back();
        }

    }

    public function edit($id){
        $build = PcBuild::where('activo', 1)->find($id);
        $products = Product::where('published', 1)->orderBy('title', 'asc')->pluck('title', 'id');

        return view('admin.product.edit-pcbuild', compact('build', 'products'));
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
        //
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

    public function quick_update(Request $request){
        try {
            $validator = \Validator::make($request->all(), [
                'value' => 'required',
                'pk'    => 'required',
                'name'  => 'required',
                ]);

            if ($validator->fails()) {
                return \Response::json(['error' => $validator->errors()], 400);
            } else {
                $product = PcBuildProduct::find($request->pk);

                if ($product) {
                    if ($request->name == 'product_id') {
                        $result = [$request->name => $request->value, 'cantidad' => 1];
                    } else {
                        $result = [$request->name => $request->value];
                    }
                    $product->fill($result)->save();

                    if ($product) {
                        return \Response::json(['status' => 1], 200);
                    } else {
                        throw new \Exception("Error en la actualización del registro", 400);    
                    }
                } else {
                    throw new \Exception("Registro no Encontrado, por favor recargar la página", 400);
                }
            }
        } catch (\Exception $e) {
            return \Response::json(['error' => $e->getMessage()], $e->getCode());
        }
    }
}
