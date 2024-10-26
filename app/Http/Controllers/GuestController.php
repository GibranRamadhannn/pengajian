<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class GuestController extends Controller
{
    public function index()
    {
        Log::info('Home function called');
        return view('guest.guest-home');
    }
}
