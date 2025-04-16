<form action="{{ url('/profile/upload') }}" method="POST" id="form-import" enctype="multipart/form-data">
    @csrf
    <div id="modal-master" class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Upload Profile Picture</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Pilih File</label>
                    <div class="custom-file">
                        <input type="file" name="profile_picture" id="profile_picture" class="custom-file-input"
                            required>
                        <label class="custom-file-label" for="profile_picture">Pilih gambar...</label>
                    </div>
                    <small id="error-file_profile_picture" class="error-text form-text text-danger"></small>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-warning">Batal</button>
                <button type="submit" class="btn btn-primary">Upload</button>
            </div>
        </div>
    </div>
</form>
<script>
    document.getElementById('profile_picture').addEventListener('change', function (e) {
        var fileName = e.target.files[0] ? e.target.files[0].name : 'Pilih gambar...';
        e.target.nextElementSibling.innerText = fileName;
    });
    document.getElementById('form-import').addEventListener('submit', function (e) {
        e.preventDefault();
        var formData = new FormData(this);

        fetch(this.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
            }
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: data.message,
                        confirmButtonText: 'OK'
                    }).then(() => {
                        window.location.reload();
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal!',
                        text: data.message,
                        confirmButtonText: 'OK'
                    });
                }
            })
            .catch(error => {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: 'Terjadi kesalahan saat mengupload gambar.',
                    confirmButtonText: 'OK'
                });
            });
    });
</script>