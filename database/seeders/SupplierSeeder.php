<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'supplier_kode' => 'POLTEK',
                'supplier_nama' => 'PT. Polinema Indah',
                'supplier_alamat' => 'Jl. Soekarno Hatta No. 9',
            ],
            [
                'supplier_kode' => 'UBG',
                'supplier_nama' => 'PT. Brawijaya Gedhe',
                'supplier_alamat' => 'Jl. Veteran No. 10',
            ],
            [
                'supplier_kode' => 'UM',
                'supplier_nama' => 'PT. Malang Raya',
                'supplier_alamat' => 'Jl. Jakarta No. 69',
            ],
        ];
        DB::table('m_supplier')->insert($data);
    }
}
