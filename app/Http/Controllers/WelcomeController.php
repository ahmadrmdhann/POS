<?php
namespace App\Http\Controllers;

use App\Models\DetailPenjualanModel;
use App\Models\StokModel;
use App\Models\UserModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
    public function index()
    {
        $breadcrumb = (object)[
            'title' => 'Selamat Datang, '.Auth::user()->nama,
            'list' => ['Home', 'Welcome'],
        ];

        $activeMenu = 'dashboard';

        $totalUser = UserModel::count();

        $totalStok = StokModel::sum('stok_jumlah');

        $totalPenjualan = DetailPenjualanModel::sum(DB::raw('harga * jumlah'));

        return view('welcome', [
            'breadcrumb' => $breadcrumb,
            'activeMenu' => $activeMenu,
            'totalUser' => $totalUser,
            'totalStok' => $totalStok,
            'totalPenjualan' => $totalPenjualan,
        ]);
    }
}
