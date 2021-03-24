<header class="bg-white shadow mb-4">
    <div class="flex flex-row items-center justify-between">
        <div class="flex flex-row items-center">
            <a href="{{ route('dashboard.index') }}" class="block p-4 hover:bg-gray-600 hover:text-white text">
                Dashboard
            </a>
            <a href="{{ route('listings.index') }}" class="block p-4 hover:bg-gray-600 hover:text-white text">
                Listings
            </a>
            {{-- <div x-data="{ open: false }">
                <a @mouseover="open = true" href="#"
                    class="block p-4 hover:bg-gray-600 hover:text-white text">Orders</a>
                <ul class="list-none absolute bg-white shadow rounded-b text-lg" x-show="open"
                    @mouseover.away="open = false" x-transition:enter="transition ease-out duration-75"
                    x-transition:enter-start="opacity-0 transform scale-90"
                    x-transition:enter-end="opacity-100 transform scale-100"
                    x-transition:leave="transition ease-in duration-75"
                    x-transition:leave-start="opacity-100 transform scale-100"
                    x-transition:leave-end="opacity-0 transform scale-90">
                    <li>
                        <a href="" class="p-4 hover:bg-gray-600 hover:text-white block">
                            Catch
                        </a>
                        <a href="" class="p-4 hover:bg-gray-600 hover:text-white block">
                            Ebay
                        </a>
                        <a href="" class="p-4 hover:bg-gray-600 hover:text-white block">
                            Kogan
                        </a>
                        <a href="" class="p-4 hover:bg-gray-600 hover:text-white block">
                            Shopify
                        </a>
                    </li>
                </ul>
            </div> --}}
            <div x-data="{ open: false }" class="relative">
                <a @mouseover="open = true" href="{{ route('products.index') }}"
                    class="block p-4 hover:bg-gray-600 hover:text-white text">
                    Products
                </a>
                <ul class="list-none absolute bg-white shadow rounded-b text-lg w-full" x-show="open"
                    @mouseover.away="open = false" x-transition:enter="transition ease-out duration-75"
                    x-transition:enter-start="opacity-0 transform scale-90"
                    x-transition:enter-end="opacity-100 transform scale-100"
                    x-transition:leave="transition ease-in duration-75"
                    x-transition:leave-start="opacity-100 transform scale-100"
                    x-transition:leave-end="opacity-0 transform scale-90">
                    <li>
                        <a href="{{ route('products.create') }}" class="p-4 hover:bg-gray-600 hover:text-white block">
                            Add
                        </a>
                        <a href="{{ route('products.import') }}" class="p-4 hover:bg-gray-600 hover:text-white block">
                            Import
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="flex flex-row items-center">
            <div class="p-4">
                <x-icons.moon />
            </div>
            <a href="" class="text p-4 block hover:bg-gray-600 hover:text-white">
                {{ auth()->user()->name }}
            </a>
        </div>

    </div>
</header>
