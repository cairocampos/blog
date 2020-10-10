<?php

namespace Database\Seeders;

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
        $user = new \App\Models\User;
        $user->name = "Cairo Campos";
        $user->email = "cairocampos98@gmail.com";
        $user->password = \Illuminate\Support\Facades\Hash::make("cailet8714");
        $user->save();
    }
}
