<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'nama_produk' => 'Kopi Ulee Kareng Original',
                'deskripsi' => 'Kopi khas Aceh dengan aroma kuat.',
                'harga' => 25000,
                'gambar' => 'kopi-original.jpg',
            ],
            [
                'nama_produk' => 'Kopi Sanger',
                'deskripsi' => 'Perpaduan kopi dan susu yang lembut.',
                'harga' => 18000,
                'gambar' => 'kopi-sanger.jpg',
            ],
            [
                'nama_produk' => 'Kopi Tubruk Aceh',
                'deskripsi' => 'Sajian tradisional dengan rasa pekat.',
                'harga' => 15000,
                'gambar' => 'kopi-tubruk.jpg',
            ],
            [
                'nama_produk' => 'Kopi Luwak Aceh',
                'deskripsi' => 'Kopi premium dengan cita rasa unik.',
                'harga' => 50000,
                'gambar' => 'kopi-luwak.jpg',
            ],
            [
                'nama_produk' => 'Kopi Gayo',
                'deskripsi' => 'Kopi dari dataran tinggi Gayo dengan rasa khas.',
                'harga' => 30000,
                'gambar' => 'kopi-gayo.jpg',
            ],
        ];

        foreach ($products as $product) {
            Product::query()->create($product);
        }
    }
}

    