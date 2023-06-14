<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function showIndex() {

        return Auth::check() ? view('index') : redirect('/login');

    }
}
