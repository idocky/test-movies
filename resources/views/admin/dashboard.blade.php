<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Movies') }}
            </h2>
            <div>
                <button type="button" class="btn btn-primary"><a class="link-info link-light" href="{{url('admin/movies/create')}}">Create Movie</a></button>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Title (UK)</th>
                            <th>Hidden</th>
                            <th>Image</th>
                            <th>Tags</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($movies as $movie)
                            <tr>
                                <td>{{ $movie->title_uk }}</td>
                                <td>{{ Form::checkbox(
                                    'is_hidden',
                                    1,
                                    $movie->is_hidden == 1 ? true : false,
                                    ['id' => 'is_hidden_checkbox', 'disabled']
                                ) }}</td>
                                <td><img src="{{ asset('storage/uploads/' . $movie->image) }}" class="img-fluid" style="max-height: 50px;"></td>
                                <td>
                                    @foreach($movie->tags as $tag)
                                        <span class="badge bg-secondary">{{ $tag->title_uk }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    <a href="{{ route('movies.edit', $movie->id) }}" class="btn btn-primary">Edit</a>
                                    <form action="{{ route('movies.destroy', $movie->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                    <div class="pagination">
                        {{ $movies->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
