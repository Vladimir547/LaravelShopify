@include('partials.header')
<section class="box">

    <div class="container">
        <div class="row">
                <div class="content">
                    <div class="left">
                        <div class="product_img">
                            <img class="img__item" src="{{ $product->image }}">
                        </div>
                        <div class="product_details">
                            <h4 class="title">{{ $product->name }}</h4>
                            <div class="discription">{{ $product->sku }}</div>
                            <p class="price">{{ $product->name }}</p>
                            <p class="shop">{{ $product->shops->shop }}</p>
                            <p class="other">{{ $product->shops->platform }}</p>
                        </div>
                    </div>

                    <div class="right">
                        <div class="product_description">
                            <h4>PRODUCT DESCRIPTION</h4>
                            {!! $product->description  !!}
                        </div>
                    </div>

                </div>
        </div>
    </div>
</section>

@include('partials.footer')
