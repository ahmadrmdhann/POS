@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header bg-primary text-white">
            <p class="card-title mb-0">{{ $page->title }}</p>
        </div>
        <div class="card-body bg-light">
            <div class="d-flex align-items-center">
                <div class="user-picture me-4">
                    <div class="rounded-circle overflow-hidden border border-primary" style="width: 120px; height: 120px;">
                        <img src="{{ asset(Auth::user()->profile_picture ?? 'storage/images/default.svg') }}" alt="User Image"
                            class="w-100 h-100" style="object-fit: cover;">
                    </div>
                </div>
                <div class="user-profile flex ml-3">
                    <p class="mb-2"><strong>Username:</strong> {{ Auth::user()->username }}</p>
                    <p class="mb-2"><strong>Nama:</strong> {{ Auth::user()->nama }}</p>
                    <p class="mb-0"><strong>Level:</strong> {{ Auth::user()->level->level_nama }}</p>
                </div>
            </div>
        </div>
        <div class="card-footer">
            {{-- <a href="{{ url('/profile/edit') }}" class="btn btn-sm btn-primary mt-1">Edit Profile</a> --}}
            <button onclick="modalAction('{{ url('/profile/upload-picture') }}')" class="btn btn-sm btn-secondary mt-1">Change Picture</button>
            {{-- <a href="{{ url('/profile/change-password') }}" class="btn btn-sm btn-secondary mt-1">Change Password</a> --}}
        </div>
    </div>
    <div id="myModal" class="modal fade animate shake" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" data-width="75%" aria-hidden="true"></div>
    @push('js')
    <script>
        function modalAction(url = '') {
            $('#myModal').load(url, function () {
                $('#myModal').modal('show');
            });
        }
    </script>
    @endpush
@endsection
