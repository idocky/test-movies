<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Создать тег') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('tags.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="title_uk" class="form-label">Title (UK)</label>
                            <input type="text" class="form-control" id="title_uk" name="title_uk">
                        </div>
                        <div class="mb-3">
                            <label for="title_en" class="form-label">Title (EN)</label>
                            <input type="text" class="form-control" id="title_en" name="title_en">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
