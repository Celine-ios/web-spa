<div class="container publicidad">
    <div class="row">
<div class="col-md-4" style="padding-left:0px !important; margin-right: -13px !important;">
            <div class="video-home" style="height:176px; width:100%; overflow:hidden;margin-left: 13px;">
                @foreach($secundario->banners as $videoSecundario)
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{$videoSecundario->link_imagen}}"></iframe>
                </div>
                @endforeach
            </div>
</div>
        <div class="col-md-8" style="padding-right:0px !important;">
            <div class="banner-secundario" style="overflow:hidden;">
               @foreach($banners['terciario'] as $banners)
                <a href="{{url($banners->link)}}">
                  <img src="{{$banners->link_imagen}}" alt="" width="100%">
                </a>
                 @endforeach
            </div>
        </div>

    </div>
</div>
