<?php

namespace App\Http\Controllers\Info;

use App\Http\Controllers\Controller;
use App\Models\Game\Character;
use Illuminate\View\View;

class PlayersOnlineController extends Controller
{
    public function viewPlayersOnline(): View
    {

        $charactersOnline = Character::query()
            ->where('online', '=', true)
            ->select(['name', 'class', 'base_level', 'job_level', 'last_map', 'settings'])
            ->paginate();


        return view('game.online', [
            'charactersOnline' => $charactersOnline
        ]);
    }
}
