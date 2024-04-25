<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Создать фильм') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('movies.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col">
                                <label for="title_uk" class="form-label">Title (UK)</label>
                                <input type="text" class="form-control" id="title_uk" name="title_uk">
                            </div>
                            <div class="col">
                                <label for="title_en" class="form-label">Title (EN)</label>
                                <input type="text" class="form-control" id="title_en" name="title_en">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="description_uk" class="form-label">Description (UK)</label>
                                <textarea class="form-control" id="description_uk" name="description_uk" rows="3"></textarea>
                            </div>
                            <div class="col">
                                <label for="description_en" class="form-label">Description (EN)</label>
                                <textarea class="form-control" id="description_en" name="description_en" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="is_hidden" name="is_hidden" value="0">
                                <label class="form-check-label" for="is_hidden">Is Hidden</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>
                        <div class="mb-3">
                            <label for="youtube_trailer_id" class="form-label">YouTube Trailer ID</label>
                            <input type="text" class="form-control" id="youtube_trailer_id" name="youtube_trailer_id">
                        </div>
                        <div class="mb-3">
                            <label for="released_at" class="form-label">Released At (Year)</label>
                            <input type="number" class="form-control" id="released_at" name="released_at" min="1900" max="2024" step="1" />
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="start_rental" class="form-label">Start Rental</label>
                                <input type="date" class="form-control" id="start_rental" name="start_rental">
                            </div>
                            <div class="col">
                                <label for="end_rental" class="form-label">End Rental</label>
                                <input type="date" class="form-control" id="end_rental" name="end_rental">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="tags" class="form-label">Tags</label>
                            <select multiple class="form-select" id="tags" name="tags[]">
                                @foreach($tags as $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->title_uk }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="cast" class="form-label">Cast</label>
                            <select multiple class="form-select" id="cast" name="cast[]">
                                @foreach($cast as $person)
                                    <option value="{{ $person->id }}">{{ $person->title_uk }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="screenshots" class="form-label">Screenshots</label>
                            <input type="file" class="form-control" id="screenshots" name="screenshots[]" multiple>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script>


        $(document).ready(function(){
            $('#is_hidden').change(function(){
                if($(this).is(':checked')){
                    $(this).val('1');
                } else {
                    $(this).val('0');
                }
            });
        });
    </script>

</x-app-layout>
