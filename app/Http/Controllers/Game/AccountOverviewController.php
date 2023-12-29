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

    public function viewCharacterSettings(int $characterId): View
    {
        $char = Character::query()->where([
            ['account_id', '=', auth()->user()->getKey()],
            ['char_id', '=', $characterId],
        ])->firstOrFail();

        return view('game.characters.settings', ['character' => $char]);
    }
}
