<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Rol;
use App\Models\User;
use App\Models\Admin;
use App\Models\Client;
use App\Models\Lawyer;
use App\Models\Contract;
use App\Models\Messages;
use App\Models\RolAdmin;
use App\Models\UserInfo;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {

        User::factory()->count(500)->create();
        UserInfo::factory()->count(500)->create();
        Admin::factory()->count(100)->create();
        Client::factory()->count(200)->create();
        Lawyer::factory()->count(200)->create();

        Rol::insert([
            ['name' => 'Gestor de clientes', 'description' => 'Administrador de clientes'],
            ['name' => 'Gestor de admins', 'description' => 'Administrador de administradores'],
            ['name' => 'Gestor de abogados', 'description' => 'Administrador de abogados'],
            ['name' => 'Gestor de roles', 'description' => 'Administrador de roles'],
            ['name' => 'Gestor de contratos', 'description' => 'Administrador de contratos'],
        ]);

        RolAdmin::factory()->count(300)->create();
        Contract::factory()->count(200)->create();
        Messages::factory()->count(200)->create();
    }
}
