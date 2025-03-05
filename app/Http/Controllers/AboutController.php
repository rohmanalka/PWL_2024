<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function about() {
        return 'NIM: 2341760055 <br>
                Nama: Muhammad Rohman Al Kautsar';
    }
}
