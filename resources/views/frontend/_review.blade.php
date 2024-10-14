<section id="review" class="testimonials section light-background">


    <div class="container section-title" data-aos="fade-up">

        <p>What Are They <span class="description-title">Saying About Us</span></p>
    </div>

    <div class="container" data-aos="fade-up">

        <div class="swiper init-swiper">
            <script type="application/json" class="swiper-config">
{
  "loop": true,
  "speed": 600,
  "autoplay": {
    "delay": 5000
  },
  "slidesPerView": "auto",
  "pagination": {
    "el": ".swiper-pagination",
    "type": "bullets",
    "clickable": true
  }
}
</script>
            <div class="swiper-wrapper">
                @foreach ($reviews as $review)
                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <div class="row gy-4 justify-content-center">

                                <div class="col-lg-6">

                                    <div class="testimonial-content">
                                        <p>
                                            <i class="bi bi-quote quote-icon-left"></i>
                                            <span class="d-block text-break">{{$review->comment}}</span>
                                            <i class="bi bi-quote quote-icon-right"></i>
                                        </p>
                                        <h3>{{$review->transaction->name}}</h3>
                                        <div class="stars">
                                            @for ($i = 0; $i < 5; $i++)
                                                @if ($i < $review->rate)
                                                    <i class="bi bi-star-fill"></i>
                                                @else
                                                    <i class="bi bi-star"></i>
                                                @endif
                                            @endfor
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach

            </div>
            <div class="swiper-pagination"></div>
        </div>

    </div>

</section>