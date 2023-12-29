<?php

namespace App\Http\Controllers\Game;

use App\Data\CharacterSettings;
use App\Http\Controllers\Controller;
use App\Http\Requests\Game\Character\UpdateSettingsRequest;
use App\Models\Game\Character;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CharacterController extends Controller
{
    public function viewCharacterSettings(int $characterId): View
    {
        $char = Character::query()->where([
            ['account_id', '=', auth()->user()->getKey()],
            ['char_id', '=', $characterId],
        ])->firstOrFail();

        return view('game.characters.settings', ['character' => $char]);
    }

    public function postCharacterSettings(UpdateSettingsRequest $request, Character $character): RedirectResponse
    {
        $character->settings = CharacterSettings::fromRequest($request->validated());
        $character->save();
        return redirect()->route('game.character.settings', $character);
    }
}
