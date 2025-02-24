<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'kategori_id' => 1,
                'barang_kode' => 'B001',
                'barang_nama' => 'Beras 5kg',
                'harga_beli' => 50000,
                'harga_jual' => 60000,
            ],
            [
                'kategori_id' => 1,
                'barang_kode' => 'B002',
                'barang_nama' => 'Minyak Goreng 2L',
                'harga_beli' => 25000,
                'harga_jual' => 30000,
            ],
            [
                'kategori_id' => 2,
                'barang_kode' => 'B003',
                'barang_nama' => 'Teh Botol Sosro',
                'harga_beli' => 3000,
                'harga_jual' => 4000,
            ],
            [
                'kategori_id' => 2,
                'barang_kode' => 'B004',
                'barang_nama' => 'Air Mineral 600ml',
                'harga_beli' => 2000,
                'harga_jual' => 3000,
            ],
            [
                'kategori_id' => 3,
                'barang_kode' => 'B005',
                'barang_nama' => 'Keripik Kentang',
                'harga_beli' => 8000,
                'harga_jual' => 10000,
            ],
            [
                'kategori_id' => 3,
                'barang_kode' => 'B006',
                'barang_nama' => 'Keripik Jagung',
                'harga_beli' => 7000,
                'harga_jual' => 9000,
            ],
            [
                'kategori_id' => 4,
                'barang_kode' => 'B007',
                'barang_nama' => 'Pisang Cavendish',
                'harga_beli' => 15000,
                'harga_jual' => 20000,
            ],
            [
                'kategori_id' => 4,
                'barang_kode' => 'B008',
                'barang_nama' => 'Jeruk Sunkist',
                'harga_beli' => 20000,
                'harga_jual' => 25000,
            ],
            [
                'kategori_id' => 5,
                'barang_kode' => 'B009',
                'barang_nama' => 'Bayam Segar',
                'harga_beli' => 5000,
                'harga_jual' => 7000,
            ],
            [
                'kategori_id' => 5,
                'barang_kode' => 'B010',
                'barang_nama' => 'Kangkung Segar',
                'harga_beli' => 4000,
                'harga_jual' => 6000,
            ],
            [
                'kategori_id' => 3,
                'barang_kode' => 'B011',
                'barang_nama' => 'Keripik Singkong',
                'harga_beli' => 5000,
                'harga_jual' => 7000,
            ],
            [
                'kategori_id' => 3,
                'barang_kode' => 'B012',
                'barang_nama' => 'Keripik Tempe',
                'harga_beli' => 6000,
                'harga_jual' => 8000,
            ],
            [
                'kategori_id' => 4,
                'barang_kode' => 'B013',
                'barang_nama' => 'Apel Fuji',
                'harga_beli' => 25000,
                'harga_jual' => 30000,
            ],
            [
                'kategori_id' => 4,
                'barang_kode' => 'B014',
                'barang_nama' => 'Anggur Merah',
                'harga_beli' => 30000,
                'harga_jual' => 35000,
            ],
            [
                'kategori_id' => 5,
                'barang_kode' => 'B015',
                'barang_nama' => 'Brokoli Segar',
                'harga_beli' => 10000,
                'harga_jual' => 15000,
            ],
        ];
        DB::table('m_barang')->insert($data);
    }
}
