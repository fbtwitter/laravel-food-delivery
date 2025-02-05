<?php

namespace Database\Seeders;

use App\Enums\RoleName;
use App\Models\City;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    protected function run(): void
    {
        $this->createAdminUser();
        $this->createVendorUser();
        $this->createCustomerUser();
    }

    private function createAdminUser(): void
    {
        User::create([
            'name' => "Admin User",
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
        ])->roles()->sync(Role::where("name", RoleName::ADMIN->value)->first());
    }

    private function createVendorUser(): void
    {
        $vendor = User::create([
            'name' => "Restaurant owner",
            "email" => "vendor@admin.com",
            "password" => bcrypt("password"),
        ]);
        $vendor->roles()->sync(Role::where("name", RoleName::VENDOR->value)->first());

        $vendor->restaurant()->create([
            "city_id" => City::where("name", "Surakarta")->value("id"),
            "name" => "Restaurant The Apic",
            "address" => "Jalan Moren",
        ]);
    }

    private function createCustomerUser(): void
    {
        $vendor = User::create([
            "name" => "Loyal Customer",
            "email" => "customer@admin.com",
            "password" => bcrypt("password"),
        ]);

        $vendor->roles()->sync(Role::where("name", RoleName::CUSTOMER->value)->first());
    }


}
