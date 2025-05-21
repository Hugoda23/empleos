<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class DatabaseSeeder extends Seeder
{
    /**

     *
     * @return void
     */
    public function run()
    {
        $this->call([RoleSeeder::class]);
        //Usuario administrador
 User::create([
    'name'=>'administrador',
    'email'=>'admin@gmail.com',
    'password'=>Hash::make('12345678')
    ])->assignRole('admin'); 
    }

    

}