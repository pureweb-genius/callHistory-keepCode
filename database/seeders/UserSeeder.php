<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'John Doe',
            'phone' => '+7(775)777-77-77',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Jane Smith',
            'phone' => '+7(776)777-77-78',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Alice Johnson',
            'phone' => '+7(776)777-77-79',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Bob Brown',
            'phone' => '+7(775)777-77-80',
            'password' => Hash::make('password'),
        ]);
    }
}
