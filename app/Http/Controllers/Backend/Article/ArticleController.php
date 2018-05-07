<?php

namespace App\Http\Controllers\Backend\Article;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\ArticleType;
use App\Article;

class ArticleController extends Controller{
    public function __construct(){
        $this->middleware('admin');
    }

    public function index(){
        $articles  = Article::where('estado', 1)->paginate(10);

        return view('admin.article.article', compact('articles'));
    }

    public function create(){
        $acats  = ArticleType::where('estado', 1)->pluck('nombre', 'id');

        return view('admin.article.new-edit-article', compact('acats'));
    }

    public function store(Request $request){
        $validator = \Validator::make($request->all(), [
            'titulo'           => 'required|max:150',
            'texto'            => 'required|min:10',
            'article_types_id' => 'required|integer'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $article = Article::create($request->all());
            if ($article) {
                \Session::flash('message', 'Articulo Creado Correctamente');
                return redirect('admin/article');
            } else {
                \Session::flash('message-error', 'Error en el guardado del Artículo');
            }
        }
    }

    public function edit($id){
        $article = Article::find($id);
        if ($article) {
            $validator = \Validator::make($request->all(), [
                'titulo'           => 'required|max:150',
                'texto'            => 'required|min:10',
                'article_types_id' => 'required|integer'
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            } else {
                $acats  = ArticleType::where('estado', 1)->pluck('nombre', 'id');
                return view('admin.article.new-edit-article', compact('article', 'acats'));
            }
        } else {
            \Session::flash('message-error', 'No se encuentra el Artículo');
        }
    }

    public function update(Request $request, $id){
        $article = Article::find($id);

        if ($article) {
            $article->fill($request->all())->save();
            if ($article) {
                \Session::flash('message', 'Articulo Actualizado Correctamente');
            } else {
                \Session::flash('message-error', 'Error en el guardado del Artículo');
            }
        } else {
            \Session::flash('message-error', 'No se encuentra el Artículo');
        }

        return redirect('admin/article');
    }

    public function destroy($id){
        $article = Article::find($id);

        if ($article) {
            $article->estado = 0;
            $article->save();

            if ($article) {
                \Session::flash('message', 'Articulo Borrado Correctamente');
            } else {
                \Session::flash('message-error', 'El Articulo no puede ser borrado');
            }
        } else {
            \Session::flash('message-error', 'No se encuentra el Artículo');
        }
        return redirect('admin/article');
    }
}
