<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                        {{ __('Account Overview') }}
        </h2>
    </x-slot>

    <x-game.account-info-bar :user="auth()->user()"/>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Character Settings</h5>
            <div class="row">
                <div class="col-4">
                    <div class="card bg-light">

                        <div class="text-center">
                            <img width="120" src="{{ asset('images/character_preview.png') }}"
                                 class="card-image" width="100%"/>
                        </div>
                        <div class="card-body d-flex flex-column justify-content-center text-center">
                            <h3 class="m-0">{{ $character->name }}</h3>
                            <div class="text-secondary">
                                {{-- TODO: Staff icons--}}
                                😁 Staff Ragnafodase
                            </div>
                            <div>
                                        <span
                                            class="badge text-bg-dark">{{ $character->base_level . '/' . $character->job_level }}</span>
                                <span class="badge text-bg-dark">{{ $character->class->getName() }}</span>
                                <span class="badge text-bg-dark">{{ $character->zeny }} <span
                                        class="small">z</span></span>
                            </div>
                        </div>
                    </div>
                </div>
                <form method="POST" action="{{ route('game.character.settings-update', $character->getKey()) }}"
                    class=" col d-flex flex-column justify-content-between">
                        <div>
                            @csrf
                            <div class="form-check form-switch" bis_skin_checked="1">
                                <input class="form-check-input" type="checkbox" name="showCharacterOnline"
                                       id="showCharacterOnlineEl" @checked($character->settings->showCharacterOnline)>
                                <label class="form-check-label" for="showCharacterOnlineEl">
                                    Hide Character Name from "Who's Online"
                                </label>
                            </div>
                            <div class="form-check form-switch" bis_skin_checked="1">
                                <input class="form-check-input" type="checkbox" name="showCharacterMap"
                                       id="showCharacterMap" @checked($character->settings->showCharacterMap)>
                                <label class="form-check-label" for="showCharacterMap">
                                    Hide Current Map From "Who's Online"
                                </label>
                            </div>
                        </div>

                    <button type="submit" class="btn btn-primary">Update Settings</button>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>
