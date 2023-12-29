<?php

namespace App\Http\Controllers\Game;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class AccountOverviewController extends Controller
{
    public function viewAccountOverview(): View
    {
        return view('game.overview');
    }
}
