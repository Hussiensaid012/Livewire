<?php

namespace Database\Seeders;

use App\Models\setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        setting::updateOrCreate(['email' => 'test@test.com'], [
            'name' => 'Digitals',
            'phone' => '12345678',
            'address' => "Cairo",
        ]);
    }
}
