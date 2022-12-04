<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class CookieService
{
    public function setCookie(Request $request): Void
    {
        if($request->cookie('bookmarks') !== null) {
            $bookmarks = json_decode($request->cookie('bookmarks'));
            if (!in_array($request->city, $bookmarks)) {
                $bookmarks[] = $request->city;
            }
        } else {
            $bookmarks = array(
                0 => $request->city
            );
        }

        Cookie::queue('bookmarks', json_encode($bookmarks), time()+3600);
    }

    public function removeFromCookie(Request $request): Void
    {
        $bookmarks = array_values(array_filter(json_decode($request->cookie('bookmarks')), fn ($m) => $m != $request->city));
        Cookie::queue('bookmarks', json_encode($bookmarks), time()+3600);
    }
}
