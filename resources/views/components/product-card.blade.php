<div class="col mb-5">
    <div class="card h-100">
        <div class="product-image-wrapper">
            <img class="card-img-top"
                 src="{{ $image ?? asset('storage/' . $product->image ?? '') }}"
                 alt="{{ $product->name }}" />
        </div>
        <div class="card-body p-4">
            <div class="text-center">
                <h5 class="fw-bolder">{{ $product->name }}</h5>
                @if(isset($product->old_price) && $product->old_price > $product->price)
                    <span class="text-muted text-decoration-line-through">
                        ${{ number_format($product->old_price, 2) }}
                    </span>
                @endif
                ${{ number_format($product->price, 2) }}
                <p class="">{{ $product->category->name ?? '' }}</p>
            </div>
        </div>
        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
            <div class="text-center">
                <a class="btn btn-outline-dark mt-auto"
                   href="{{ route('products_show', $product->id) }}">
                    View Details
                </a>
            </div>
        </div>
    </div>
</div>
