<?php

namespace App\Http\Controllers\Backend\General;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use App\Http\Requests;
use App\BannerType;
use App\ProductCategory;

class BannerTypeController extends Controller{
    public function __construct(){
        $this->middleware('admin');
    }

    public function index(){
        $btypes  = BannerType::where('estado', 1)->paginate(10);
        return view('admin.general.btype', compact('btypes'));
    }

    public function store(Request $request){
        $validator = \Validator::make($request->all(), [
            'nombre'  => 'required|max:150|unique:banner_types'
            ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            $btype = BannerType::create($request->all());
            if ($btype) {
                \Session::flash('message', 'Tipo de Banner Creado Correctamente');
                return redirect('admin/btype');
            } else {
                \Session::flash('message-error', 'Error en el guardado del Tipo de Banner');
            }
        }
    }

    public function update($id, Request $request){
        try {
            $btype = BannerType::find($id);

            if ($btype) {
                $primary_types = BannerType::whereIn('slug', ['principal', 'video-principal', 'secundario', 'terciario', 'cuaternario'])->pluck('id')->toArray();

                if (in_array($btype->id, $primary_types) ) {
                    throw new \Exception("Éste Tipos de Banner no puede ser modificado", 1);
                } else {
                    $pcat = ProductCategory::where('nombre', $btype->nombre)->first();

                    if ($pcat) {
                        throw new \Exception("Éste Tipos de Banner no puede ser modificado porque pertenece a una Categoría de Producto", 1);
                    } else {
                        $validator = \Validator::make($request->all(), [
                            'nombre'    => ['required', 'max:150', Rule::unique('banner_types')->ignore($btype->id)],
                            ]);

                        if ($validator->fails()) {
                            return redirect()->back()->withErrors($validator);
                        } else {
                            $btype->fill($request->all())->save();

                            if ($btype) {
                                \Session::flash('message', 'Tipo de Banner Actualizado Correctamente');
                                return redirect('admin/btype');

                            } else {
                                throw new \Exception("Error en el guardado del Tipo de Banner", 1);
                            }
                        }
                    }
                }
            } else {
                throw new \Exception("El Tipo de Banner no se encuentra", 1);
            }
        } catch (\Exception $e) {
            \Session::flash('message-error', $e->getMessage());
            return redirect('admin/btype');
        }
    }

    public function destroy($id){
        try {
            $btype = BannerType::find($id);
            if ($btype) {
                $primary_types = BannerType::whereIn('slug', ['principal', 'video-principal', 'secundario', 'terciario', 'cuaternario'])->pluck('id')->toArray();

                if (in_array($btype->id, $primary_types) ) {
                    throw new \Exception("El Tipo de Banner no puede ser borrado", 1);
                } else {
                    $pcat = ProductCategory::where('nombre', $btype->nombre)->first();

                    if ($pcat) {
                        throw new \Exception("Éste Tipos de Banner no puede ser borrado porque pertenece a una Categoría de Producto", 1);
                    } else {
                        $btype->fill(['nombre' => $btype->nombre.'*', 'estado' => 0])->save();
                        if ($btype) {
                            \Session::flash('message', 'Tipo de Banner Borrado Correctamente');
                            return redirect('admin/btype');
                        } else {
                            throw new \Exception("El Tipo de Banner no puede ser borrado", 1);
                        }
                    }
                }
            } else {
                throw new \Exception("El Tipo de Banner no se encuentra", 1);
            }
        } catch (\Exception $e) {
            \Session::flash('message-error', $e->getMessage());
            return redirect('admin/btype');
        }

    }
}
