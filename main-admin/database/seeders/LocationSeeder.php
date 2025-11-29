<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Disable foreign key checks
        Schema::disableForeignKeyConstraints();

        // Truncate tables
        DB::table('cities')->truncate();
        DB::table('districts')->truncate();
        DB::table('states')->truncate();
        DB::table('countries')->truncate();

        // Import Countries
        $this->importCsv('database/seeders/data/countries.csv', 'countries');

        // Import States
        $this->importCsv('database/seeders/data/states.csv', 'states');

        // Import Districts
        $this->importCsv('database/seeders/data/districts.csv', 'districts');

        // Import Cities
        $this->importCsv('database/seeders/data/cities.csv', 'cities');

        // Enable foreign key checks
        Schema::enableForeignKeyConstraints();
    }

    private function importCsv($path, $table)
    {
        if (!file_exists($path)) {
            $this->command->error("File not found: $path");
            return;
        }

        $file = fopen($path, 'r');
        $headers = fgetcsv($file); // Read headers

        $data = [];
        $chunkSize = 1000;

        while (($row = fgetcsv($file)) !== false) {
            $rowData = array_combine($headers, $row);

            // Add timestamps
            $rowData['created_at'] = now();
            $rowData['updated_at'] = now();

            $data[] = $rowData;

            if (count($data) >= $chunkSize) {
                DB::table($table)->insert($data);
                $data = [];
            }
        }

        if (!empty($data)) {
            DB::table($table)->insert($data);
        }

        fclose($file);
        $this->command->info("Imported $table from $path");
    }
}
