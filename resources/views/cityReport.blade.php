<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="title" content="Weather Report Application">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Weather Report Application</title>
</head>
<body>
<div class="flex min-h-screen w-full items-center justify-center bg-gray-100 flex-col">

    <h1 class="text-6xl lg:text-7xl xl:text-8xl text-black-200 font-bold mt-12 text-center">Weather Report
        Application</h1>

    <div class="pt-0 pb-5 md:pt-10 md:pb-5 mx-4">
        <form action="{{ route('search') }}" method="GET">
            <div class="bg-white flex items-center rounded-lg shadow-md md:shadow-xl">
                <input autofocus type="search" name="city"
                       class="rounded-l-full w-full py-4 px-6 text-gray-700 leading-tight focus:outline-none"
                       id="search" type="text" placeholder="Search ..." required>
                <div class="p-2 md:p-4">
                    <button
                        class="rounded-full focus:outline-none w-10 h-12 md:w-10 md:h-12 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                             class="bi bi-search" viewBox="0 0 16 16">
                            <path
                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg>
                    </button>
                </div>
            </div>
        </form>
    </div>

    <div class="flex items-center justify-center h-full pt-0 pb-5 md:pt-10 md:pb-5">

        <div class="bg-white shadow-2xl p-6 rounded-2xl border-2 border-gray-50">
            <div class="flex flex-col">
                <div>
                    <h2 class="font-bold text-gray-600 text-center text-4xl">{{ $city }}</h2>
                </div>
                <div class="my-6">
                    <div class="flex flex-row space-x-4 items-center text-center">
                        <div id="temp">
                            <h4 class="text-2xl">{{ $data->temperature }}&deg;C</h4>
                            <p class="text-base text-gray-500">Feels like {{ $data->feelsLike }}&deg;C</p>
                            <p class="text-base text-gray-500">Wind speed {{ $data->windspeed }}km/h</p>
                            <p class="text-base text-gray-500">Pressure {{ $data->pressure }}&#13169</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="flex items-center justify-center h-full pt-0 pb-5 md:pt-10 md:pb-5">

        @if($user_bookmarks && !in_array($city, $user_bookmarks))

            <form action="{{ route('add-to-bookmark') }}" method="POST">
                @csrf
                <input name="city" type="hidden" value="{{  $city  }}">
                <button class="group relative h-12 w-48 overflow-hidden rounded-lg bg-white text-lg shadow"
                        title="Add to bookmark and return to home page">
                    <div
                        class="absolute inset-0 w-3 bg-gray-400 transition-all duration-[250ms] ease-out group-hover:w-full"></div>
                    <span class="relative text-black group-hover:text-white">Bookmark</span>
                </button>

            </form>

        @else

            <form action="{{ route('remove-from-bookmark') }}" method="POST">
                @csrf
                <input name="city" type="hidden" value="{{  $city  }}">
                <button class="group relative h-12 w-48 overflow-hidden rounded-lg bg-white text-lg shadow"
                        title="Add to bookmark and return to home page">
                    <div
                        class="absolute inset-0 w-3 bg-gray-400 transition-all duration-[250ms] ease-out group-hover:w-full"></div>
                    <span class="relative text-black group-hover:text-white">Remove from bookmark</span>
                </button>

            </form>

        @endif

        <a href="{{ route('home') }}">
            <button
                class="group relative h-12 w-48 overflow-hidden rounded-lg bg-white text-lg shadow ml-5"
                title="Return to home page">
                <div
                    class="absolute inset-0 w-3 bg-gray-400 transition-all duration-[250ms] ease-out group-hover:w-full"></div>
                <span class="relative text-black group-hover:text-white">Go back</span>
            </button>
        </a>

    </div>

</div>

</body>
</html>
