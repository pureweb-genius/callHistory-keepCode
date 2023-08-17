<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Call;

class CallSeeder extends Seeder
{
    public function run()
    {
        Call::create([
            'call_from' => '1',
            'call_to' => '2',
            'duration' => 2,
            'cost' => 20,
        ]);

        Call::create([
            'call_from' => '2',
            'call_to' => '1',
            'duration' => 10,
            'cost' => 100,
        ]);

    }
}
