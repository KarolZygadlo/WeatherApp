<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="title" content="Weather Report Application">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Weather Report Application</title>
</head>
<body class="bg-gray-100">
<div class="container w-full mx-auto flex flex-col min-h-screen ">

    <div class="flex-grow">

        <div class="pt-0 pb-5 md:pt-10 md:pb-5 mx-4">
            <form action="{{ route('search') }}" method="GET">
                <div class="bg-white flex items-center rounded-lg shadow-md md:shadow-xl">
                    <input autofocus type="search" name="city"
                           class="rounded-l-full w-full py-4 px-6 text-gray-700 leading-tight focus:outline-none"
                           id="search" type="text" placeholder="Search ...">
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

        <div class="flex items-center justify-center h-full">

            <div class="bg-white shadow-2xl p-6 rounded-2xl border-2 border-gray-50">
                <div class="flex flex-col">
                    <div>
                        <h2 class="font-bold text-gray-600 text-center">{{  $_GET['city']  }}</h2>
                    </div>
                    <div class="my-6">
                        <div class="flex flex-row space-x-4 items-center text-center">
                            <div id="temp">
                                <h4 class="text-4xl">{{ $data->temperature }}&deg;C</h4>
                                <p class="text-base text-gray-500">Feels like {{ $data->feelsLike }}&deg;C</p>
                                <p class="text-base text-gray-500">Wind speed {{ $data->windspeed }}km/h</p>
                                <p class="text-base text-gray-500">Pressure {{ $data->pressure }}&#13169</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>


    <div class="flex pb-5 px-3 justify-center m-auto text-gray-800 text-sm flex-col
           md:flex-row max-w-6xl">
        <div class="flex justify-center mt-4">
            <a href="https://github.com/KarolZygadlo" class="w-6 mx-1" target="_blank">
                <svg class="fill-current cursor-pointer text-gray-500 hover:text-black" width="100%" height="100%"
                     viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                </svg>
            </a>
            <a href="https://www.linkedin.com/in/karol-zygad%C5%82o-1075811a0/" class="w-6 mx-1" target="_blank">
                <svg class="fill-current cursor-pointer text-gray-500 hover:text-blue-500" width="100%"
                     height="100%" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg"
                     style="fill-rule: evenodd; clip-rule: evenodd; stroke-linejoin: round; stroke-miterlimit: 2;">
                    <path id="Shape" d="M7.3,0.9c1.5,-0.6 3.1,-0.9 4.7,-0.9c1.6,0 3.2,0.3 4.7,0.9c1.5,0.6 2.8,1.5
                       3.8,2.6c1,1.1 1.9,2.3 2.6,3.8c0.7,1.5 0.9,3 0.9,4.7c0,1.7 -0.3,3.2
                       -0.9,4.7c-0.6,1.5 -1.5,2.8 -2.6,3.8c-1.1,1 -2.3,1.9 -3.8,2.6c-1.5,0.7
                       -3.1,0.9 -4.7,0.9c-1.6,0 -3.2,-0.3 -4.7,-0.9c-1.5,-0.6 -2.8,-1.5
                       -3.8,-2.6c-1,-1.1 -1.9,-2.3 -2.6,-3.8c-0.7,-1.5 -0.9,-3.1 -0.9,-4.7c0,-1.6
                       0.3,-3.2 0.9,-4.7c0.6,-1.5 1.5,-2.8 2.6,-3.8c1.1,-1 2.3,-1.9
                       3.8,-2.6Zm-0.3,7.1c0.6,0 1.1,-0.2 1.5,-0.5c0.4,-0.3 0.5,-0.8 0.5,-1.3c0,-0.5
                       -0.2,-0.9 -0.6,-1.2c-0.4,-0.3 -0.8,-0.5 -1.4,-0.5c-0.6,0 -1.1,0.2
                       -1.4,0.5c-0.3,0.3 -0.6,0.7 -0.6,1.2c0,0.5 0.2,0.9 0.5,1.3c0.3,0.4 0.9,0.5
                       1.5,0.5Zm1.5,10l0,-8.5l-3,0l0,8.5l3,0Zm11,0l0,-4.5c0,-1.4 -0.3,-2.5
                       -0.9,-3.3c-0.6,-0.8 -1.5,-1.2 -2.6,-1.2c-0.6,0 -1.1,0.2 -1.5,0.5c-0.4,0.3
                       -0.8,0.8 -0.9,1.3l-0.1,-1.3l-3,0l0.1,2l0,6.5l3,0l0,-4.5c0,-0.6 0.1,-1.1
                       0.4,-1.5c0.3,-0.4 0.6,-0.5 1.1,-0.5c0.5,0 0.9,0.2 1.1,0.5c0.2,0.3 0.4,0.8
                       0.4,1.5l0,4.5l2.9,0Z"></path>
                </svg>
            </a>
        </div>
    </div>
</div>
</body>
</html>
