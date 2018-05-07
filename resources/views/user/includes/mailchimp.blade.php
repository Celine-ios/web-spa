{!!Form::open(['url'=>'mailchimp_register', 'method'=>'POST', 'class' => 'form-inline'])!!}
<div class="md-form">
    <i class="fa fa-envelope prefix"></i>
    <input type="email" name="email" class="required email" id="form2" class="form-control" placeholder="Suscribirse a las promociones">
    <button type="submit" class="btn btn-tauret" name="suscribirce"><i class="fa fa-send"></i></button>
</div>
{!!Form::close()!!}
