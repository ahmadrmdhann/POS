@extends('layouts.template')

@section('content')
    <div class="row">
        <!-- Bento Boxes -->
        <a class="col-md-4 mb-3" href="{{ url('penjualan') }}">
            <div class="card text-dark h-100 shadow-sm card-outline card-primary">
                <div class="card-body d-flex flex-column h-100">
                    <h5 class="card-title">Total Penjualan</h5>
                    <p class="card-text h3 mb-0 mt-auto text-end">Rp {{ number_format($totalPenjualan, 0, ',', '.') }}</p>
                </div>
            </div>
        </a>

        <a class="col-md-4 mb-3" href="{{ url('stok') }}">
            <div class="card text-dark h-100 shadow-sm card-outline card-danger">
                <div class="card-body d-flex flex-column h-100">
                    <h5 class="card-title">Total Stok</h5>
                    <p class="card-text h3 mb-0 mt-auto text-end">{{ $totalStok }}</p>
                </div>
            </div>
        </a>

        <a class="col-md-4 mb-3" href="{{ url('user') }}">
            <div class="card text-dark h-100 shadow-sm card-outline card-warning">
                <div class="card-body d-flex flex-column h-100">
                    <h5 class="card-title">Total Pengguna</h5>
                    <p class="card-text h3 mb-0 mt-auto text-end">{{ $totalUser }}</p>
                </div>
            </div>
        </a>
    </div>

    <div class="d-flex justify-content-center"> <!-- Center the card -->
        <div class="col-md-5 mb-4"> <!-- tabel lebih sempit -->
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title font-weight-bold">Penjualan Terakhir</h5>

                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
                        <table class="table table-bordered table-striped table-hover table-sm" id="table_penjualan">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Pembeli</th>
                                    <th>Invoice</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@push('js')
    <script>
        // DataTable Configuration
        let dataPenjualan;
        $(document).ready(function () {
            initializeDataTable();
        });

        function initializeDataTable() {
            dataPenjualan = $('#table_penjualan').DataTable({
                serverSide: true,
                ajax: {
                    url: "{{ url('penjualan/list') }}",
                    type: "POST",
                    dataType: "json"
                },
                columns: [{
                    data: "DT_RowIndex",
                    className: "text-center",
                    orderable: false,
                    searchable: false
                },
                {
                    data: "pembeli"
                },
                {
                    data: "total_harga",
                    className: "text-end",
                    orderable: false,
                    searchable: false
                },
                {
                    data: "penjualan_tanggal", // Kolom untuk sorting
                    visible: false, // Tidak ditampilkan
                    searchable: false
                }
                ],
                order: [
                    [3, 'desc']
                ],
                scrollY: "350px",
                scrollCollapse: true,
                paging: false, // hilangkan pagination
                info: false, // hilangkan info "Showing x of y"
                searching: false, // hilangkan kotak search
                lengthChange: false // hilangkan dropdown "show x entries"
            });
        }
        // Modal Handling
        function modalAction(url = '') {
            $('#myModal').load(url, function () {
                $('#myModal').modal('show');
            });
        }
    </script>
@endpush
