<?php

namespace App\Http\Controllers\Backend\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Validation\Rule;

use App\ProductCategory;
use App\ProductSubcategory;
use App\BannerType;

class ProductCategoryController extends Controller{
    public function __construct(){
        $this->middleware('admin');
    }

    public function index(){
        $pcats  = ProductCategory::where('estado', 1)->paginate(10);
        return view('admin.product.product_category', compact('pcats'));
    }

    public function store(Request $request){
        try {
            $validator = \Validator::make($request->all(), [
                'nombre'      => 'required|max:150|unique:product_categories',
                'descripcion' => 'required|max:150'
                ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator);
            } else {
                $validator2 = \Validator::make($request->all(), [
                    'nombre'      => 'unique:banner_types',
                    ]);

                if ($validator2->fails()) {
                    throw new \Exception("El nombre de la categoría no puede ser igual al de un Tipo de Banner", 1);
                } else {
                    $request->merge([
                        'nombre' => mb_ucfirst($request->nombre)
                        ]);
        $pcat = new ProductCategory;
	$pcat->nombre = $request->nombre;
	$pcat->descripcion = $request->descripcion;
	$pcat->estado = 1;
	$pcat->hidden= 0;
	$pcat->save();
 
                    
                    if ($pcat) {
                        $btype = BannerType::create($request->all());
                        $request->merge(['product_categories_id' => $pcat->id]);
                        $scat  = ProductSubcategory::create($request->all());

                        if ($scat && $btype) {
                            \Session::flash('message', 'Categoría Creada Correctamente');
                            return redirect('admin/product_category');
                        } else {
                            throw new \Exception('Error en el guardado de la Categoría', 1);
                        }
                    } else {
                        throw new \Exception('Error en el guardado de la Categoría', 1);
                    }
                }
            }
        } catch (\Exception $e) {
            \Session::flash('message-error', $e->getMessage());
            return redirect('admin/product_category');
        }

    }

    public function update($id, Request $request){
        try {
            $pcat = ProductCategory::find($id);

            if ($pcat) {
                $validator = \Validator::make($request->all(), [
                    'nombre'    => ['required', 'max:150', Rule::unique('product_categories')->ignore($pcat->id)],
                    'descripcion' => 'required|max:150'
                    ]);

                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator);
                } else {
                    $request->merge([
                        'nombre' => mb_ucfirst($request->nombre)
                        ]);

                    $btype = BannerType::where('nombre', $pcat->nombre)->first();

                    if (!$btype) {
                        $validator2 = \Validator::make($request->all(), [
                            'nombre'      => 'unique:banner_types',
                            ]);

                        if ($validator2->fails()) {
                            throw new \Exception("El nombre de la categoría no puede ser igual al de un Tipo de Banner", 1);
                        } else {
                            $btype = BannerType::create($request->all());
                        }
                    } else {
                        $validator2 = \Validator::make($request->all(), [
                            'nombre'    => ['required', 'max:150', Rule::unique('banner_types')->ignore($btype->id)],
                            ]);

                        if ($validator2->fails()) {
                            throw new \Exception("El nombre de la categoría no puede ser igual al de un Tipo de Banner", 1);
                        }
                    }

                    $pcat->fill($request->all())->save();
                    $btype->fill($request->all())->save();
                    if ($pcat && $btype) {
                        \Session::flash('message', 'Categoría Actualizada Correctamente');
                        return redirect('admin/product_category');
                    }
                }
            } else {
                throw new \Exception('La Categoría no se encuentra', 1);
            }

        } catch (\Exception $e) {
            \Session::flash('message-error', $e->getMessage());
            return redirect('admin/product_category');
        }
    }

    public function destroy($id){
        try {
            $pcat = ProductCategory::find($id);
            if ($pcat) {
                $btype = BannerType::where('nombre', $pcat->nombre)->first();

                if ($btype) {
                    $btype->fill(['nombre' => $btype->nombre.'*' , 'estado' => 0])->save();
                }

                $pcat->fill(['nombre' => $pcat->nombre.'*', 'estado' => 0])->save();

                if ($pcat) {
                    \Session::flash('message', 'Categoría Borrada Correctamente');
                    return redirect('admin/product_category');
                } else {
                    throw new \Exception('La Categoría no puede ser borrada', 1);
                }
            } else {
                throw new \Exception('La Categoría no se encuentra', 1);
            }

        } catch (\Exception $e) {
            \Session::flash('message-error', $e->getMessage());
            return redirect('admin/product_category');
        }
    }
}
