<div class="pt-0 pb-5 md:pt-10 md:pb-5 mx-4">

    @if ($errors->any())
        <div class="text-red-500 mb-2">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('search') }}" method="GET">
        <div class="bg-white flex items-center rounded-lg shadow-md md:shadow-xl">
            <input autofocus type="search" name="city"
                   class="rounded-l-full w-full py-4 px-6 text-gray-700 leading-tight focus:outline-none"
                   id="search" type="text" placeholder="What city do you want to check ?">
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
