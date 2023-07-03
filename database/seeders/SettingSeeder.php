<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('settings')->delete();

        Setting::create([
            'budget' => 400000.00,
            'start_date' => "2022-07-01",
            'end_date' => "2023-06-30",
        ]);
    }
}
