<ul id="slide-out2" class="side-nav fixed admin-side-nav light-side-nav" style="left: 0px;">
    <!-- Side navigation links -->
    <ul class="collapsible collapsible-accordion">
        @foreach($categories as $category)
            @if(count($category->subcategories) > 1)
                <li>
                    <a href="#" class="collapsible-header waves-effect active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        {{$category->nombre}}<br>

                    </a>
                    <div class="descripcion-item-menu"><small>{{$category->descripcion}}</small></div>
                    <div class="collapsible-body">
                        <ul >
                            @foreach($category->subcategories as $subcategory)
                                <li><a class="lista-menu-principal" href="{{url('products/subcategory/?cat='.$subcategory->slug)}}">{{$subcategory->nombre}}</a></li>
                            @endforeach

                        </ul>
                    </div>
                </li>
            @else
                <li>
                    <a href="{{url('products/category?cat='.$category->slug)}}"class="lista-menu-principal">
                        {{$category->nombre}}<br>
                        <div class="descripcion-item-menu">{{$category->description}}</div>
                    </a>
                </li>
            @endif
        @endforeach
    </ul>
    <!--/. Side navigation links -->

</ul>
