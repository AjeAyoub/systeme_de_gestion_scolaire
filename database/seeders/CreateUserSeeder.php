<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name'=>'admin',
                'email'=>'ad@ad.com',
                'role'=> 0,
                'password'=> bcrypt('12345678'),
             ],
            [
                'name'=>'enseignant',
                'email'=>'en@en.com',
                'role'=> 1,
                'password'=> bcrypt('12345678'),
             ],
            [
                'name'=>'comptable',
                'email'=>'ct@ct.com',
                'role'=> 2,
                'password'=> bcrypt('12345678'),
             ],
            [
                'name'=>'etudiant',
                'email'=>'et@et.com',
                'role'=> 3,
                'password'=> bcrypt('12345678'),
             ],
            [
                'name'=>'parent',
                'email'=>'pr@pr.com',
                'role'=> 4,
                'password'=> bcrypt('12345678'),
             ],
            [
                'name'=>'utilisateur',
                'email'=>'ut@ut.com',
                'role'=> 5,
                'password'=> bcrypt('12345678'),
             ],

            
        ];
    
        foreach ($users as $key => $user) 
        {
            User::create($user);
        }
    
    }
}
