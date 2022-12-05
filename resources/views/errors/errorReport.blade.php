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

    <h1 class="text-6xl lg:text-4xl xl:text-4xl text-black-200 font-bold mt-12 text-center">{{ $message }}</h1>

    <a href="{{ route('home') }}">
        <button
            class="group relative h-12 w-48 overflow-hidden rounded-lg bg-white text-lg shadow mt-5"
            title="Return to home page">
            <div
                class="absolute inset-0 w-3 bg-gray-400 transition-all duration-[250ms] ease-out group-hover:w-full"></div>
            <span class="relative text-black group-hover:text-white">Go back</span>
        </button>
    </a>

</div>
</body>
</html>
