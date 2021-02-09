<header class="bg-gray-200 mb-8">
    <div class="flex flex-row h-24 items-center justify-between container mx-auto">
        <div class="flex flex-row items-center">
            <div class="text font-bold text-2xl block px-4 py-2 ml-4 mr-8 border-4 border-gray-900">
                TDR
            </div>
            <a href="{{ route('dashboard.index') }}" class="block font-bold text px-4 py-2">
                Dashboard
            </a>
            <div x-data="{ open: false }">
                <a @mouseover="open = true" href="#" class="block font-bold text px-4 py-2">Orders</a>
                <ul class="list-none ml-4 absolute bg-white shadow rounded-b text-lg" x-show="open"
                    @mouseover.away="open = false" x-transition:enter="transition ease-out duration-75"
                    x-transition:enter-start="opacity-0 transform scale-90"
                    x-transition:enter-end="opacity-100 transform scale-100"
                    x-transition:leave="transition ease-in duration-75"
                    x-transition:leave-start="opacity-100 transform scale-100"
                    x-transition:leave-end="opacity-0 transform scale-90">
                    <li>
                        <a href="" class="px-4 py-2 block hover:bg-gray-100">
                            Catch
                        </a>
                        <a href="" class="px-4 py-2 block hover:bg-gray-100">
                            Ebay
                        </a>
                        <a href="" class="px-4 py-2 block hover:bg-gray-100">
                            Kogan
                        </a>
                        <a href="" class="px-4 py-2 block hover:bg-gray-100">
                            Shopify
                        </a>
                    </li>
                </ul>
            </div>
            <a href="#" class="block font-bold text px-4 py-2">
                Listings
            </a>
            <a href="{{ route('products.index') }}" class="block font-bold text px-4 py-2">
                Products
            </a>
        </div>
        <div class=" text font-bold block px-4 py-2">
            13 Jan 2021
        </div>

    </div>

</header>
