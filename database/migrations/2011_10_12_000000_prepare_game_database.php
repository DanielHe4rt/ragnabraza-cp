<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        foreach ($this->getMigrationFiles() as $migrationFile) {
            dump($migrationFile);
            $rawQueries = File::get($migrationFile);

            $this->executeQueries($rawQueries);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropDatabaseIfExists('ragnarok_test');
    }

    /**
     * @return array<int, string>
     */
    private function getMigrationFiles(): array
    {
        $fullPath = storage_path('app/game_sqls/*.sql');
        return glob($fullPath);
    }

    private function executeQueries(string $rawQueries): void
    {
        $pattern = '/(?:\'[^\'\\\\]*(?:\\\\.[^\'\\\\]*)*\'|[^;])+/';
        preg_match_all($pattern, $rawQueries, $matchedQueries);
        foreach ($matchedQueries[0] as $query) {
            $query = trim($query);
            if (empty($query)) {
                continue;
            }

            DB::connection('mysql')->statement($query);
        }
    }
};
