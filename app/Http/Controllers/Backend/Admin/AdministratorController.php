<?php

namespace App\Http\Controllers\Backend\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


use App\Admin;
use App\Role;

use Session;

class AdministratorController extends Controller{

    public function __construct(){
        $this->middleware('admin');
    }

    public function index(){
        $users = Admin::paginate(10);

        return view('admin.admin.user', compact('users'));
    }

    public function create(){
        $roles    = Role::pluck('display_name', 'id');
        $assigned = null;

        return view('admin.admin.new-edit-user', compact('roles', 'assigned'));
    }

    public function store(Request $request){
        try {
            $validator = \Validator::make($request->all(), [
                'name'     => 'required|max:150',
                'username' => 'required|unique:admins',
                'email'    => 'required|email|unique:admins',
                'roles'    => 'required'
            ]);


            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            } else {
                $request->merge(['password' => $request->input('username')]);
                $roles = $request->input('roles');

                $user = Admin::create($request->all());

                if ($user) {
                    if ($user->roles()->sync($roles)) {
                        \Session::flash('message', 'El Usuario ha sido Creado Correctamente');
                        return redirect('admin/user');
                    } else {
                        $user->delete();
                        throw new \Exception('Se ha generado un error en el guardado del usuario');
                    }
                } else {
                    throw new \Exception('Se ha generado un error en el guardado del usuario');
                }
            }
        } catch (\Exception $e) {
            \Session::flash('message-error', $e->getMessage());            
            return redirect()->back();
        }

    }

    public function show($id){}

    public function edit($id){
        try {
            $user = Admin::find($id);    

            if ($user) {
                $roles    = Role::pluck('display_name', 'id');
                $assigned = $user->cachedRoles()->pluck('id')->toArray();

                return view('admin.admin.new-edit-user', compact('user', 'roles', 'assigned'));
            } else {
                throw new \Exception('Usuario no encontrado');
            }
        } catch (\Exception $e) {
            \Session::flash('message-error', $e->getMessage());
            return redirect('admin/user');
        }
    }

    public function update(Request $request, $id){
        try {
            $user = Admin::find($id);    

            if ($user) {
                $validator = \Validator::make($request->all(), [
                    'name'     => 'required|max:150',
                    'username' => ['required', Rule::unique('admins')->ignore($user->id)],
                    'email'    => ['required', 'email', Rule::unique('admins')->ignore($user->id)],
                    'roles'    => 'required'
                    ]);

                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                } else {
                    $roles = $request->input('roles');
                    $request->merge(['password' => $user->password]);
                    $user->fill($request->all());
                    $user->save();

                    if ($user) {
                        if ($user->roles()->sync($roles)) {
                            \Session::flash('message', 'El Usuario ha sido Actualizado Correctamente');
                            return redirect('admin/user');
                        } else {
                            throw new \Exception('Se ha generado un error en el guardado del usuario');
                        }
                    } else {
                        throw new \Exception('Se ha generado un error en el guardado del usuario');
                    }
                }
            } else {
                throw new \Exception('Usuario no encontrado');
            }
        } catch (\Exception $e) {
            \Session::flash('message-error', $e->getMessage());
            return redirect('admin/user');
        }
    }

    public function destroy($id){
        try {
            $user = Admin::find($id);    

            if ($user) {
                switch ($user->active) {
                    case 1:
                    $user->active = 0;
                    $message = 'El Usuario ha sido Desactivado Correctamente';
                    break;

                    case 0:
                    $user->active = 1;
                    $message = 'El Usuario ha sido Activado Correctamente';
                    break;
                }

                $user->save();

                if ($user) {
                    \Session::flash('message', $message);
                    return redirect('admin/user');
                }
            } else {
                throw new \Exception('Usuario no encontrado');
            }
        } catch (\Exception $e) {
            \Session::flash('message-error', $e->getMessage());
            return redirect('admin/user');
        }
    }

    public function profile(){
        return view('admin.admin.config_user');
    }

    public function profile_update(Request $request){
        $user = \Auth::guard('admin')->user();

        try {
            $validator = \Validator::make($request->all(), [
                'name'     => 'required|max:150',
                'email'    => ['required', 'email', Rule::unique('admins')->ignore($user->id)],
                'password' => 'confirmed'
                ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            } else {
                if(!$request->input('password')){
                    $request->merge(['password' => $user->password]);
                }

                $user->fill($request->all());
                $user->save();

                if ($user) {
                    \Session::flash('message', 'El Usuario ha sido Actualizado Correctamente');
                } else {
                    throw new \Exception('Se ha generado un error en el guardado del usuario');
                }

                return redirect()->back();
            }

        } catch (\Exception $e) {
            \Session::flash('message-error', $e->getMessage());
            return redirect('admin/user');
        }
    }
}