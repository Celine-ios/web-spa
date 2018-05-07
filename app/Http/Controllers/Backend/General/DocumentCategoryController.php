<?php

namespace App\Http\Controllers\Backend\General;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use App\Http\Requests;
use App\DocumentCategory;

class DocumentCategoryController extends Controller{
    public function __construct(){
        $this->middleware('admin');
    }

    public function index(){
        $btypes  = DocumentCategory::where('estado', 1)->paginate(10);
        return view('admin.general.dtype', compact('btypes'));
    }

    public function store(Request $request){
        $validator = \Validator::make($request->all(), [
            'nombre'  => 'required|max:150|unique:banner_types'
            ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            $btype = DocumentCategory::create($request->all());
            if ($btype) {
                \Session::flash('message', 'Tipo de Documento Creado Correctamente');
                return redirect('admin/document');
            } else {
                \Session::flash('message-error', 'Error en el guardado del Tipo de Documento');
            }
        }
    }

    public function update($id, Request $request){
        try {
            $btype = DocumentCategory::find($id);

            if ($btype) {
                $primary_types = DocumentCategory::whereIn('slug', ['lista-de-precios'])->pluck('id')->toArray();

                if (in_array($btype->id, $primary_types) ) {
                    throw new \Exception("Éste Tipo de Documento no puede ser modificado", 1);
                } else {
                    $validator = \Validator::make($request->all(), [
                        'nombre'    => ['required', 'max:150', Rule::unique('banner_types')->ignore($btype->id)],
                        ]);

                    if ($validator->fails()) {
                        return redirect()->back()->withErrors($validator);
                    } else {
                        $btype->fill($request->all())->save();

                        if ($btype) {
                            \Session::flash('message', 'Tipo de Documento Actualizado Correctamente');
                            return redirect('admin/dtype');

                        } else {
                            throw new \Exception("Error en el guardado del Tipo de Documento", 1);
                        }
                    }
                }
            } else {
                throw new \Exception("El Tipo de Documento no se encuentra", 1);
            }
        } catch (\Exception $e) {
            \Session::flash('message-error', $e->getMessage());
            return redirect('admin/dtype');
        }
    }

    public function destroy($id){
        try {
            $btype = DocumentCategory::find($id);
            if ($btype) {
                $primary_types = DocumentCategory::whereIn('slug', ['principal', 'video-principal', 'secundario', 'terciario', 'cuaternario'])->pluck('id')->toArray();

                if (in_array($btype->id, $primary_types) ) {
                    throw new \Exception("El Tipo de Documento no puede ser borrado", 1);
                } else {
                    $btype->fill(['nombre' => $btype->nombre.'*', 'estado' => 0])->save();
                    if ($btype) {
                        \Session::flash('message', 'Tipo de Documento Borrado Correctamente');
                        return redirect('admin/dtype');
                    } else {
                        throw new \Exception("El Tipo de Documento no puede ser borrado", 1);
                    }
                }
            } else {
                throw new \Exception("El Tipo de Documento no se encuentra", 1);
            }
        } catch (\Exception $e) {
            \Session::flash('message-error', $e->getMessage());
            return redirect('admin/dtype');
        }

    }
}
