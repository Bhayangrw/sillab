<?php
 
class UserTableSeeder extends Seeder
{
 
    public function run()
    {
        DB::table('users')->delete();
        User::create(array(
            'name'     => 'Bhayang Ratu Wahyunur',
            'username' => 'admin',
            'email'    => 'bhayangratu@gmail.com',
            'password' => Hash::make('admin12345'),
        ));
    }
 
}