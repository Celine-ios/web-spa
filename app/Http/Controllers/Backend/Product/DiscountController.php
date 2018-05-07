<?php

namespace App\Http\Controllers\Backend\Product;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

use Illuminate\Http\Request;
use App\Discount;
use App\Product;
use App\ProductCategory;
use App\ProductSubcategory;

class DiscountController extends Controller{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index(){
        $discounts = Discount::where('estado', 1)->paginate(10);

        return view('admin.product.discount', compact('discounts'));
    }

    public function create(){
        $pcats = array();
        array_map(function($item) use (&$pcats) {
            $pcats[$item['nombre']] = ProductSubcategory::where('estado', 1)->where('product_categories_id', $item['id'])->pluck('nombre', 'id')->toArray();
        }, ProductCategory::where('estado', 1)->get()->toArray());

        $products = Product::where('published', 1)->pluck('title', 'id');
        $tipo_cod = ['normal' => 'Descuento Normal', 'carro' => 'Descuento en Carrito de Compras'];
        $asignacion = ['producto' => 'Producto', 'categoria' => 'Categoria'];

        return view('admin.product.new-edit-discount', compact('pcats', 'products', 'tipo_cod', 'asignacion'));
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request){
        $asignacion = \Validator::make($request->all(), [
            'asignacion'   => 'required',
            'nombre'       => 'required|max:150',
            'tipo_cupon'   => 'required|max:150',
            'discount'     => 'required|integer|max:100|min:1',
            'codigo'       => 'max:30|unique:discounts',
            'fecha_inicio' => 'required|date|max:150',
            'fecha_fin'    => 'required|date|max:150|after:fecha_inicio'
        ]);

        if ($asignacion->fails()) {
            return redirect()->back()->withErrors($asignacion)->withInput();
        } else {
            $validaciones = [
                'nombre'       => 'required|max:150',
                'tipo_cupon'   => 'required|max:150',
                'codigo'       => 'max:30|unique:discounts',
                'discount'     => 'required|integer|max:100|min:1',
                'fecha_inicio' => 'required|date|max:150',
                'fecha_fin'    => 'required|date|max:150|after:fecha_inicio'
            ];

            switch ($request->input('asignacion')) {
                case 'producto':
                $validaciones['products_id'] = 'required';
                break;

                case 'categoria':
                $validaciones['product_subcategories_id'] = 'required';
                break;
            }

            if ($request->has('activar_codigo')) {
                $validaciones['codigo'] = 'required|unique:discounts|max:30';
            }

            $validator = \Validator::make($request->all(), $validaciones);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            } else {
                $request->merge(['fecha_inicio' => date('Y-m-d', strtotime($request->input('fecha_inicio')))]);
                $request->merge(['fecha_fin' => date('Y-m-d', strtotime($request->input('fecha_fin')))]);

                if ($request->has('activar_codigo')) {
                    $request->merge(['activar_codigo' => 1]);
                }

                $discount = Discount::create($request->all());
                if ($discount) {
                    switch ($request->input('asignacion')) {
                        case 'producto':
                        $sync = $discount->products()->sync($request->input('products_id'));

                        if(count($sync['attached']) > 0){
                            \Session::flash('message', 'Descuento Creado Correctamente');
                        } else {
                            \Session::flash('message-error', 'Error en el guardado del Descuento');
                            return redirect()->back();
                        }
                        break;

                        case 'categoria':
                        $categories = $request->input('product_subcategories_id');
                        $product = Product::whereHas('product_categories', function($query) use ($categories) {
                            $query->whereIn('id', $categories);
                        })->pluck('id');

                        $sync = $discount->subcategory()->sync($request->input('product_subcategories_id'));

                        if ($product) {
                            $sync = $discount->products()->sync($product->toArray());
                        }


                        if(count($sync['attached']) > 0){
                            \Session::flash('message', 'Descuento Creado Correctamente');
                        } else {
                            \Session::flash('message-error', 'Error en el guardado del Descuento');
                            return redirect()->back();
                        }
                        break;
                    }
                } else {
                    \Session::flash('message-error', 'Error en el guardado del Descuento');
                    return redirect()->back();
                }

                return redirect('admin/discount');
            }
        }
    }

    public function edit($id){
        $disc = Discount::find($id);

        if ($disc) {
            $pcats = array();
            array_map(function($item) use (&$pcats) {
                $pcats[$item['nombre']] = ProductSubcategory::where('estado', 1)->where('product_categories_id', $item['id'])->pluck('nombre', 'id')->toArray();
            }, ProductCategory::where('estado', 1)->get()->toArray());

            $products = Product::where('published', 1)->pluck('title', 'id');
            $tipo_cod = ['normal' => 'Descuento Normal', 'carro' => 'Descuento en Carrito de Compras'];
            $asignacion = ['producto' => 'Producto', 'categoria' => 'Categoria'];

            return view('admin.product.new-edit-discount', compact('pcats', 'products', 'tipo_cod', 'asignacion', 'disc'));
        } else {
            \Session::flash('message-error', 'El Descuento no Existe');
            return redirect('admin/discount');
        }
    }

    public function update(Request $request, $id){
        $discount = Discount::find($id);

        if ($discount) {
            $asignacion = \Validator::make($request->all(), [
                'asignacion'   => 'required',
                'nombre'       => 'required|max:150',
                'tipo_cupon'   => 'required|max:150',
                'codigo'       => 'max:30',
                'fecha_inicio' => 'required|date|max:150',
                'fecha_fin'    => 'required|date|max:150|after:fecha_inicio'
            ]);
            if ($asignacion->fails()) {
                return redirect()->back()->withErrors($asignacion)->withInput();
            } else {
                $validaciones = [
                    'nombre'       => 'required|max:150',
                    'tipo_cupon'   => 'required|max:150',
                    'codigo'       => 'max:30',
                    'fecha_inicio' => 'required|date|max:150',
                    'fecha_fin'    => 'required|date|max:150|after:fecha_inicio'
                ];

                switch ($request->input('asignacion')) {
                    case 'producto':
                    $validaciones['products_id'] = 'required';
                    break;

                    case 'categoria':
                    $validaciones['product_subcategories_id'] = 'required';
                    break;
                }

                if ($request->has('activar_codigo')) {
                    $validaciones['codigo'] = ['required|max:30', Rule::unique('discounts')->ignore($discount->id)];
                }

                $validator = \Validator::make($request->all(), $validaciones);

                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                } else {
                    $request->merge(['fecha_inicio' => date('Y-m-d', strtotime($request->input('fecha_inicio')))]);
                    $request->merge(['fecha_fin' => date('Y-m-d', strtotime($request->input('fecha_fin')))]);

                    if ($request->has('activar_codigo')) {
                        $request->merge(['activar_codigo' => 1]);
                    }

                    $discount->fill($request->all())->save();
                    if ($discount) {
                        switch ($request->input('asignacion')) {
                            case 'producto':
                            $discount->subcategory()->sync([]);
                            $sync = $discount->products()->sync($request->input('products_id'));

                            if($sync){
                                \Session::flash('message', 'Descuento Actualizadp Correctamente');
                            } else {
                                \Session::flash('message-error', 'Error en el guardado del Descuento');
                                return redirect()->back();
                            }
                            break;

                            case 'categoria':
                            $product = Product::whereHas('product_categories', function($query) use ($categories) {
                                $query->whereIn('id', $categories);
                            })->pluck('id');

                            $sync = $discount->subcategory()->sync($request->input('product_subcategories_id'));

                            if ($product) {
                                $sync = $discount->products()->sync($product->toArray());
                            }

                            if($sync){
                                \Session::flash('message', 'Descuento Actualizadp Correctamente');
                            } else {
                                \Session::flash('message-error', 'Error en el guardado del Descuento');
                                return redirect()->back();
                            }
                            break;
                        }
                    } else {
                        \Session::flash('message-error', 'Error en el guardado del Descuento');
                        return redirect()->back();
                    }

                    return redirect('admin/discount');
                }
            }
        } else {
            \Session::flash('message-error', 'El Descuento no Existe');
        }

        return redirect('admin/discount');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id){
        $discount = Discount::find($id);

        if ($discount) {
            $discount->subcategory()->detach();
            $discount->products()->detach();
            $discount->estado = 0;
            $discount->save();

            if ($discount) {
                \Session::flash('message', 'Descuento Borrado Correctamente');
            }
        } else {
            \Session::flash('message-error', 'El Descuento no Existe');
        }

        return redirect('admin/discount');

    }
}
