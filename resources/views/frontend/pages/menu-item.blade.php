<section class="fp__menu mt_95 xs_mt_65">
    <div class="container">
        <div class="row wow fadeInUp" data-wow-duration="1s">
            <div class="col-md-8 col-lg-7 col-xl-6 m-auto text-center">
                <div class="fp__section_heading mb_45">
                    <h4> Government Structure</h4>
                    <h2>Our Popular Head Officers</h2>
                    <span>
                        <img src="images/heading_shapes.png" alt="shapes" class="img-fluid w-100">
                    </span>
                    <p>Our Motto is Enriching Quality Service</p>
                </div>
            </div>
        </div>

        <div class="row wow fadeInUp" data-wow-duration="1s">
            <div class="col-12">
                <div class="menu_filter d-flex flex-wrap justify-content-center">
                    @foreach ($category1s as $category)
                    <button class="{{ $loop->index === 0 ? 'active button-click' : '' }}" data-filter=".{{ $category->slug }}">{{ $category->name }}</button>
                    @endforeach

                </div>
            </div>
        </div>

        <div class="row grid">
            @foreach ($category1s as $category)
                @php
                    $products = \App\Models\Product::where(['show_at_home' => 1, 'status' => 1, 'category_id' => $category->id])
                        ->orderBy('id', 'DESC')
                        ->take(8)
                        // ->withAvg('reviews', 'rating')
                        // ->withCount('reviews')/
                        ->get();

                @endphp

                @foreach ($products as $product)
                <div class="col-xl-3 col-sm-6 col-lg-4 {{ $category->slug }}">
                    <div class="fp__menu_item">
                        <div class="fp__menu_item_img">
                            <img src="{{ asset($product->thumb_image) }}" alt="{{ $product->name }}" class="img-fluid w-100">
                            <a class="category" href="#">{{ @$product->category->name }}</a>
                        </div>
                        <div class="fp__menu_item_text">
                            @if ($product->reviews_avg_rating)
                            <p class="rating">
                                @for ($i = 1; $i <= $product->reviews_avg_rating; $i++)
                                <i class="fas fa-star"></i>
                                @endfor

                                <span>{{ $product->reviews_count }}</span>
                            </p>
                            @endif
                            <a class="title" href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a>

                        </div>
                    </div>
                </div>
                @endforeach
            @endforeach

        </div>
    </div>
</section>
