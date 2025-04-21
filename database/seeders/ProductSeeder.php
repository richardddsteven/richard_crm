<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'D~NET Premium',
            'description' => 'D~NET Premium adalah produk internet fiber optik yang menawarkan kecepatan tinggi dan stabilitas koneksi yang optimal.',
            'price' => '5000000',
        ]);

        Product::create([
            'name' => 'D~NET Corporate',
            'description' => 'D~NET Corporate adalah produk internet fiber optik yang dirancang khusus untuk kebutuhan bisnis dengan kecepatan tinggi dan layanan pelanggan yang prima.',
            'price' => '10000000',
        ]);

        Product::create([
            'name' => 'D~NET IIX',
            'description' => 'D~NET IIX adalah produk internet fiber optik yang menawarkan koneksi langsung ke Internet Exchange Indonesia (IIX) untuk kecepatan akses yang lebih baik.',
            'price' => '12500000',
        ]);

        Product::create([
            'name' => 'D~NET Loop',
            'description' => 'D~NET Loop adalah produk internet fiber optik yang menawarkan koneksi cepat dan stabil untuk kebutuhan sehari-hari.',
            'price' => '15000000',
        ]);

        Product::create([
            'name' => 'D~NET Flex',
            'description' => 'D~NET Flex adalah produk internet fiber optik yang menawarkan fleksibilitas dalam memilih paket sesuai kebutuhan pengguna.',
            'price' => '7500000',
        ]);
    }
}
