<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function lang($locale)
    {
        app()->setlocale($locale);
        session()->put('locale', $locale);
        return redirect()->back();
    }
}
