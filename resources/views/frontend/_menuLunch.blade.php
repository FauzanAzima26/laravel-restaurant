<div class="tab-pane fade" id="menu-lunch">

    <div class="tab-header text-center">
        <p>Menu</p>
        <h3>Lunch</h3>
    </div>

    <div class="row gy-5">

    @foreach ($menuLunch as $lunch )

    
    <div class="col-lg-4 menu-item">
            <a href="{{asset('frontend')}}/img/menu/menu-item-1.png" class="glightbox"><img
                    src="{{Storage::url($lunch->image)}}" class="menu-img img-fluid" alt=""></a>
            <h4>{{$lunch->name}}</h4>
            <p class="ingredients">
                {{$lunch->description}}
            </p>
            <p class="price">
                Rp.{{number_format($lunch->price, 0, ',', '.')}}
            </p>
        </div>
    
    @endforeach

    </div>
</div>