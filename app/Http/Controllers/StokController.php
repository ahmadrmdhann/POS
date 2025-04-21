<?php

namespace App\Http\Controllers;

use App\Models\StokModel;
use App\Models\SupplierModel;
use App\Models\BarangModel;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Yajra\DataTables\Facades\DataTables;

class StokController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Stok',
            'list' => ['Home', 'Stok']
        ];

        $page = (object) [
            'title' => 'Daftar Stok yang terdaftar di sistem'
        ];

        $activeMenu = 'stok';

        return view('stok.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu]);
    }

    public function list()
    {
        $stok = StokModel::select('stok_id', 'supplier_id', 'barang_id', 'user_id', 'stok_tanggal', 'stok_jumlah')
            ->with(['supplier', 'barang', 'user']);

        return DataTables::of($stok)
            ->addIndexColumn()
            ->addColumn('aksi', function ($stok) {
                $btn = '<button onclick="modalAction(\'' . url('/stok/' . $stok->stok_id . '/show_ajax') . '\')" class="btn btn-info btn-sm">Detail</button> ';
                $btn .= '<button onclick="modalAction(\'' . url('/stok/' . $stok->stok_id . '/edit_ajax') . '\')" class="btn btn-warning btn-sm">Edit</button> ';
                $btn .= '<button onclick="modalAction(\'' . url('/stok/' . $stok->stok_id . '/delete_ajax') . '\')" class="btn btn-danger btn-sm">Hapus</button> ';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function show_ajax(string $id)
    {
        $stok = StokModel::find($id);
        return view('stok.show_ajax', ['stok' => $stok]);
    }

    public function edit_ajax(string $id)
    {
        $stok = StokModel::with(['supplier', 'barang', 'user'])->find($id);

        $suppliers = SupplierModel::select('supplier_id', 'supplier_nama')->get();

        return view('stok.edit_ajax', ['stok' => $stok, 'suppliers' => $suppliers]);
    }

    public function update_ajax(Request $request, string $id)
    {
        $stok = StokModel::find($id);

        $validator = Validator::make($request->only(['supplier_id', 'stok_jumlah']), [
            'supplier_id' => 'required',
            'stok_jumlah' => 'required|integer'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validasi gagal',
                'msgField' => $validator->errors()
            ]);
        }

        $stok->update([
            'supplier_id' => $request->supplier_id,
            'stok_tanggal' => now(),
            'user_id' => Auth::id(),
            'stok_jumlah' => $stok->stok_jumlah + $request->stok_jumlah
        ]);

        return response()->json(['status' => true, 'message' => 'Data berhasil diperbarui']);
    }

    public function confirm_ajax(string $id)
    {
        $stok = StokModel::with(['supplier', 'barang', 'user'])->find($id);
        return view('stok.confirm_ajax', ['stok' => $stok]);
    }

    public function delete_ajax(Request $request, $id)
    {
        if ($request->ajax() || $request->wantsJson()) {
            try {
                $check = StokModel::find($id);
                if ($check) {
                    $check->delete();
                    $barang = BarangModel::find($check->barang_id);
                    $barang->delete();
                    return response()->json([
                        'status' => true,
                        'message' => 'Data berhasil dihapus'
                    ]);
                } else {
                    return response()->json([
                        'status' => false,
                        'message' => 'Data tidak ditemukan'
                    ]);
                }
            } catch (\Exception $e) {
                Log::error('Error deleting user: ' . $e->getMessage());
                if (str_contains($e->getMessage(), 'SQLSTATE[23000]')) {
                    return response()->json([
                        'status' => false,
                        'message' => 'Data tidak dapat dihapus karena masih terkait dengan data lain di sistem'
                    ]);
                }
            }
        }
        return redirect('/');
    }
    public function export_excel()
    {
        $stok = StokModel::select('supplier_id',
        'barang_id',
        'user_id',
        'stok_tanggal',
        'stok_jumlah',)
        ->orderBy('barang_id', 'asc')
        ->get();

        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Supplier ID');
        $sheet->setCellValue('C1', 'Barang ID');
        $sheet->setCellValue('D1', 'User ID');
        $sheet->setCellValue('E1', 'Tanggal Stok');
        $sheet->setCellValue('F1', 'Jumlah Stok');

        $sheet->getStyle('A1:D1')->getFont()->setBold(true);

        $no = 1;
        $baris = 2;

        foreach ($stok as $key => $value) {
            $sheet->setCellValue('A' . $baris, $no);
            $sheet->setCellValue('B' . $baris, $value->supplier_id);
            $sheet->setCellValue('C' . $baris, $value->barang_id);
            $sheet->setCellValue('D' . $baris, $value->user_id);
            $sheet->setCellValue('E' . $baris, $value->stok_tanggal);
            $sheet->setCellValue('F' . $baris, $value->stok_jumlah);
            $baris++;
            $no++;
        }

        foreach (range('A', 'D') as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(true);
        }

        $sheet->setTitle('Data Stok'); // set title sheet

        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $filename = 'Data Stok ' . date('Y-m-d H:i:s') . '.xlsx';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        header('Cache-Control: max-age=1');

        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
        header('Cache-Control: cache, must-revalidate');
        header('Pragma: public');

        $writer->save('php://output');
        exit;
    }

    public function export_pdf(){
        $stok = StokModel::select(
        'supplier_id',
        'barang_id',
        'user_id',
        'stok_tanggal',
        'stok_jumlah',)
        ->orderBy('barang_id', 'asc')
        ->get();

        $pdf = Pdf::loadView('stok.export_pdf', ['stok' => $stok]);
        $pdf->setPaper('a4', 'portrait');
        $pdf->setOptions(['isRemoteEnabled', true]);
        $pdf->render();

        return $pdf->stream('Data stok ' . date('Y-m-d H:i:s') . '.pdf');
    }
}
