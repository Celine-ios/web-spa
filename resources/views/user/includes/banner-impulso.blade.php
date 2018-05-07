<div id="banner-impulso" class="owl-carousel">
	@foreach($banners_impulso as $bi)
	<div>
		<a href="{{url($bi->link)}}">
			{!!Html::image((file_exists('images/banners/'.$bi->link_imagen) ? 'images/banners/'.$bi->link_imagen : 'images/no-image.jpg'), null, ['width' => '100%'])!!}
		</a>
	</div>
	@endforeach
</div>
