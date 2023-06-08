<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            [
                'username' => '飯塚翔太',
                'mail' => 'gszgrybrsx@gmail.com',
                'password' => Hash::make('123456789'),
            ],
            [
                'username' => 'aaaa',
                'mail' => 'aaaa@example.com',
                'password' => Hash::make('aaaa'),
            ],
            [
                'username' => 'bbbb',
                'mail' => 'bbbb@example.com',
                'password' => Hash::make('bbbb'),
            ],
            [
                'username' => 'cccc',
                'mail' => 'cccc@example.com',
                'password' => Hash::make('cccc'),
            ],
            [
                'username' => 'dddd',
                'mail' => 'dddd@example.com',
                'password' => Hash::make('dddd'),
            ],
            [
                'username' => 'eeee',
                'mail' => 'eeee@example.com',
                'password' => Hash::make('eeee'),
            ],
            [
                'username' => 'ffff',
                'mail' => 'ffff@example.com',
                'password' => Hash::make('ffff'),
            ],
            [
                'username' => 'gggg',
                'mail' => 'gggg@example.com',
                'password' => Hash::make('gggg'),
            ]
        ]);
    }
}
