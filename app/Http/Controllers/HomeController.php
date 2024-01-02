<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{

    public function index()
    {
        if (Auth::check()) {
            $role = Auth::user()->role;
            if ($role == 'association') {
                if (Auth::user()->isNew == true) {
                    return Redirect::to('/association/info');
                }
                return Redirect::to('/association/dashboard');
            } else {
                if (Auth::user()->isNew == true) {
                    return Redirect::to('/client/info');
                }
                return Redirect::to('/');
            }
        }
    }
}
