@extends('layouts.template')

@section('content')
    <div class="row">
        <div class="col-md-4 text-center">
            <div class="card">
                <div class="card-body card-outline card-primary">
                    <div class="rounded-circle overflow-hidden border border-primary mx-auto"
                        style="width: 120px; height: 120px;">
                        <img src="{{ asset(Auth::user()->profile_picture ?? 'storage/images/default.svg') }}"
                            alt="User Image" class="w-100 h-100" style="object-fit: cover;">
                    </div>
                    <h5 class="mt-3">{{ Auth::user()->nama }}</h5>
                    <button onclick="modalAction('{{ url('/profile/upload-picture') }}')"
                        class="btn btn-sm btn-primary mt-2">Ganti Foto Profil</button>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header card-outline card-primary text-white">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li><a href="#" class="nav-link active" data-url="{{ url('/profile/edit_profile') }}">Edit
                                Profile</a></li>
                        <li><a href="#" class="nav-link" data-url="{{ url('/profile/edit_password') }}">Ganti Password</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div id="tabContent">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="myModal" class="modal fade animate shake" tabindex="-1" role="dialog" data-backdrop="static"
        data-keyboard="false" data-width="75%" aria-hidden="true"></div>
    @push('js')
        <script>
            function modalAction(url = '') {
                $('#myModal').load(url, function () {
                    $('#myModal').modal('show');
                });
            }

            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: '{{ session('success') }}',
                    confirmButtonText: 'OK'
                });
            @elseif (session('error'))
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: '{{ session('error') }}',
                    confirmButtonText: 'OK'
                });
            @endif

            $(document).ready(function () {
                setTimeout(function () {
                    loadTabContent($('.nav-link.active').data('url'));
                }, 100);

                $('.nav-link').on('click', function (e) {
                    e.preventDefault();

                    $('.nav-link').removeClass('active');
                    $(this).addClass('active');

                    loadTabContent($(this).data('url'));
                });

                function loadTabContent(url) {
                    $.ajax({
                        url: url,
                        type: 'GET',
                        success: function (response) {
                            $('#tabContent').html(response);
                        },
                        error: function () {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Failed to load content.',
                                confirmButtonText: 'OK'
                            });
                        }
                    });
                }
            });
        </script>
    @endpush
@endsection
