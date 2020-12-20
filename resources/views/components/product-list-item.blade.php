<a href="{{ route('products.show', $product) }}"
    class="border border-gray-300 px-4 py-2 -mb-px rounded-t-md focus:ring ring-gray-300 focus:border-blue-300 transition ease-in-out duration-300 focus:z-10 flex flex-row justify-between items-center"
>
    <div>
        {{$product->sku}}
    </div>
    <div class="text-sm">
        @if($product->quantity === 0)
        Out of stock
        @endif
    </div>
</a>
