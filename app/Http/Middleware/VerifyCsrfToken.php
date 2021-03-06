<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * Indicates whether the XSRF-TOKEN cookie should be set on the response.
     *
     * @var bool
     */
    protected $addHttpCookie = true;

    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'reg',
        'rest',
        'checkmaile',
        'auth',
        'LoginAuth',
        'Wordserch',
        'Condiserch',
        'Detail',
        'Good',
        'Bad',
        'Mypage',
        'PasChange',
        'UserUpdate',
        'DeleteUser',
        'Content',
        'GetProperty',
        'GpsSerch',
        'NewArrivals',
        'Favorites',
        'GameRecord',
        'Buy',
        'BuySearch',
        'PurchaseSearch',
        'Pasforgotten',
        'Forgetchange'
    ];
}
