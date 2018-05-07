<?php

namespace App\Http\Controllers\Backend\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;

use App\Role;
use App\Permission;
use Session;

class RoleController extends Controller{
    public function __construct(){
        $this->middleware('admin');
    }

    public function index(){
        $roles = Role::paginate(10);
        return view('admin.admin.role', compact('roles'));
    }

    public function create(){
        $permissions = Permission::pluck('display_name', 'id');
        $assigned    = null;

        return view('admin.admin.new-edit-role', compact('permissions', 'assigned'));
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request){
        try {
            $validator = \Validator::make($request->all(), [
                'display_name' => 'required|max:150',
                'description'  => 'required|max:200',
                'permissions'  => 'required'
                ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            } else {
                $role = Role::create($request->all());

                if ($role) {
                    if ($role->perms()->sync($request->permissions)) {
                        Session::flash('message', 'Rol de Usuario Creado Correctamente');
                        return redirect('admin/role');
                    } else {
                        $role->delete();
                        throw new Exception('Se ha generado un error en el guardado del rol de usuario');
                    }
                } else {
                    throw new Exception('Se ha generado un error en el guardado del rol de usuario');
                }
            }

        } catch (Exception $e) {
            \Session::flash('message-error', $e->getMessage());
            return redirect()->back()->withInput();
        }
        
    }

    public function edit($id){
        try {
            $role = Role::find($id);

            if ($role) {
                $assigned = $role->cachedPermissions()->pluck('id')->toArray();
                $permissions = Permission::pluck('display_name', 'id');
                return view('admin.admin.new-edit-role', compact('role', 'permissions', 'assigned'));
            } else {
                throw new Exception('El Rol de Usuario no se encuentra');
            }    
        } catch (Exception $e) {
            \Session::flash('message-error', $e->getMessage());
            return redirect()->back();
        }
    }

    public function update(Request $request, $id){
        try {
            $role = Role::find($id);
            if ($role) {
                $permissions = $request->input('permissions');
                $role->fill($request->all());
                if ($role->save()) {
                    if ($role->perms()->sync($permissions)) {
                        Session::flash('message', 'Rol de Usuario Actualizado Correctamente');
                        return redirect('admin/role');
                    } else {
                        throw new Exception('Se ha generado un error en el guardado del rol de usuario');
                    }
                } else {
                    throw new Exception('Se ha generado un error en el guardado del rol de usuario');
                }
            } else {
                throw new Exception('El Rol de Usuario no se encuentra');
            }    
        } catch (Exception $e) {
            \Session::flash('message-error', $e->getMessage());
            return redirect()->back();    
        }
    }

    public function destroy($id){
        try {
            $role = Role::find($id);
            if ($role) {
                if ($role->delete()) {
                    Session::flash('message', 'Rol de Usuario Borrado Correctamente');
                    return redirect('admin/role');
                } else {
                    throw new Exception('Se ha generado un error en el borrado del rol de usuario');
                }

            } else {
                throw new Exception('El Rol de Usuario no se encuentra');   
            }
        } catch (Exception $e) {
            \Session::flash('message-error', $e->getMessage());
            return redirect()->back();    
        }
        

    }
}
