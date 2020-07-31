<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user')->insert([
            'name' => "Trang",
            'email' => 'Trangthu@gmail.com',
            'password' => Hash::make('1234567890'),
            'phone'=>'123456789',
            'address'=>"Kim Động, Hưng yên",
            'avatar'=>'avatars/agsaymvYnCQaVq9MPAANT4gwRIOvB5QVW9ycG3Nk.jpeg',
            'level'=>0,
            'user_status'=>1
        ]);
    }
}
