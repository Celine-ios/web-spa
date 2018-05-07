<?php

namespace App\Http\Controllers\Backend\Article;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\ArticleType;

class ArticleTypeController extends Controller{
    public function __construct(){
        $this->middleware('admin');
    }

    public function index(){
        $acats  = ArticleType::where('estado', 1)->paginate(10);

        return view('admin.article.acategory', compact('acats'));
    }

    public function store(Request $request){
        $validator = \Validator::make($request->all(), [
            'nombre'  => 'required|max:150'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            $acat = ArticleType::create($request->all());
            if ($acat) {
                \Session::flash('message', 'Categoría Creada Correctamente');
                return redirect('admin/article_category');
            } else {
                \Session::flash('message-error', 'Error en el guardado de la Categoría');
            }
        }

        return redirect('admin/article_category');
    }

    public function update($id, Request $request){
        $acat = ArticleType::find($id);
        if ($acat) {
            $validator = \Validator::make($request->all(), [
                'nombre'  => 'required|max:150'
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator);
            } else {
                $acat->fill($request->all())->save();
                if ($acat) {
                    \Session::flash('message', 'Categoría Actualizada Correctamente');
                }
            }
        } else {
            \Session::flash('message-error', 'La Categoría no se encuentra');
        }

        return redirect('admin/article_category');

    }

    public function destroy($id){
        $acat = ArticleType::find($id);
        if ($acat) {
            $acat->estado = 0;
            $acat->save();
            if ($acat->estado == 0) {
                \Session::flash('message', 'Categoría Borrada Correctamente');
            } else {
                \Session::flash('message-error', 'La Categoría no puede ser borrada');
            }
        } else {
            \Session::flash('message-error', 'La Categoría no se encuentra');
        }
        return redirect('admin/article_category');
    }
}
