<div class="container">
    <div id="edit-password-tab">
        <form action="{{ url('/profile/update_password') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="current_password" class="form-label">Password Saat Ini:</label>
                <input type="password" class="form-control" id="current_password" name="current_password" required>
            </div>
            <div class="mb-3">
                <label for="new_password" class="form-label">Password Baru:</label>
                <input type="password" class="form-control" id="new_password" name="new_password" required>
            </div>
            <div class="mb-3">
                <label for="new_password_confirmation" class="form-label">Konfirmasi Password Baru:</label>
                <input type="password" class="form-control" id="new_password_confirmation"
                    name="new_password_confirmation" required>
            </div>
            <button type="submit" class="btn btn-primary">Ganti Password</button>
        </form>
    </div>
</div>
