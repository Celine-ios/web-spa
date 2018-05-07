<?php

namespace App\Http\Controllers\Backend\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Permission;
use Session;

class PermissionController extends Controller{

    public function __construct(){
        $this->middleware('admin');
    }

    public function index(){
        $permissions = Permission::paginate(10);

        return view('admin.admin.permission', compact('permissions'));
    }

    public function store(Request $request){
        try {
            $validator = \Validator::make($request->all(), [
                'display_name' => 'required|max:150',
                'description'  => 'required|max:150'
                ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator);
            } else {
                $permission = Permission::create($request->all());
                if ($permission) {
                    Session::flash('message', 'Permiso Creado Correctamente');                
                    return redirect('admin/permission');
                } else {
                    throw new \Exception('Error en el guardado del Permiso');
                }
            }
        } catch (\Exception $e) {
            \Session::flash('message-error', $e->getMessage());
            return redirect()->back();
        }
    }

    public function update(Request $request, $id){
        try {
            $validator = \Validator::make($request->all(), [
                'display_name' => 'required|max:150',
                'description'  => 'required|max:150'
                ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator);
            } else {
                $permission = Permission::find($id);

                if ($permission) {
                    $permission->fill($request->all())->save();

                    if ($permission) {
                        Session::flash('message', 'Permiso Actualizado Correctamente');
                        return redirect('admin/permission');
                    } else {
                        throw new \Exception('Error en el guardado del Permiso');
                    }
                } else {
                    throw new \Exception('No se encuentra el Permiso');
                }
            }
        } catch (\Exception $e) {
            \Session::flash('message-error', $e->getMessage());
            return redirect()->back();
        }
    }

    public function destroy($id){
        try {
            $permission = Permission::find($id);

            if (!$permission) {
                throw new \Exception('No se encuentra el Permiso');
            } else {
                if ($permission->delete()) {
                    Session::flash('message', 'Permiso Borrado Correctamente');
                    return redirect('admin/permission');
                } else {
                    throw new \Exception('El Permiso no puede ser borrado');
                }    
            }
        } catch (\Exception $e) {
            \Session::flash('message-error', $e->getMessage());
            return redirect()->back();
        }
    }
}
