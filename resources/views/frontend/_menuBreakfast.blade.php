<div class="tab-pane fade" id="menu-breakfast">

    <div class="tab-header text-center">
        <p>Menu</p>
        <h3>Breakfast</h3>
    </div>

    <div class="row gy-5">

        @foreach($menuBreakfast as $breakfast)


            <div class="col-lg-4 menu-item">
                <a href="{{asset('frontend')}}/img/menu/menu-item-1.png" class="glightbox"><img
                        src="{{Storage::url($breakfast->image)}}" class="menu-img img-fluid" alt=""></a>
                <h4>{{$breakfast->name}}</h4>
                <p class="ingredients">
                    {{$breakfast->description}}
                </p>
                <p class="price">
                    Rp.{{number_format($breakfast->price, 0, ',', '.')}}
                </p>
            </div>

        @endforeach
    </div>
</div>