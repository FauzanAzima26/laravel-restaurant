<div class="tab-pane fade active show" id="menu-starters">

    <div class="tab-header text-center">
        <p>Menu</p>
        <h3>Starters</h3>
    </div>

    <div class="row gy-5">

        @foreach($menuStarters as $starter)
            <div class="col-lg-4 menu-item">
                <a href="{{asset('frontend')}}/img/menu/menu-item-1.png" class="glightbox"><img
                        src="{{Storage::url($starter->image)}}" class="menu-img img-fluid" alt=""></a>
                <h4>{{ $starter->name }}</h4>
                <p class="ingredients">
                    {{ $starter->description }}
                </p>
                <p class="price">
                    Rp.{{number_format($starter->price, 0, ',', '.')}}
                </p>
            </div>
        @endforeach
    </div>
</div>