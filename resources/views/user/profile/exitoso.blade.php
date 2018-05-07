@extends('user.layout.home')

@section('body')

<div class="col-md-6 col-md-offset-3">

<h2>Tu pago fue realizado con exito</h2>

<p>Porfavor llena este formulario para completar el proceso</p>

<div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Nuevo CLiente</a></li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Renovación</a></li>

  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">
      <form class="form" action="{{route('pay.plan')}}" method="POST">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="form-group">
          <label for="">Tipo de Plan</label>
          <input type="text" class="form-control" value="{{$miplan}}" disabled >
        </div>
        <input type="hidden" name="plan" value="{{$miplan}}">
      <input type="hidden" class="form-control" id="active" name="active" value="activado">
       <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Email">
        </div>
         <div class="form-group">
          <label for="name">Nombres y Apellidos</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Nombre completo">
        </div>
         <div class="form-group">
          <label for="birday">Fecha de nacimiento</label>
          <input type="date" class="form-control" id="birday" name="birday">
        </div>
         <div class="form-group">
          <label for="direccion">Direccion</label>
          <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Tu direccion">
        </div>
           <div class="form-group">
          <label for="direccion">Tipo de documento</label>
          <select id="tipe" name="tipe" class="form-control">
          <option value="cc">CC</option>
          <option value="ce">CE</option>
          <option value="ti">TI</option>
          </select>
        </div>
         <div class="form-group">
          <label for="cc">Numero</label>
          <input type="number" class="form-control" id="cc" name="cc" placeholder="Tu número de documento">
        </div>
         <div class="form-group">
          <label for="eps">EPS</label>
          <input type="text" class="form-control" id="eps" name="eps" placeholder="Tu Eps">
        </div>
         <div class="form-group">
          <label for="contacto">Contacto de emergencía</label>
          <input type="text" class="form-control" id="contacto" name="contacto" placeholder="Contacto de emergencia">
        </div>
         <div class="form-group">
           <select name="share" id="share" class="form-control">
          <option value="internet">Internet</option>
          <option value="redes-sociales">Redes sociales</option>
          <option value="referido">Referido</option>
          <option value="fachada">Nuestra Fachada</option>
          <option value="volante">Volante</option>
          <option value="mailing">Mailing</option>
          <option value="fitpal">Fitpal</option>
          </select>
        </div>
         <div class="form-group">
          <label for="star">Fecha de Inicio</label>
          <input type="date" class="form-control" id="star" name="star">
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
      </form>

    </div>
    <div role="tabpanel" class="tab-pane" id="profile">
      <form class="form" action="{{route('pay.plan')}}" method="POST">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="form-group">
          <label for="">Tipo de Plan</label>
          <input type="text" class="form-control" value="{{$miplan}}" disabled >
        </div>
        <input type="hidden" name="plan" value="{{$miplan}}">

         <div class="form-group">
          <label for="cc">Numero de Documento</label>
          <input type="number" class="form-control" id="cc" name="cc" placeholder="Tu número de documento">
        </div>


        <button type="submit" class="btn btn-primary">Enviar</button>
      </form>



    </div>
  </div>

</div>



<br><br>
</div>

@endsection
