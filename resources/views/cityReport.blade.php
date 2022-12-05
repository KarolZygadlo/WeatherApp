@extends('layouts.layout')

@section('main')

<div class="flex min-h-screen w-full items-center justify-center bg-gray-100 flex-col">

    <x-header />

    <x-search />

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

        @if($user_bookmarks ?? null && in_array($city, $user_bookmarks))

            <form action="{{ route('remove-from-bookmark') }}" method="POST">
                @csrf
                <input name="city" type="hidden" value="{{  $city  }}">
                <button class="group relative h-12 w-48 overflow-hidden rounded-lg bg-white text-lg shadow"
                        title="Remove from bookmark">
                    <div
                        class="absolute inset-0 w-3 bg-gray-400 transition-all duration-[250ms] ease-out group-hover:w-full"></div>
                    <span class="relative text-black group-hover:text-white">Remove from bookmark</span>
                </button>

            </form>

        @else

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

@endsection
