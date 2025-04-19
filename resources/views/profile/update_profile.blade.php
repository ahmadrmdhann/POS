<div class="container">
    <div id="edit-profile-tab">
        <form action="{{ url('/profile/update_profile') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="username" class="form-label">Username:</label>
                <input type="text" class="form-control" id="username" name="username"
                    value="{{ Auth::user()->username }}">
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama:</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ Auth::user()->nama }}">
            </div>
            <div class="mb-3">
                <label for="level" class="form-label">Level:</label>
                <input type="text" class="form-control" id="level" name="level"
                    value="{{ Auth::user()->level->level_nama }}" readonly>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
