@extends('mercadolibre::layouts.master')
@section('title', 'Questions')
@section('content')
<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">Questions</h1>
  </div>
</div>
<div class="row">
  <div class="col-lg-12">
    <div class="chat-panel panel panel-primary">
      <div class="panel-heading">
        <i class="fa fa-comments fa-fw"></i> Chat
        <div class="btn-group pull-right">
          <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
          <i class="fa fa-chevron-down"></i>
          </button>
          <ul class="dropdown-menu slidedown">
            <li>
              <a href="#">
                <i class="fa fa-check-circle fa-fw"></i> Available
              </a>
            </li>
            <li>
              <a href="#">
                <i class="fa fa-clock-o fa-fw"></i> Away
              </a>
            </li>
          </ul>
        </div>
      </div>
      <!-- /.panel-heading -->
      <div class="panel-body">
        <ul class="chat">
          <li class="left clearfix">
            <span class="chat-img pull-left">
              <img src="http://placehold.it/50/55C1E7/fff" alt="User Avatar" class="img-circle" />
            </span>
            <div class="chat-body clearfix">
              <div class="header">
                <strong class="primary-font">Jack Sparrow</strong>
                <small class="pull-right text-muted">
                <i class="fa fa-clock-o fa-fw"></i> 12 mins ago
                </small>
              </div>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
              </p>
            </div>
          </li>
          <li class="right clearfix">
            <span class="chat-img pull-right">
              <img src="http://placehold.it/50/FA6F57/fff" alt="User Avatar" class="img-circle" />
            </span>
            <div class="chat-body clearfix">
              <div class="header">
                <small class=" text-muted">
                <i class="fa fa-clock-o fa-fw"></i> 13 mins ago</small>
                <strong class="pull-right primary-font">Bhaumik Patel</strong>
              </div>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
              </p>
            </div>
          </li>
          <li class="left clearfix">
            <span class="chat-img pull-left">
              <img src="http://placehold.it/50/55C1E7/fff" alt="User Avatar" class="img-circle" />
            </span>
            <div class="chat-body clearfix">
              <div class="header">
                <strong class="primary-font">Jack Sparrow</strong>
                <small class="pull-right text-muted">
                <i class="fa fa-clock-o fa-fw"></i> 14 mins ago</small>
              </div>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
              </p>
            </div>
          </li>
          <li class="right clearfix">
            <span class="chat-img pull-right">
              <img src="http://placehold.it/50/FA6F57/fff" alt="User Avatar" class="img-circle" />
            </span>
            <div class="chat-body clearfix">
              <div class="header">
                <small class=" text-muted">
                <i class="fa fa-clock-o fa-fw"></i> 15 mins ago</small>
                <strong class="pull-right primary-font">Bhaumik Patel</strong>
              </div>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
              </p>
            </div>
          </li>
        </ul>
      </div>
      <!-- /.panel-body -->
      <div class="panel-footer">
        <div class="input-group">
          <input id="btn-input" type="text" class="form-control input-sm" placeholder="Type your message here..." />
          <span class="input-group-btn">
            <button class="btn btn-warning btn-sm" id="btn-chat">
            Send
            </button>
          </span>
        </div>
      </div>
      <!-- /.panel-footer -->
    </div>
    <!-- /.panel .chat-panel -->
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="details">
      @foreach($questions->questions as $question)
      <span class="label label-default" style="font-size:12px;">{!! $question->item_id !!}</span> <br><br>
      <span class="label label-info" style="font-size:14px;">{!! $question->text !!}</span> <br><br>
      @if($question->status != 'ANSWERED')
      <span class="label label-default" style="font-size:16px;"> Respuesta: </span> <br><br>
      <textarea rows="4" cols="50" placeholder="Escribe aqui tu respuesta..."></textarea>
      <button class="btn btn-info">Responder</button>
      @else
      <span class="label label-success" style="font-size:16px;"> {{$question->answer->text}} </span> <br><br>
      @endif
      <hr>
      @endforeach
    </div>
  </div>
</div>
@endsection