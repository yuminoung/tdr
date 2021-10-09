@extends('layouts.app')

@section('content')

<x-page-header title="ISSUES/CREATE"></x-page-header>
<div class="w-1/2 flex flex-col space-y-4">
    <form action="{{ route('issues.store') }}" enctype="multipart/form-data" method="POST" class="flex flex-col space-y-4">
        <div class="flex flex-col space-y-2">
            <input type="text" name="sku" class="w-full p-4 shadow rounded focus-animation" value="{{ old('sku') }}" placeholder="SKU">
            @error('sku')
                <p class="text-sm text-red-700">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex flex-col space-y-2">
            <textarea name="issue" class="w-full p-4 shadow rounded focus-animation" placeholder="Issue">{{ old('issue') }}</textarea>
            @error('issue')
                <p class="text-sm text-red-700">{{ $message }}</p>
            @enderror
        </div>
        <input name="order_id" type="text" class="w-full p-4 shadow rounded focus-animation" placeholder="Order ID (optional)">
        <input type="text" class="w-full p-4 shadow rounded focus-animation" name="name" placeholder="Name (optional)">
        <input name="phone" type="text" class="w-full p-4 shadow rounded focus-animation" placeholder="Phone (optional)">
        <input type="file" id="images" name="images[]" class="filepond shadow rounded-lg">
        <button class="p-4 shadow rounded bg-white focus-animation">Create</button>
        @csrf
    </form>
</div>
</div>
@endsection

@push('scripts')
<script>
    const inputElement = document.querySelector('input[type="file"]');
    FilePond.registerPlugin(FilePondPluginFileValidateType);
    FilePond.create(inputElement);
    FilePond.setOptions({
        acceptedFileTypes: ['image/png', 'image/jpeg'],
        allowMultiple: true,
        maxParallelUploads: 1,
        acceptedFileTypes: ['image/png', 'image/jpeg'],
        maxFiles: 5,
        maxFileSize: '10MB',
        server: {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            process: '/issues/filepond/process',
            revert: '/issues/filepond/revert',
            // restore: '/upload/restore/'
        },
    });
</script>
@endpush
