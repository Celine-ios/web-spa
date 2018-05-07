$(document).ready(function() {
    sessionStorage.clear();
    var otra = $('.global-menu').offset().top;

    $(window).on('scroll', function(){
        if ( $(window).scrollTop() > otra ){
            $('#MenuCategoria').css("display","");

        } else {
            $('#MenuCategoria').css("display","");
        }
    });

    if (typeof(Storage) === "undefined") {
        console.log('Sorry! No Web Storage support..');
    }

    $('.view-link').click(function(){
        $.ajax({
            url: $(this).attr('href')
        })
        .done(function(html_form) {
            $('#quick-look').html(html_form);
            $('#quick-look').modal('show');
        })
        .fail(function() {
            console.log("error");
        });
        return false;
    });

    $('#payButton').click(function(event) {
        $('#action').val('Pago');
    });

    $('#saveButton').click(function(event) {
        $('#action').val('Guardar');
    });

    $('.delete-link').click(function(e) {
        var id = $(this).attr('id');
        var res = id.split("_");

        if (typeof(res[0]) !== 'undefined') {
            $('#'+res[0]).val('');

            if (res[0] == 'processors') {
                change_processor('');
            } else if(res[0] == 'boards') {
                change_board('');
            } else
            {
            var duplicables = ["ram", "hdd", "accesorio",'video','tred','monitor'];
            if (duplicables.indexOf(id)) {
                $('.'+res[0]+'_field').not(':first').remove();
                $('.'+res[0]+'_precio').remove();
            }

                change_product('', res[0]);
            }
        }
        e.preventDefault();
    });

    $('.add-link').click(function(e) {
        var id =  $(this).attr('id');
        var res = id.split("_");
        if (typeof(res[0]) !== 'undefined') {
            arreglos = $('.'+res[0]+'_field').length;
            $('#'+res[0]).clone().appendTo('#'+res[0]+'_parent').attr({
                'id': res[0]+'_'+arreglos,
                'name': res[0]+'_'+arreglos
            });
            $('#'+res[0]+'_'+arreglos).addClass('second-select');

            html='<p id="'+res[0]+'_'+arreglos+'_precio'+'"  name="'+res[0]+'_'+arreglos+'_precio'+'" class="pull-left '+res[0]+'_precio"></p> '
            // $('#'+res[0]+'_sub').clone().appendTo('#'+res[0]+'_parent').attr({
            //     'id': res[0]+'_'+arreglos+'_precio',
            //     'name': res[0]+'_'+arreglos+'_precio'
            // });
            $('#'+res[0]+'_parent').append(html);

        }
        e.preventDefault();
    });
});

function add_array(build_obj, id) {
    product = {'id': build_obj.id, 'name': build_obj.title, 'qty': 1, 'price': build_obj.price, 'tax': build_obj.tax, 'nf_price': build_obj.nf_price};
    sessionStorage.setItem(id, JSON.stringify(product));
}

function add_armado(valor){
    sessionStorage.setItem('armado', valor);
    
    if(valor =="SI")
    {
        $("#costoArmado").removeAttr('hidden');
    }
    else
    {
        $("#costoArmado").attr('hidden', 'hidden');
    }
}

function change_processor(procesador) {
    if (procesador.length > 0) {
        myApp.showPleaseWait();
        $.ajax({
            url: '/api/carga_procesador/'+procesador,
            type: 'POST'
        })
        .done(function(result) {
            myApp.hidePleaseWait();

            $('#boards').html($("<option></option>").attr("value", "").text("Seleccione una Board / Tarjeta Madre"));
            $.each(result.product, function(key, value) {
                $('#boards').append($("<option></option>").attr("value", value.slug).text(value.title));
            });

            add_array(result.processor, 'processor');

            $('#processor_image').attr('src', '/images/products/'+result.processor.image);
            $('#procesador_precio').html(result.processor.price);
            $('#processor_link').removeClass('hidden');
            $('#processor_link').attr('href', '/quick-build/'+result.processor.slug);
            $('#processors_delete').removeClass('hidden');
        });
    } else {
        $('#boards').html($("<option></option>").attr("value", "").text("Seleccione una Board / Tarjeta Madre"));
        change_board('');
        sessionStorage.removeItem('processor');
        sessionStorage.removeItem('board');
        $('#processors_delete').addClass('hidden');
        $('#processor_link').addClass('hidden');
        $('#processor_image').attr('src', '');
        $('#procesador_precio').html('');
    }
}

function change_board(board) {
    if (board.length > 0) {
        myApp.showPleaseWait();
        $.ajax({
            url: '/api/carga_board/'+board,
            type: 'POST'
        })
        .done(function(result) {
            myApp.hidePleaseWait();
            $('#ram').html($("<option></option>").attr("value", "").text("Selecciona la Memoria RAM"));
            $.each(result.product, function(key, value) {
                $('#ram').append($("<option></option>").attr("value", value.slug).text(value.title));
            });

            add_array(result.board, 'board');

            $('#board_image').attr('src', '/images/products/'+result.board.image);
            $('#board_precio').html(result.board.price);
            $('#board_link').removeClass('hidden');
            $('#board_link').attr('href', '/quick-build/'+result.board.slug);
            $('#boards_delete').removeClass('hidden');

        });
    } else {
        $('#ram').html($("<option></option>").attr("value", "").text("Selecciona la Memoria RAM"));
        change_product('', 'ram');
        sessionStorage.removeItem('board');
        sessionStorage.removeItem('ram');
        $('#boards_delete').addClass('hidden');
        $('#board_link').addClass('hidden');
        $('#board_image').attr('src', '');
        $('#board_precio').html('');
    }
}

function change_product(slug, id) {
    if (slug.length > 0) {
        myApp.showPleaseWait();
        $.ajax({
            url: '/api/carga_ram/'+slug,
            type: 'POST'
        })
        .done(function(result) {
            myApp.hidePleaseWait();

            add_array(result.ram, id);
            $('#'+id+'_image').attr('src', '/images/products/'+result.ram.image);
            $('#'+id+'_precio').html(result.ram.price);
            $('#'+id+'_link').removeClass('hidden');
            $('#'+id+'_link').attr('href', '/quick-build/'+result.ram.slug);
            $('#'+id+'_delete').removeClass('hidden');
            var duplicables = ['ram', 'hdd', 'ssd', 'accesorio','tvideo','tred','monitor'];
            if (duplicables.includes(id)) {
                $('#'+id+'_add').removeClass('hidden');
            }
        });
    } else {
        sessionStorage.removeItem(id);
        $('#'+id+'_delete').addClass('hidden');
        $('#'+id+'_link').addClass('hidden');
        $('#'+id+'_image').attr('src', '');
        $('#'+id+'_precio').html('');
        var duplicables = ['ram', 'hdd', 'ssd', 'accesorio','tvideo','tred','monitor'];
        if (duplicables.includes(id)) {
            $('#'+id+'_add').addClass('hidden');
        }
    }
}

var myApp;
myApp = myApp || (function () {
    var pleaseWaitDiv = $('#pleaseWaitDialog');
    return {
        showPleaseWait: function() {
            pleaseWaitDiv.modal();
        },
        hidePleaseWait: function () {
            pleaseWaitDiv.modal('hide');
        },

    };
})();

$('#build_link').click(function(){
    pc_build = window.sessionStorage;

    $.post({
        url: $(this).attr('href'),
        data: {'_token': form_token, 'products': pc_build}
    })
    .done(function(html_form) {
        $('#quick-look').html(html_form);
        $('#quick-look').modal('show');
    })
    .fail(function() {
        console.log("error");
    });
    return false;
});
