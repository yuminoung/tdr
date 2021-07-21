<header class="bg-white shadow mb-4">
    <div class="flex flex-row items-center justify-between mx-4">
        <div class="flex flex-row items-center">
            <a href="{{ route('dashboard.index') }}" class="block p-4 focus-link hover:bg-yellow-200 text">
                Dashboard
            </a>
            <a href="{{ route('listings.index') }}" class="block p-4 hover:bg-yellow-200 text">
                Listings
            </a>
            <a href="{{ route('orders.index') }}" class="block p-4 hover:bg-yellow-200 text">
                Orders
            </a>
            <div x-data="{ open: false }" class="relative">
                <a @mouseover="open = true" href="{{ route('products.index') }}"
                    class="block p-4 hover:bg-yellow-200 text">
                    Products
                </a>
                <ul class="list-none absolute w-48" x-show.transition="open" @mouseover.away="open = false">
                    <li class="p-1"></li>
                    <li class="bg-yellow-100">
                        <a href="{{ route('products.create') }}"
                            class="p-4 hover:bg-yellow-200 flex flex-row space-x-4 items-center">
                            <x-icons.add />
                            <div>
                                Create
                            </div>
                        </a>
                    </li>
                    <li class="bg-yellow-100">
                        <a href="{{ route('products.import') }}"
                            class="p-4 hover:bg-yellow-200 flex flex-row space-x-4 items-center">
                            <x-icons.upload />
                            <div>
                                Upload
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div x-data="{ open: false }" class="relative">
            <div @mouseover="open = true" class="block p-4 hover:bg-yellow-200 cursor-pointer">
                {{ auth()->user()->name }}
            </div>
            <ul class="list-none absolute w-48 right-0" x-show.transition="open" @mouseover.away="open = false">
                <li class="p-1"></li>
                <li class="bg-yellow-100">
                    <a href="{{ route('products.create') }}"
                        class="p-4 hover:bg-yellow-200 flex flex-row space-x-4 items-center">
                        <x-icons.user />
                        <div>
                            Profile
                        </div>
                    </a>
                </li>
                <li class="bg-yellow-100 cursor-pointer" onclick="event.preventDefault();
                document.getElementById('logout').submit();">
                    <form action="{{ route('logout') }}" id="logout" method="POST"
                        class="p-4 hover:bg-yellow-200 flex flex-row space-x-4 items-center">
                        <x-icons.logout />
                        <div>
                            Logout
                        </div>
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
</header>
