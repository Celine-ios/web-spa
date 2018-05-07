var consulta = window.matchMedia('(max-width:500px)');
consulta.addListener(mediaQuery);

var $categoriaButton = document.getElementById('categoriaButton');
var $burguerbutton = document.getElementById('burguerbutton');
var $menu = document.getElementById('global-menu');
var menuCategorias = document.getElementById('MenuCategoria');
var $titulo = document.getElementsByClassName('.product-title')
var $pass = document.getElementsByClassName('input-pass');

var overlay = document.createElement("div");
overlay.setAttribute("class","categorias-overlay");
overlay.setAttribute("onClick","toggleMenuCategorias()");
overlay.setAttribute("style","position: absolute;top: 246px;left: 0;right: 0;bottom: 0;background: black;opacity: 0;z-index: 10;");


var altura = $('.banner').offset().top;

$(window).on('scroll', function(){
	if ( $(window).scrollTop() > altura ){
			$('.btn-float').addClass('visible');

	} else {
		$('.btn-float').removeClass('visible');

	}
});






function placeholder() {
	$pass.attr('placeholder', 'Type your password');
}



function toggleMenu(){
	$menu.classList.toggle('menu-active')
};

function toggleMenuCategorias(){
	if ($('#MenuCategoria').hasClass('menu-categoria-active')) {
		$('#MenuCategoria').removeClass('menu-categoria-active')
		document.body.removeChild(overlay);

	}
	else {


		$('#MenuCategoria').addClass('menu-categoria-active')
		document.body.appendChild(overlay);
	}

};


new LazyLoad();

function drow(){
	if ($('.sub-arma').hasClass('display-ar')) {
		$('.sub-arma').removeClass('display-ar');
	}
	else {
		$('.sub-arma').addClass('display-ar');
	}

};



function mediaQuery() {
	if (consulta.matches) {
		// si es vercion movil
		$('.producto-slider').removeClass('col-md-5');

		// Initialize collapse button
		$(".burguerbutton").sideNav();
		// Initialize collapsible (uncomment the line below if you use the dropdown variation)
		$('.collapsible').collapsible();



	} else {

		// si no se cumple hagamos esto
		console.log('no es vercion movil');





		$(function() {
			/**
			* for each menu element, on mouseenter,
			* we enlarge the image, and show both sdt_active span and
			* sdt_wrap span. If the element has a sub menu (sdt_box),
			* then we slide it - if the element is the last one in the menu
			* we slide it to the left, otherwise to the right
			*/
			$('#sdt_menu > li').bind('mouseenter',function(){
				var $elem = $(this);
				$elem.find('img')
				.stop(true)
				.animate({
					'width':'170px',
					'height':'170px',
					'left':'0px'
				},400,'easeOutBack')
				.addBack()
				.find('.sdt_wrap')
				.stop(true)
				.animate({'top':'60px'},500,'easeOutBack')
				.addBack()
				.find('.sdt_active')
				.stop(true)
				.animate({'height':'70px'},300,function(){
					var $sub_menu = $elem.find('.sdt_box');
					if($sub_menu.length){
						var left = '170px';
						if($elem.parent().children().length == $elem.index()+1)
						left = '-170px';
						$sub_menu.show().animate({'left':left},200);
					}
				});
			}).bind('mouseleave',function(){
				var $elem = $(this);
				var $sub_menu = $elem.find('.sdt_box');
				if($sub_menu.length)
				$sub_menu.hide().css('left','0px');

				$elem.find('.sdt_active')
				.stop(true)
				.animate({'height':'0px'},300)
				.addBack().find('img')
				.stop(true)
				.animate({
					'width':'0px',
					'height':'0px',
					'left':'85px'},400)
					.addBack()
					.find('.sdt_wrap')
					.stop(true)
					.animate({'top':'8px'},500);
				});
			});

			// Initialize collapse button


			$('.producto-slider').removeClass('col-md-5');
			$('#der').addClass('pull-right');
		}
	}
	mediaQuery();




$(document).ready( function () {
	$('#table_id').DataTable( {
		"scrollX": true,
		"paging": true,
		"lengthChange": false,
		"searching": false,
		"ordering": true,
		"info": true,
		"autoWidth": true,
		"language": {
			"search": "Buscar:",
			"zeroRecords": "No se encontraron resultados",
			"info": "PÃ¡gina _PAGE_ de _PAGES_",
			"infoEmpty": "No se encontraron datos",
			"infoFiltered": "(Filtrados de _MAX_ registros)",
			"processing":     "Buscando...",
			"paginate": {
				"first":      "Primera",
				"last":       "Ãšltima",
				"next":       "Siguiente",
				"previous":   "Anterior"
			},
		}
	});


} );



$(document).ready(function(){
	// Target your element
	$('select').material_select();

	$('.logo').colourBrightness();

	$('#productos-destacados').owlCarousel({
		loop:true,
		autoplay:true,
		autoplayTimeout:2000,
		autoplayHoverPause:true,
		dots: true,
		lazyLoad: true,
		margin:10,
		navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
		rewindNav : true,
		responsiveClass:true,
		navigation: true,
		responsive:{
			0:{
				items:1,
				nav:true
			},
			600:{
				items:3,
				nav:false
			},
			1000:{
				items:5,
				nav:true,
				loop:false
			}
		}
	})

	$('#productos-destacados2').owlCarousel({
		loop:true,
		autoplay:true,
		autoplayTimeout:2500,
		autoplayHoverPause:true,
		dots: true,
		lazyLoad: true,
		margin:10,
		navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
		rewindNav : true,
		responsiveClass:true,
		navigation: true,
		responsive:{
			0:{
				items:1,
				nav:true
			},
			600:{
				items:3,
				nav:false
			},
			1000:{
				items:5,
				nav:true,
				loop:false
			}
		}
	})

	$('#productos-lista').owlCarousel({
		loop:true,
		autoplay:true,
		autoplayTimeout:2000,
		autoplayHoverPause:true,
		dots: true,
		lazyLoad: true,
		margin:10,
		navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
		rewindNav : true,
		responsiveClass:true,
		navigation: true,
		responsive:{
			0:{
				items:1,
				nav:true
			},
			600:{
				items:2,
				nav:false
			},
			1000:{
				items:3,
				nav:true,
				loop:false
			}
		}
	})

	$('#productos-promocion').owlCarousel({
		loop:true,
		autoplay:true,
		autoplayTimeout:2000,
		lazyLoad: true,
		navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
		rewindNav : true,
		margin:10,
		responsiveClass:true,
		responsive:{
			0:{
				items:1,
				nav:true
			},
			600:{
				items:3,
				nav:false
			},
			1000:{
				items:5,
				nav:true,
				loop:false
			}
		}
	})

	$('#productos-nuevos').owlCarousel({
		loop:true,
		autoplay:true,
		autoplayTimeout:2000,
		navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
		rewindNav : true,
		margin:10,
		responsiveClass:true,
		lazyLoad: true,
		responsive:{
			0:{
				items:1,
				nav:true
			},
			600:{
				items:3,
				nav:false
			},
			1000:{
				items:5,
				nav:true,
				loop:false
			}
		}
	})

  $('#banner-principal').owlCarousel({
		loop:true,
		autoplay:true,
		autoplayTimeout:3500,
		autoplayHoverPause:true,
		dots: true,
		lazyLoad: true,
		margin:10,
		navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
		rewindNav : true,
		responsiveClass:true,
		navigation: true,
		responsive:{
			0:{
				items:1,
				nav:true
			},
			600:{
				items:1,
				nav:false
			},
			1000:{
				items:1,
				nav:true,
				loop:true
			}
		}
	})


	$('#banner-impulso').owlCarousel({
		loop:true,
		autoplay:true,
		autoplayTimeout:2000,
		autoplayHoverPause:true,
		dots: true,
		lazyLoad: true,
		margin:10,
		navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
		rewindNav : true,
		responsiveClass:true,
		navigation: true,
		items:1,
	})

	$('#banner-categoria').owlCarousel({
		loop:true,
		autoplay:true,
		autoplayTimeout:5000,
		autoplayHoverPause:true,
		dots: false,
		nav: true,
		lazyLoad: true,
		margin:10,
		navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
		rewindNav : true,
		responsiveClass:true,
		navigation: true,
		items:1,
		responsive:{
			0:{
				items:1,
				nav:false
			},
			600:{
				items:1,
				nav:false
			},
			1000:{
				items:1,
				nav:true
			}
		}
	})





});


$('.enlace').on('click', function(event) {
         var target = $(this.getAttribute('href'));
         if( target.length ) {
         event.preventDefault();
         $('html, body').stop().animate({
         scrollTop: target.offset().top
         }, 1000);
         }
         });



var protocol = location.protocol;
var slashes = protocol.concat("//");
var host = slashes.concat(window.location.hostname);

$(function() {
	$( "#product_search" ).autocomplete({
		source: function( request, response ) {
			$.ajax( {
				url: window.location.origin+'/api/search_product',
				method: 'post',
				data: {
					term: request.term
				},
				success: function( data ) {
					response( data );
				}
			} );
		},
		minLength: 2,
		select: function( event, ui ) {
			$('#product_search_slug').val(ui.item.slug);
			$('#product_search').val(ui.item.value);
			$('#searchPForm').submit();
		}
	});
});

$(function () {
    $("#mdb-lightbox-ui").load("mdb-addons/mdb-lightbox-ui.html");
});


(function(){

	$(".flex-slide").each(function(){
		$(this).hover(function(){
			$(this).find('.flex-title').css({
				transform: 'rotate(0deg)',
				top: '10%'
			});
			$(this).find('.flex-about').css({
				opacity: '1'
			});
		}, function(){
			$(this).find('.flex-title').css({
				transform: 'rotate(90deg)',
				top: '15%'
			});
			$(this).find('.flex-about').css({
				opacity: '0'
			});
		})
	});
})();
