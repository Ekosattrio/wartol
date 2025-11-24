<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class PenjualSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('penjual')->insert([
            [
                'username'   => 'admin',
                'password'   => Hash::make('admin123'),
                'name'       => 'Admin Wartol',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'username'   => 'satrio',
                'password'   => Hash::make('123456'),
                'name'       => 'Satrio Penjual',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'username'   => 'kasir1',
                'password'   => Hash::make('kasir123'),
                'name'       => 'Kasir 1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
