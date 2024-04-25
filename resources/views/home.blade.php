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

        <h2>Фільми</h2>
        <div class="row">
            @foreach($movies as $movie)
            <div class="col-md-3">
                <div class="movie-card">
                    <a href="{{ LaravelLocalization::localizeUrl( '/movies/' . $movie->slug) }}">
                        <img src="{{ asset('storage/uploads/' . $movie->image) }}" class="img-fluid">
                        <h4 class="mt-2">{{ $movie->{'title_' . $locale} }}</h4>
                        <p>Year: 2023</p>
                    </a>

                </div>
            </div>
            @endforeach
        </div>
    </div>


