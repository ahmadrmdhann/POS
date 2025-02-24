<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['stok_id' => 1, 'supplier_id' => 1, 'barang_id' => 1, 'user_id' => 1, 'stok_tanggal' => '2021-02-05', 'stok_jumlah' => 100],
            ['stok_id' => 2, 'supplier_id' => 1, 'barang_id' => 2, 'user_id' => 1, 'stok_tanggal' => '2021-02-06', 'stok_jumlah' => 200],
            ['stok_id' => 3, 'supplier_id' => 2, 'barang_id' => 3, 'user_id' => 1, 'stok_tanggal' => '2021-02-07', 'stok_jumlah' => 150],
            ['stok_id' => 4, 'supplier_id' => 2, 'barang_id' => 4, 'user_id' => 1, 'stok_tanggal' => '2021-02-08', 'stok_jumlah' => 180],
            ['stok_id' => 5, 'supplier_id' => 3, 'barang_id' => 5, 'user_id' => 1, 'stok_tanggal' => '2021-02-09', 'stok_jumlah' => 120],
            ['stok_id' => 6, 'supplier_id' => 3, 'barang_id' => 6, 'user_id' => 1, 'stok_tanggal' => '2021-02-10', 'stok_jumlah' => 130],
            ['stok_id' => 7, 'supplier_id' => 1, 'barang_id' => 7, 'user_id' => 1, 'stok_tanggal' => '2021-02-11', 'stok_jumlah' => 140],
            ['stok_id' => 8, 'supplier_id' => 1, 'barang_id' => 8, 'user_id' => 1, 'stok_tanggal' => '2021-02-12', 'stok_jumlah' => 160],
            ['stok_id' => 9, 'supplier_id' => 2, 'barang_id' => 9, 'user_id' => 1, 'stok_tanggal' => '2021-02-13', 'stok_jumlah' => 110],
            ['stok_id' => 10, 'supplier_id' => 2, 'barang_id' => 10, 'user_id' => 1, 'stok_tanggal' => '2021-02-14', 'stok_jumlah' => 115],
            ['stok_id' => 11, 'supplier_id' => 3, 'barang_id' => 11, 'user_id' => 1, 'stok_tanggal' => '2021-02-15', 'stok_jumlah' => 125],
            ['stok_id' => 12, 'supplier_id' => 3, 'barang_id' => 12, 'user_id' => 1, 'stok_tanggal' => '2021-02-16', 'stok_jumlah' => 135],
            ['stok_id' => 13, 'supplier_id' => 1, 'barang_id' => 13, 'user_id' => 1, 'stok_tanggal' => '2021-02-17', 'stok_jumlah' => 145],
            ['stok_id' => 14, 'supplier_id' => 1, 'barang_id' => 14, 'user_id' => 1, 'stok_tanggal' => '2021-02-18', 'stok_jumlah' => 155],
            ['stok_id' => 15, 'supplier_id' => 2, 'barang_id' => 15, 'user_id' => 1, 'stok_tanggal' => '2021-02-19', 'stok_jumlah' => 165],
        ];
        DB::table('t_stok')->insert($data);
    }
}
