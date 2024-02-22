<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $userData = [
            [
                'name' => 'Administrator',
                'email'=> 'admin@gmail.com',
                'role' => 'admin',
                'password' => bcrypt('admin')
            ],
            [
                'name' => 'Operator',
                'email'=> 'operator@gmail.com',
                'role' => 'operator',
                'password' => bcrypt('operator')
            ],
            [
                'name' => 'Owner',
                'email'=> 'owner@gmail.com',
                'role' => 'owner',
                'password' => bcrypt('owner')
            ]
            ];

            foreach($userData as $key => $val){
                User::create($val);
            }
    }
}
