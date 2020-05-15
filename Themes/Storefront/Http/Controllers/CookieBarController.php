<?php

namespace Themes\Storefront\Http\Controllers;

use Illuminate\Routing\Controller;

class CookieBarController extends Controller
{
    public function accepted()
    {
        cookie()->queue('cookie_bar_accepted', true);
    }
}
