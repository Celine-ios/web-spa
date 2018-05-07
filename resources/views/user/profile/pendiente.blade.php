@extends('user.layout.home')

@section('body')

<div class="col-md-6 col-md-offset-3">

<h4>Tu pago esta pendiente de validacion</h4>

<p>Porfavor llena este formulario para completar el proceso mientras esperamos a confirmacion de tu pago para activar tu afiliacion</p>

<form>
<input type="hidden" class="form-control" id="active" name="active" value="pendiente">
 <div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="Email">
  </div>
   <div class="form-group">
    <label for="name">Nombres y Apellidos</label>
    <input type="text" class="form-control" id="name" placeholder="Nombre completo">
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
    <select id="tipe" name="tipe">
    <option value="cc">CC</option>
    <option value="ce">CE</option>
    <option value="ti">TI</option>
    </select>
  </div>
   <div class="form-group">
    <label for="numero">Numero</label>
    <input type="number" class="form-control" id="numero" name="numero" placeholder="Tu numero de documento">
  </div>
   <div class="form-group">
    <label for="eps">EPS</label>
    <input type="text" class="form-control" id="eps" name="eps" placeholder="Tu Eps">
  </div>
   <div class="form-group">
    <label for="contacto">Contacto de emergencia</label>
    <input type="text" class="form-control" id="contacto" name="contacto" placeholder="Contacto de emergencia">
  </div>
   <div class="form-group">
     <select name="share" id="share">
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
<br><br>
</div>

@endsection