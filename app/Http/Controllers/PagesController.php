<?php

namespace App\Http\Controllers;

use App\Mail\TestEmail;
use Illuminate\Support\Facades\Mail;

class PagesController extends Controller
{
    public function index() {
        return view('pages.index');
    }
}
