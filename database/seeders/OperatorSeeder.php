<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Operator;

class OperatorSeeder extends Seeder
{
    public function run()
    {
        Operator::create([
            'name' => 'Beeline',
            'prefix' => '+7(777)',
        ]);

        Operator::create([
            'name' => 'Active',
            'prefix' => '+7(775)',
        ]);

        Operator::create([
            'name' => 'Tele2',
            'prefix' => '+7(747)',
        ]);



    }
}
