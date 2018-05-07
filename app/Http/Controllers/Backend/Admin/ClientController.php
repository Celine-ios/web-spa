<?php

namespace App\Http\Controllers\Backend\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

use Illuminate\Http\Request;
use App\User;

use Session;

class ClientController extends Controller{
    public function index(){
        $users = User::paginate(10);
        return view('admin.admin.client', compact('users'));
    }

    public function create(){
        return view('admin.admin.new-edit-client');
    }

    public function store(Request $request){
        $validator = \Validator::make($request->all(), [
            'name'     => 'required|max:150',
            'username' => 'required|unique:admins',
            'email'    => 'required|email|unique:admins'
            ]);


        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $request->merge(['password' => $request->input('username')]);

            $user = User::create($request->all());

            if ($user) {
                Session::flash('message', 'El Usuario ha sido Creado Correctamente');
                return redirect('admin/client');
            } else {
                Session::flash('message-error', 'Se ha generado un error en el guardado del usuario');
                return redirect()->back();
            }
        }
    }

    public function quick_view($id){
        $user     = User::find($id);

        if ($user) {
            return view('admin.admin.quick_client', compact('user'));
        }
    }

    public function edit($id){
        $user     = User::find($id);

        if ($user) {
            return view('admin.admin.new-edit-client', compact('user'));
        } else {
            Session::flash('message-error', 'Usuario no encontrado');
            return redirect()->back();
        }
    }

    public function update(Request $request, $id){
        $user     = User::find($id);

        if ($user) {
            $validator = \Validator::make($request->all(), [
                'name'     => 'required|max:150',
                'username' => ['required', Rule::unique('admins')->ignore($user->id)],
                'email'    => ['required', 'email', Rule::unique('admins')->ignore($user->id)]
                ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            } else {
                $request->merge(['password' => $user->password]);
                $user->fill($request->all());
                $user->save();

                if ($user) {
                    Session::flash('message', 'El Usuario ha sido Actualizado Correctamente');
                    return redirect('admin/client');
                } else {
                    Session::flash('message-error', 'Se ha generado un error en el guardado del usuario');
                    return redirect()->back();
                }
            }
        } else {
            Session::flash('message-error', 'Usuario no encontrado');
            return redirect('admin/client');
        }
    }

    public function destroy($id){
        $user = User::find($id);

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
                Session::flash('message', $message);
                return redirect('admin/client');
            }
        } else {
            Session::flash('message-error', 'Usuario no encontrado');
            return redirect('admin/client');
        }
    }
}
