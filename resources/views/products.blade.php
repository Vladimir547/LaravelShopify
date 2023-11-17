@include('partials.header')
<div class="container">
    <div class="row">
        @foreach ($products as $product)
            <div class="card col-lg-4 col-md-6 col-12" >
                <img src="{{ $product->image }}" class="card-img-top" alt="{{ $product->name }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <a href='{{ asset("/product/{$product->id}") }}' class="btn btn-primary">Открыть</a>
                </div>
            </div>
        @endforeach

        {{ $products->links() }}
    </div>
</div>
@include('partials.footer')

