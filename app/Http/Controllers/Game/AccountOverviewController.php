<?php

namespace App\Http\Controllers\Game;

use App\Data\CharacterSettings;
use App\Http\Controllers\Controller;
use App\Models\Game\Character;
use Illuminate\View\View;

class AccountOverviewController extends Controller
{
    public function viewAccountOverview(): View
    {
        return view('game.overview');
    }

}
