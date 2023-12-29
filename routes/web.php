<?php

use App\Http\Controllers\Game\AccountOverviewController;
use App\Http\Controllers\Game\CharacterController;
use App\Http\Controllers\Info\PlayersOnlineController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])
    ->prefix('player')
    ->group(function () {
        // Base Endpoints
        Route::view('/dashboard', 'dashboard')->name('dashboard');
        Route::get('/overview', [AccountOverviewController::class, 'viewAccountOverview'])
            ->name('game.overview');

        Route::get('/online', [PlayersOnlineController::class, 'viewPlayersOnline'])
            ->name('game.online-players');

        // Character
        Route::prefix('/character')->group(function () {
            Route::get('{characterId}/settings', [CharacterController::class, 'viewCharacterSettings'])
                ->name('game.character.settings');
            Route::post('{character}/settings', [CharacterController::class, 'postCharacterSettings'])
                ->name('game.character.settings-update');
        });
    });
