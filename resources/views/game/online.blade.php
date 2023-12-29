<x-app-layout>
    <x-slot name="header">

    </x-slot>

    <x-game.account-info-bar :user="auth()->user()"/>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Who's online ({{$charactersOnline->total()}} players online)</h5>

            <table class="table">
                <thead>
                <th>Character</th>
                <th>Job Class</th>
                <th>Base Level / Job Level</th>
                <th>Guild</th>
                <th>Map</th>
                </thead>
                <tbody>
                @foreach($charactersOnline as $character)
                    <tr>
                        <td>{{ $character->settings->showCharacterMap ? $character->name : 'Hidden' }}</td>
                        <td>{{ $character->class->getName() }}</td>
                        <td>{{ $character->base_level . ' / ' . $character->job_level }}</td>
                        <td> {{ 'TODO: Guild' }}</td>
                        <td>{{ $character->settings->showCharacterMap ? $character->last_map : 'Hidden'}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
