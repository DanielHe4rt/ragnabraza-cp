<?php

namespace App\Http\Controllers\Game;

use App\Data\CharacterSettings;
use App\Http\Controllers\Controller;
use App\Http\Requests\Game\Character\UpdateSettingsRequest;
use App\Models\Game\Character;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CharacterController extends Controller
{
    public function postCharacterSettings(UpdateSettingsRequest $request, Character $character): RedirectResponse
    {
        $character->settings = CharacterSettings::fromRequest($request->validated());
        $character->save();
        return redirect()->route('game.character.settings', $character);
    }
}
