<?php

namespace App\Http\Controllers\Backend\General;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\ImageRequest;
use App\Banner;
use App\BannerType;

use File;
use Session;

class BannerController extends Controller{

    public function __construct(){
        $this->middleware('admin');
    }

    public function index(){
        $btypes = BannerType::where('estado', 1)->paginate(10);
        return view('admin.general.banners', compact('btypes'));
    }

    public function store(Request $request)
    {
        $files = $request->file('file');

        $path = public_path().'/images/banners';
        $files = $request->file('file');
        $nombre ="";
        foreach($files as $file)
        {
            $filename = 'Banner_'.date('YmdHis', time()).rand().'.'.$file->getClientOriginalName();
            $nombre = '/images/banners/'.$filename;
            $file->move($path, $filename);
        }

        $imagen = new Banner;
        $imagen->link = $request->link;
        $imagen->link_imagen = $nombre;
        $imagen->estado=true;
        $imagen->banner_types_id = $request->id;
        $imagen->tipo_archivo = "imagen";
        $imagen->save();

    }

    public function edit($id){
        try {
            $tipo = 'imagen';
            $btypes = BannerType::where('nombre', 'LIKE', 'video%')->pluck('id')->toArray();
            $btype = BannerType::find($id);

            if (in_array($id, $btypes)) {
                $tipo = 'video';
                $banners = Banner::where('banner_types_id', $id)->where('estado', 1)->first();   
            } else {
                $banners = Banner::where('banner_types_id', $id)->where('estado', 1)->orderBy('created_at','desc')->get();    
            }

            return view('admin.general.uploadban', compact('banners', 'btype', 'tipo'));
        } catch (\Exception $e) {
            \Session::flash('message-error', $e->getMessage());
            return redirect('admin/banner');
        }
    }

public function updateURL(Request $request)
    {
        $banner = Banner::find($request->id);
        $banner->link = $request->url;
        $banner->save();
        Session::flash('message', 'Se ha realizado la actualizaci¨®n correctamente');

        return redirect()->back();
    }

    public function update(Request $request, $id){
        try {
            $btype = BannerType::find($id);

            if ($btype) {
                $btypes = BannerType::where('nombre', 'LIKE', 'video%')->pluck('id')->toArray();

                if (in_array($id, $btypes)) {
                    if (!youtube_match($request->nombre)) {
                        throw new \Exception("SÃ³lo agregar videos de YouTube", 1);    
                    }

                    $banner = Banner::where('banner_types_id', $id)->where('estado', 1)->first();

                    if ($banner) {
                        $banner->fill(['link_imagen' => youtube_match($request->nombre)])->save();
                    } else {
                        $banner = Banner::create(['nombre' => $btype->nombre, 'link_imagen' => youtube_match($request->nombre), 'link' => '/', 'banner_types_id' => $btype->id, 'tipo_archivo' => 'video']);
                    }

                    if ($banner) {
                        \Session::flash('message', 'Banner Creado Correctamente');
                        return redirect()->back();   
                    } else {
                        throw new \Exception("Error en el guardado del Banner", 1);
                    }
                } else {
                    throw new \Exception("El Tipo de Banner no se Encuentra", 1);    
                }
            } else {
                throw new \Exception("El Tipo de Banner no se Encuentra", 1);
            }


        } catch (\Exception $e) {
            \Session::flash('message-error', $e->getMessage());
            return redirect()->back();   
        }
    }

    private function cargar_imagen($file, $imageName = false){
        if ($imageName) 
        {
            $exists = File::exists(public_path("images/banners/".$imageName));
            if ($exists) 
            {
                File::delete(public_path("images/banners/".$imageName));
            }

            $image = explode('.', $imageName);
            $imageName = $image[0].'.'.$file->getClientOriginalExtension();
        } 
        else 
        {
            $imageName = 'Banner_'.date('YmdHis', time()).rand().'.'.$file->getClientOriginalExtension();
        }

        $file->move(public_path('images/banners'), $imageName);

        $exists = File::exists(public_path("images/banners/".$imageName));

        if ($exists) {
            return $imageName;
        } else {
            return false;
        }
    }

    public function destroy($id){
        $banner = Banner::find($id);

        if ($banner) {
            $exists = File::exists(public_path("images/banners/".$banner->link_imagen));
            if ($exists) {
                File::delete(public_path("images/banners/".$banner->link_imagen));
            }

            if ($banner->delete()) {
                Session::flash('message', 'Banner Borrado Correctamente');
            } else {
                Session::flash('message-error', 'El Banner no puede ser borrada');
            }
        } else {
            Session::flash('message-error', 'El Banner no se encuentra');
        }

        return redirect()->back();
    }

}
