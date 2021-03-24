<form action="{{ route('products.index') }}" method="GET" class="flex flex-row space-x-4 items-center">
    {{-- <x-button>
        <x-icons.exclamation-circle />
        <span class="text-sm">0</span>
    </x-button> --}}
    <select name="filter"
        class="appearance-none p-2 shadow border bg-white focus:border-gray-600 transition ease-in-out duration-300 focus:outline-none w-32">
        <option value="">Categories</option>
        <option value="ta">TA</option>
        <option value="tb">TB</option>
        <option value="tc">TC</option>
        <option value="td">TD</option>
        <option value="te">TE</option>
        <option value="tf">TF</option>
        <option value="tg">TG</option>
        <option value="th">TH</option>
        <option value="tw">TW - TOOLS</option>
    </select>
    <input type="text" name="search"
        class="w-32 p-2 shadow border bg-white focus:border-gray-600 transition ease-in-out duration-300 focus:outline-none"
        autocomplete="off" placeholder="Search SKU">
    <x-button>
        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M8 16l2.879-2.879m0 0a3 3 0 104.243-4.242 3 3 0 00-4.243 4.242zM21 12a9 9 0 11-18 0 9 9 0 0118 0z">
            </path>
        </svg>
    </x-button>
    @csrf
</form>
