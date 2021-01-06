<div class="flex flex-col space-y-2">
    <label for="{{ $name }}" class="text-sm text-gray-700">{{$placeholder}}</label>
    <textarea id="{{ $name }}" name="{{ $name }}" placeholder="{{ $placeholder }}" class="inline-block px-4 py-2 shadow-sm border-gray-300 border rounded-md bg-gray-100 focus:ring ring-gray-300 focus:border-blue-300 transition ease-in-out duration-300 focus:z-10 focus:outline-none w-full h-64">{{ $value ?? '' }}</textarea>
    <div class="p-4 bg-gray-100 rounded-md border-gray-300 border">{!! $value ?? '' !!}</div>
</div>
