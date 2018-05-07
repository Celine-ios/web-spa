<?php

namespace App\Http\Controllers\Backend\General;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use App\Http\Requests;
use App\Http\Requests\ImageRequest;

use App\Wallpaper;

use File;
use Session;

class WallpaperController extends Controller {

	public function __construct(){
		$this->middleware('admin');
	}

	public function index(){
		$types = ['imagen' => 'Imagen', 'video' => 'Video'];
		$wallpapers = Wallpaper::where('estado', 1)->paginate(10);


		return view('admin.general.wallpapers', compact('wallpapers','types'));
	}

	public function store(Request $request){
		$validator = \Validator::make($request->all(), [
			'link'         => 'required|max:150|unique:wallpapers',
			'tipo_archivo' => 'required',
		]);

		if ($validator->fails()) {
			return redirect()->back()->withErrors($validator);
		} else {
			if ($request->tipo_archivo === 'imagen') {
				$validator = \Validator::make($request->all(), [
					'link_imagen'  => 'required|max:10000|mimes:jpg,jpeg,png,gif',
				]);

				if ($validator->fails()) {
					return redirect()->back()->withErrors($validator);
				} else {
					if (verify_link($request->link)) {
						$imageName = $this->cargar_imagen($request->file('link_imagen'));

						if ($imageName) {
							$wallpaper_req = $request->all();
							$wallpaper_req['link']        = ltrim($wallpaper_req['link'], '/');
							$wallpaper_req['link_imagen'] = $imageName;

							$wallpaper = Wallpaper::create($wallpaper_req);

							if ($wallpaper) {
								Session::flash('message', 'Wallpaper Creado Correctamente');
							} else {
								Session::flash('message-error', 'Error en el guardado del Wallpaper');
							}

						} else {
							Session::flash('message-error', 'Error en el guardado del Banner');
						}
					} else {
						Session::flash('message-error', 'La dirección especificada no existe o está repetida');
					}
				}

			} else {
				if (verify_link($request->link)) {
					$wallpaper_req = $request->all();
					$wallpaper_req['link']        = ltrim($wallpaper_req['link'], '/');
					$wallpaper_req['link_imagen'] = slugify_text($request->link);

					$wallpaper = Wallpaper::create($wallpaper_req);

					if ($wallpaper) {
						Session::flash('message', 'Wallpaper Creado Correctamente');
					} else {
						Session::flash('message-error', 'Error en el guardado del Wallpaper');
					}
				} else {
					Session::flash('message-error', 'La dirección especificada no existe o está repetida');
				}
			}

			return redirect('admin/wallpaper');
		}
	}

	public function update(Request $request, $id){
		$wallpaper = Wallpaper::find($id);

		if ($wallpaper) {
			$validator = \Validator::make($request->all(), [
				'link'         => ['required', 'max:150', Rule::unique('wallpapers')->ignore($wallpaper->id)],
				'tipo_archivo' => 'required',
			]);

			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator);
			} else {
				if ($request->tipo_archivo === 'imagen') {
					if ($validator->fails()) {
						return redirect()->back()->withErrors($validator);
					} else {
						if (verify_link($request->link)) {
							$imageName = $this->cargar_imagen($request->file('link_imagen'), $wallpaper['link_imagen']);

							if ($imageName) {
								$wallpaper_req = $request->all();
								$wallpaper_req['link']        = ltrim($wallpaper_req['link'], '/');
								$wallpaper_req['link_imagen'] = $imageName;

								$wallpaper->fill($wallpaper_req)->save();

								if ($wallpaper) {
									Session::flash('message', 'Wallpaper Actualizado Correctamente');
								} else {
									Session::flash('message-error', 'Error en el guardado del Wallpaper');
								}

							} else {
								Session::flash('message-error', 'Error en el guardado del Banner');
							}
						} else {
							Session::flash('message-error', 'La dirección especificada no existe o está repetida');
						}
					}

				} else {
					if (verify_link($request->link)) {
						$wallpaper_req = $request->all();
						$wallpaper_req['link']        = ltrim($wallpaper_req['link'], '/');
						$wallpaper_req['link_imagen'] = slugify_text($request->link);

						$wallpaper->fill($wallpaper_req)->save();

						if ($wallpaper) {
							Session::flash('message', 'Wallpaper Actualizado Correctamente');
						} else {
							Session::flash('message-error', 'Error en el guardado del Wallpaper');
						}
					} else {
						Session::flash('message-error', 'La dirección especificada no existe o está repetida');
					}
				}
			}
		} else {
			Session::flash('message-error', 'El Wallpaper no se encuentra');
		}

		return redirect('admin/wallpaper');
	}

	public function destroy($id){
		$wallpaper = Wallpaper::find($id);

		if ($wallpaper) {
			if ($wallpaper->delete()) {
				Session::flash('message', 'Wallpaper Borrado Correctamente');
			} else {
				Session::flash('message-error', 'El Wallpaper no puede ser borrado');
			}
		} else {
			Session::flash('message-error', 'El Wallpaper no se encuentra');
		}

		return redirect('admin/wallpaper');
	}

	private function cargar_imagen($file, $imageName = false){
		if (is_null($file)) {
			return $imageName;
		} else {

			if ($imageName) {
				$exists = File::exists(public_path("images/wallpapers/".$imageName));
				if ($exists) {
					File::delete(public_path("images/wallpapers/".$imageName));
				}

				$image = explode('.', $imageName);
				$imageName = $image[0].'.'.$file->getClientOriginalExtension();
			} else {
				$imageName = 'Wallpaper_'.date('YmdHis', time()).rand().'.'.$file->getClientOriginalExtension();
			}

			$file->move(public_path('images/wallpapers'), $imageName);

			$exists = File::exists(public_path("images/wallpapers/".$imageName));

			if ($exists) {
				return $imageName;
			} else {
				return false;
			}
		}
	}
}
