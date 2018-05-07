<div class="banner col-md-9">
	<div class="owl-carousel" id="banner-principal">
		@foreach($banners['principal'] as $banner)

		<div>
			<a href="{{url($banner->link)}}">
<img src="{{$banner->link_imagen}}" alt="" width="911">
			</a>
		</div>
		@endforeach
	</div>
</div>
<div class="publicidad2">
	<div class="row">
		<div class="col-md-8" style="padding-right:0px !important;">
			<div class="banner-secundario" style="overflow:hidden;">
				@if($banners['secundario'])
				<a href="{{url($banners['secundario']->link)}}">
					<img src="{{$banners['secundario']->link_imagen}}" alt="" width="100%">
				</a>
				@endif
			</div>
		</div>
		<div class="col-md-4" style="padding-left:0px !important;">
			<div class="video-home" style="height:176px; width:100%; overflow:hidden;">
				@if($banners['video'])
				<div class="embed-responsive embed-responsive-16by9">
					<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{$banners['video']->link_imagen}}"></iframe>
				</div>
				@endif
			</div>
		</div>
	</div>
</div>
