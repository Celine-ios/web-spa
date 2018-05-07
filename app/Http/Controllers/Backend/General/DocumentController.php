<?php

namespace App\Http\Controllers\Backend\General;
ini_set('post_max_size', '64M');
ini_set('upload_max_filesize', '64M');

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\FileRequest;

use App\Document;
use App\DocumentCategory;
use File;

class DocumentController extends Controller{
    public function __construct(){
        $this->middleware('admin');
    }

    public function index(){
        $btypes  = DocumentCategory::where('estado', 1)->paginate(10);
        return view('admin.general.documents', compact('btypes'));
    }

    public function edit($id){
        $btype = DocumentCategory::where('id', $id)->where('estado', 1)->first();
        
        if (!$btype) {
            \Session::flash('message-error', 'Tipo de Documento no Existe');
            return redirect('admin/document');
        } else {
            $banners = Document::where('document_category_id', $id)->orderBy('created_at','desc')->get();
            return view('admin.general.uploaddoc', compact('banners', 'btype'));
        }
    }

    public function store(Request $request){
        $files = $request->file('file');

        if (count($files) > 0) {
            if (isset($files[0])) {
                foreach ($files as $file) {

                    $docName = $this->cargar($file);

                    if ($docName) {
                        $doc_req = $request->all();
                        $doc_req['link_documento'] = $docName;

                        $docs = Document::create($doc_req);
                    }
                }
            } else {
                $docName = $this->cargar($files);

                if ($imageName) {
                    $doc_req = $request->all();
                    $doc_req['link_documento'] = $docName;

                    $docs = Document::create($doc_req);
                }
            }
        } else {
            return 0;
        }
    }

    private function cargar($file, $imageName = false){
        if ($imageName) {
            $exists = File::exists(public_path("documents/".$imageName));
            if ($exists) {
                File::delete(public_path("documents/".$imageName));
            }

            $image = explode('.', $imageName);
            $imageName = $image[0].'.'.$file->getClientOriginalExtension();
        } else {
            $imageName = 'Documento_'.date('YmdHis', time()).rand().'.'.$file->getClientOriginalExtension();
        }

        $file->move(public_path('documents'), $imageName);
        $exists = File::exists(public_path("documents/".$imageName));

        if ($exists) {
            return $imageName;
        } else {
            return false;
        }
    }

    public function destroy($id){
        $docs = Document::find($id);

        if ($docs->delete()) {
            \Session::flash('message', 'Documento Borrado Correctamente');
        } else {
            \Session::flash('message-error', 'El Documento no puede ser borrada');
        }

        return redirect()->back();
    }
}
