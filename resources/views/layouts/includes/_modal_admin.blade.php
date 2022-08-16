<div class="modal fade" id="registration" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" action="/register" class="needs-validation">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Admin</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modal-body">
                    <div class="form-group">
                        <label for="first_name">Nama</label>
                        <input id="first_name" type="text" class="form-control" name="nama" autofocus
                            required>
                        <div class="invalid-feedback">
                            Nama harus diisi !
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nis">NIS</label>
                        <input id="nis" type="text" class="form-control" name="nis" required>
                        <div class="invalid-feedback">
                            Nis harus diisi !
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="d-block">Password</label>
                        <input id="password" type="password" class="form-control pwstrength"
                            data-indicator="pwindicator" name="password" required>
                        <div id="pwindicator" class="pwindicator">
                            <div class="bar"></div>
                            <div class="label"></div>
                        </div>
                        <div class="invalid-feedback">
                            Password harus diisi !
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                            Simpan
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>