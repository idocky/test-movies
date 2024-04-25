<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Каст') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container mt-5">

                        <div class="mb-3">
                            <a href="{{ route('cast.create') }}" class="btn btn-success mb-3">Добавити</a>
                        </div>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Title (UK)</th>
                                <th>Title (EN)</th>
                                <th>Тип</th>
                                <th>Зображення</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cast as $person)
                                <tr>
                                    <td>{{ $person->title_uk }}</td>
                                    <td>{{ $person->title_en }}</td>
                                    <td>{{ $person->cast_type->type }}</td>
                                    <td><img src="{{ asset('storage/uploads/' . $person->image) }}" class="img-fluid" style="max-height: 50px;"></td>
                                    <td>
                                        <form action="{{ route('cast.destroy', $person->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
