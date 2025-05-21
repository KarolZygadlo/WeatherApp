<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\WeatherRequest;
use App\Services\CookieService;
use App\Services\WeatherService;
use Illuminate\Http\RedirectResponse;

use Illuminate\Support\Facades\Cookie;
use Illuminate\View\View;

class WeatherController extends Controller
{
    public function index(): View
    {
        $user_bookmarks = json_decode(Cookie::get("bookmarks") ?: "[]");
        return view("home", compact(["user_bookmarks"]));
    }

    public function search(WeatherRequest $request, WeatherService $weatherService): View
    {
        $city = $request->get("city");
        $data = $weatherService->getWeatherByCity($city);
        $user_bookmarks = json_decode(Cookie::get("bookmarks") ?: "[]");

        return view("cityReport", compact(["data", "city", "user_bookmarks"]));
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
