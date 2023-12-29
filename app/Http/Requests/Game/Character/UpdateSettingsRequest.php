<?php

namespace App\Http\Requests\Game\Character;

use App\Data\CharacterSettings;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSettingsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $characterId = $this->route('characterId');

        // TODO: add a proper enum
        $isAdmin = auth()->user()->group_id == 99;
        $characterBelongsToUser = auth()->user()->characters()->exists($characterId);

        return $isAdmin || $characterBelongsToUser;
    }

    protected function prepareForValidation(): void
    {
        foreach ($this->all() as $key => $value) {
            $value = $value == 'on';
            $this->merge([$key => $value]);
        }
    }


    public function rules(): array
    {

        return [
            'showCharacterOnline' => ['nullable'],
            'showCharacterMap' => ['nullable'],
        ];
    }
}
