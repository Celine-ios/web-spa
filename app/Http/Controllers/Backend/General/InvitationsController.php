<?php

namespace App\Http\Controllers\Backend\General;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Invitation;
use Session;

class InvitationsController extends Controller
{
    //
    public function index(){
        $invitation = Invitation::paginate(10);
        return view('admin.admin.invitations', compact('invitation'));
    }

    public function edit($id){
        $invitation     = Invitation::find($id);

        if ($invitation) {
            return view('admin.admin.new-edit-client', compact('$invitation'));
        } else {
            Session::flash('message-error', 'Usuario no encontrado');
            return redirect()->back();
        }
    }

    public function destroy($id){
        $invitation = Invitation::find($id);

        if ($invitation) {
            switch ($invitation->estado) {
                case 1:
                $invitation->estado = 0;
                $message = 'El Usuario ha sido Desactivado Correctamente';
                break;

                case 0:
                $invitation->estado = 1;
                $message = 'El Usuario ha sido Activado Correctamente';
                break;
            }

            $invitation->save();

            if ($invitation) {
                Session::flash('message', $message);
                return redirect('admin/invitations');
            }
        } else {
            Session::flash('message-error', 'Usuario no encontrado');
            return redirect('admin/invitations');
        }
    }





}
