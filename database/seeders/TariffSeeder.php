<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tariff;

class TariffSeeder extends Seeder
{
    public function run()
    {
        Tariff::create([
            'operator_id_from' => 1,
            'operator_id_to' => 2,
            'cost' => '10',
        ]);

        Tariff::create([
            'operator_id_from' => 1,
            'operator_id_to' => 1,
            'cost' => '5',
        ]);
        Tariff::create([
            'operator_id_from' => 2,
            'operator_id_to' => 2,
            'cost' => '5',
        ]);

    }
}
