@vite(['resources/sass/app.scss', 'resources/js/app.js'])
<div class="container mt-4">
    <div class="dropdown ms-auto">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
            Language
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <li><a class="dropdown-item" href="{{ LaravelLocalization::getLocalizedURL('en') }}">@lang('main.lang_en')</a></li>
            <li><a class="dropdown-item" href="{{ LaravelLocalization::getLocalizedURL('uk') }}">@lang('main.lang_ua')</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="movie-details">
                <img src="{{ asset('storage/uploads/' . $movie->image) }}" class="img-fluid">
                <h2 class="mb-3">{{$movie->{'title_' . $locale} }}</h2>
                <p>{{ $movie->{'description_' . $locale} }}</p>
                <p>Released: {{ $movie->released_at }}</p>
                <p>Tags:
                    @foreach($movie->tags as $tag)
                        <span class="badge bg-primary">{{ $tag->{ 'title_' . $locale} }}</span>
                    @endforeach
                </p>
                @if(now()->between($movie->start_rental, $movie->end_rental))
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{ $movie->youtube_trailer_id }}" allowfullscreen></iframe>
                    </div>
                @endif

            </div>
        </div>
    </div>
</div>
