<button class="flex flex-row items-center space-x-4 self-end border bg-white border-gray-300 px-4 py-2 rounded-md focus:ring ring-gray-300 focus:border-blue-300 transition ease-in-out duration-300 focus:z-10 focus:outline-none">
    <div>
        {{ $label ?? 'SAVE' }}
    </div>
    {{$slot}}
</button>
