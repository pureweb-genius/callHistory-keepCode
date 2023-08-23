<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\CallOperator;

class CallOperatorSeeder extends Seeder
{
    public function run()
    {


        CallOperator::create([
            'call_id' => 1,
            'from_operator' => 1,
            'to_operator'=>2,
        ]);

        CallOperator::create([
            'call_id' => 2,
            'from_operator' => 2,
            'to_operator'=>1,
        ]);

    }
}
