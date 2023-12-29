<?php

use App\Data\CharacterSettings;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('char', function (Blueprint $table) {
            $table->text('settings');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('char', function (Blueprint $table) {
            $table->dropColumn(['settings']);
        });
    }
};
