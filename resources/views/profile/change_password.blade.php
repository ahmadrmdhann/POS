<div class="container">
    <div id="edit-password-tab">
        <form action="{{ url('/profile/update_password') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="current_password" class="form-label">Current Password:</label>
                <input type="password" class="form-control" id="current_password" name="current_password">
            </div>
            <div class="mb-3">
                <label for="new_password" class="form-label">New Password:</label>
                <input type="password" class="form-control" id="new_password" name="new_password">
            </div>
            <div class="mb-3">
                <label for="new_password_confirmation" class="form-label">Confirm Password:</label>
                <input type="password" class="form-control" id="new_password_confirmation"
                    name="new_password_confirmation">
            </div>
            <button type="submit" class="btn btn-primary">Change Password</button>
        </form>
    </div>
</div>