{!!Form::open(['url'=>'search_product', 'method'=>'GET', 'id' => 'searchPForm'])!!}
<input type="search" id="product_search" placeholder="Buscar..." name="product_search"/>
<input type="hidden" id="product_search_slug" name="product_search_slug"/>
<button class="icon"><i class="fa fa-search"></i></button>
{!!Form::close()!!}
