@extends('layouts.layout')

@section('main')

    <div class="flex min-h-screen w-full items-center justify-center bg-gray-100 flex-col">

        <x-header />

        <x-search />

        @if($user_bookmarks)

            <h1 class="text-6xl lg:text-7xl xl:text-4xl text-black-200 font-bold mt-12 text-center">Bookmarked cities
                for quick access</h1>

            <div class="flex flex-row">

                @foreach($user_bookmarks as $bookmark)

                    <div class="flex items-center justify-center h-full pt-0 pb-5 md:pt-10 md:pb-5 mr-5">

                        <div class="bg-white shadow-2xl p-6 rounded-2xl border-2 border-gray-50">
                            <div class="flex flex-col">
                                <div>
                                    <h2 class="font-bold text-gray-600 text-center text-4xl">{{  $bookmark  }}</h2>
                                </div>
                                <form action="{{ route('search') }}" method="GET">
                                    <input name="city" type="hidden" value="{{  $bookmark  }}">
                                    <button
                                        class="group relative h-12 w-48 overflow-hidden rounded-lg bg-white text-lg shadow mt-5"
                                        title="Check the weather for the bookmarked city">
                                        <div
                                            class="absolute inset-0 w-3 bg-gray-400 transition-all duration-[250ms] ease-out group-hover:w-full"></div>
                                        <span class="relative text-black group-hover:text-white">Check weather</span>
                                    </button>

                                </form>
                            </div>
                        </div>

                    </div>

                @endforeach

            </div>

    @endif

@endsection
