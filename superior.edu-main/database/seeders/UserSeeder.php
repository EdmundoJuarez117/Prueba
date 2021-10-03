<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
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

				/*
        $usuario = new User();
        $usuario->name = "Miguel Hernández Ramos";
        $usuario->email = "miguellhdez@gmail.com";
        $usuario->password = Hash::make("12345678aA");
        $usuario->save(); // model_has_roles

				$usuario = new User();
        $usuario->name = "Juan Pérez";
        $usuario->email = "jperez@mail.com";
        $usuario->password = Hash::make("12345678aA");
        $usuario->save()->assignRole('Docente');
				*/

				User::create([
					'name' => 'Sistemas Admin',
					'email' => 'sistemas@upamozoc.edu.mx',
					'password' => Hash::make("12345678aA"),
				])->assignRole('Admin');

				User::create([
					'name' => 'Juan Pérez',
					'email' => 'docente1@upamozoc.edu.mx',
					'password' => Hash::make("12345678aA"),
				])->assignRole('Docente');


    }
}
