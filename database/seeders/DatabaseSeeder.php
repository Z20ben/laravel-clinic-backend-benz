<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // tambahkan pada database/seeder/DatabaseSeeder.php --> auto
        \App\Models\User::factory(10)->create();
        // jika ingin --> manual
        \App\Models\User::factory(1)->create([
            'name'=>'Admin User',
            'email'=>'beni@mail.com',
            'role'=>'admin',
            'password'=>Hash::make('qwerty123'), //jangan lupa import Hash
            'phone'=>'123456789',
        ]);

        // seeder profile_clinics manual
        \App\Models\ProfileClinic::factory()->create([
            'name'=>'Klinik Beni',
            'address'=>'Jetis, Yogyakarta',
            'phone'=>'0274-552233',
            'email'=>'drbenz@klinik.com',
            'doctor_name'=>'Dr. Beni',
            'unique_code'=>'123456'
        ]);

        //call
        $this->call(DoctorSeeder::class);

    }
}
