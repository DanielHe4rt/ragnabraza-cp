<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{--            {{ __('Account Overview') }}--}}
        </h2>
    </x-slot>

    <div class="card mb-3">
        <div class="card-header d-flex justify-content-between">
            <div class="d-flex flex-column">
                <div>Kadoodle</div>
                <div class="small">Username</div>
            </div>
            <div class="d-flex flex-column">
                <div>{{ auth()->user()->lastlogin?->format('Y-m-d H:i:s') ?: 'Never'}}</div>
                <div class="small">Last Login</div>
            </div>
            <div class="d-flex flex-column">
                <div>{{ '127.0.0.1' }}</div>
                <div class="small">Last Login</div>
            </div>
            <div class="d-flex flex-row align-items-center ">
                <span class="badge text-bg-success mx-1">Online</span>
                <span class="badge text-bg-info mx-1">100.000 RF</span>
                <span class="badge text-bg-warning mx-1">VIP</span>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Characters</h5>
            <div id="characters">
                <div class="row">
                    @foreach(auth()->user()->characters as $character)
                        <div class="col-4">
                            <div class="card bg-light mb-3">
                                <div class="card-header d-flex flex-row justify-content-between">
                                    <div class="pt-1">
                                        <span class="badge text-bg-secondary">#1</span>
                                        @if($character->online)
                                            <span class="badge text-bg-success">Online</span>
                                        @else
                                            <span class="badge text-bg-secondary">Offline</span>
                                        @endif
                                    </div>
                                    <a href="{{ route('game.character.settings', $character->getKey()) }}" class="btn btn-warning btn-sm">Preferences</a>
                                </div>
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
                    @endforeach
                </div>
            </div>

            <h5 class="card-title">Kafra Storage</h5>
            <table class="table align-middle">
                <tbody>
                @php
                    $storageItems = auth()->user()->storageItems()->paginate();
                @endphp
                @foreach($storageItems as $storage)
                    <tr>
                        <td>
                            <img src="{{ asset('storage/item/' . $storage->nameid . '.png') }}" class="img-thumbnail"
                                 alt="">
                            <strong>
                                {{ $storage->item->name_english  }}
                                {{ $storage->item->slots > 0 ? '[' . $storage->item->slots . ']' : '' }}</strong>
                            <span class="badge text-bg-success"> +{{ $storage->refine }}</span>
                            @if($storage->hasCards)
                                @foreach($storage->cards()->getEquipedCards() as $card)
                                    <span class="badge text-bg-info"> {{ $card['amount'] }}x {{ $card['name'] }}</span>
                                @endforeach
                            @endif
                        </td>
                        <td class="text-end ">
                            <span
                                class="badge text-bg-dark">{{ $storage->identify ? "Identified" : "Unidentified" }}</span>
                            <span class="badge text-bg-dark">Broken</span>
                            <span class="badge text-bg-info">{{ $storage->amount }} x</span>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $storageItems->links() }}
        </div>
    </div>
</x-app-layout>
