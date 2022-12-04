<?php

namespace App\Http\Controllers;

use App\Http\Requests\WeatherRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Cookie;
use Illuminate\View\View;

use App\Services\WeatherService;
use App\Services\CookieService;


class WeatherController extends Controller
{
    public function index(): View
    {
        $user_bookmarks = json_decode(Cookie::get('bookmarks'));
        return view('home', compact(['user_bookmarks']));
    }

    public function search(WeatherRequest $request, WeatherService $weatherService): View
    {
        $data = $weatherService->getWeatherByCity($request->get('city'));
        $city = $request->get('city');
        $user_bookmarks = json_decode(Cookie::get('bookmarks'));

        return view('cityReport', compact(['data', 'city', 'user_bookmarks']));
    }

    public function addBookmark(WeatherRequest $request, CookieService $cookieService): RedirectResponse
    {
        $cookieService->setCookie($request);

        return back()->withInput();
    }

    public function removeBookmark(WeatherRequest $request, CookieService $cookieService): RedirectResponse
    {
        $cookieService->removeFromCookie($request);

        return back()->withInput();
    }
}
