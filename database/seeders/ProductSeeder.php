<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;      // 1. Pastikan import Model Product Anda
use Faker\Factory as Faker; // 2. Import library Faker

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 3. Inisialisasi Faker dengan lokalisasi Indonesia
        $faker = Faker::create('id_ID');

        // 4. Buat loop untuk 50 data produk
        for ($i = 0; $i < 5; $i++) {

            // 5. Masukkan data ke database
            Product::create([

                // nama_produk: 2-3 kata acak
                'nama_produk' => $faker->words(3, true),

                // harga: Angka acak antara 5000 s/d 1000000
                'harga' => $faker->numberBetween(5000, 1000000),

                // stok: Angka acak antara 0 s/d 100
                'stok' => $faker->numberBetween(0, 100),

                // status: Pilih 'aktif' atau 'nonaktif' secara acak
                'status' => $faker->randomElement(['aktif', 'nonaktif']),

                // Kolom 'created_at' dan 'updated_at' akan diisi otomatis
            ]);
        }
    }
}
