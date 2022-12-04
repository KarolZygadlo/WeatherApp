<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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

    public function search(WeatherService $weatherService): View
    {
        $data = $weatherService->getWeatherByCity($_GET['city']);
        $user_bookmarks = json_decode(Cookie::get('bookmarks'));

        return view('cityReport', compact(['data', 'user_bookmarks']));
    }

    public function addBookmark(Request $request, CookieService $cookieService): RedirectResponse
    {
        $cookieService->setCookie($request);

        return back()->withInput();
    }

    public function removeBookmark(Request $request, CookieService $cookieService): RedirectResponse
    {
        $cookieService->removeFromCookie($request);

        return back()->withInput();
    }
}
