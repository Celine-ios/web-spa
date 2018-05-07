<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Invitation;
use Session;
use Mail;
use App\Mail\InvitationMail;



class InvitationController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    //
  }



  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
    //

    $validator = \Validator::make($request->all(), [
      'email'    => 'required|email',
      'name' => 'required',
      'number'   => 'required',
    ]);
    if ($validator->fails()) {
      return redirect()->back()->withErrors($validator)->withInput();
    } else {

      if($request){

        $email = Invitation::where('email',$request->email)->first();

        if(count($email) >= 1){

          Session::flash('message', 'El email ya tiene invitación');
          return redirect('/');

        } else {

          $cc = Invitation::where('cc',$request->cc)->first();

          if(count($cc) >= 1){

            Session::flash('message', 'Un usuario ya tienen asignado ese número de documento');
            return redirect('/');


          }else {

            $invitation = Invitation::create($request->all());

            Mail::to($request->email)
            ->bcc(env('MAIL_FROM'), '')
            ->send(new InvitationMail($invitation));
            Session::flash('message', 'Tu invitacion se ha creado correctamente');
            return redirect('/');
          }
        }
      }
    }

  }


  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit($id)
  {
    //
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, $id)
  {
    //
  }


}
