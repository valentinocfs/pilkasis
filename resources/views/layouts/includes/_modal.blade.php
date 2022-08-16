<!-- Modal Add Siswa -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Siswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modal-body">
                <form action="/siswa/create" method="POST" novalidate="">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama"
                            placeholder="Masukkan Nama Siswa..." value="{{old('nama')}}" required>
                        @error('nama')
                                <div class="text-danger ml-1">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="nis" class="form-label">NIS</label>
                        <input id="nis" type="number" class="form-control @error('nis') is-invalid @enderror" name="nis"
                            placeholder="Masukkan NIS Siswa..." value="{{old('nis')}}" required>
                        @error('nis')
                            <div class="text-danger ml-1">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form mb-3">
                        <label for="kelas" class="form-label">Kelas</label>
                        <input type="text" class="form-control @error('kelas') is-invalid @enderror" id="kelas" name="kelas"
                            placeholder="Masukkan Kelas Siswa..." value="{{old('kelas')}}" required>
                        @error('kelas')
                            <div class="text-danger ml-1">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <select class="form-control @error('jenis_kelamin') is-invalid @enderror selectric" aria-label="Default select example" name="jenis_kelamin"
                            id="jenis_kelamin" value="{{old('jenis_kelamin')}}" required>
                            <option selected disabled value>Pilih Jenis Kelamin</option>
                            <option value="Laki-Laki" @if (old('jenis_kelamin') == 'Laki-Laki') selected="selected" @endif>Laki-Laki</option>
                            <option value="Perempuan" @if (old('jenis_kelamin') == 'Perempuan') selected="selected" @endif>Perempuan</option>
                        </select>
                        @error('jenis_kelamin')
                            <div class="text-danger ml-1">{{$message}}</div>
                        @enderror
                    </div>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary" id="simpan">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>