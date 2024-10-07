<div class="tab-pane fade" id="menu-dinner">

    <div class="tab-header text-center">
        <p>Menu</p>
        <h3>Dinner</h3>
    </div>

    <div class="row gy-5">

        @foreach ($menuDinner as $dinner)

            <div class="col-lg-4 menu-item">
                <a href="{{asset('frontend')}}/img/menu/menu-item-1.png" class="glightbox"><img src="{{Storage::url($dinner->image)}}"
                        class="menu-img img-fluid" alt=""></a>
                <h4>{{$dinner->name}}</h4>
                <p class="ingredients">
                    {{$dinner->description}}
                </p>
                <p class="price">
                    Rp.{{number_format($dinner->price, 0, ',', '.')}}
                </p>
            </div>

        @endforeach


    </div>
</div>