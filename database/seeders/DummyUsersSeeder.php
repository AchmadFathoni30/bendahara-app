<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userData = [
            [
                'name' => 'Achmad Fathoni',
                'email' => 'achmadfathonii30@gmail.com',
                'password' => bcrypt('123456')
            ],
        ];

        foreach($userData as $value){
            User::create($value);
        }
    }
}
