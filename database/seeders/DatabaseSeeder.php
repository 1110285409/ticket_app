<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->createAdmin();

    }

    public function createAdmin(){
        $user = new User;
        $user->name='admin';
        $user->email='admin@test.com';
        $user->password= '12345678';
        $user->role ='admin' ;

        $user->save();
    }
}
