<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Operator;

class OperatorSeeder extends Seeder
{
    public function run()
    {
        Operator::create([
            'name' => 'Operator A',
            'prefix' => '+7775',
        ]);

        Operator::create([
            'name' => 'Operator B',
            'prefix' => '+7776',
        ]);

    }
}
