<!-- Modal Add Kandidat -->
<div class="modal fade" id="insert" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah Data Kandidat</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body" id="modal-body">
              <form action="/kandidat/insert" method="POST" novalidate="" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group mb-3">
                      <label for="nama" class="form-label">Nama</label>
                      <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama"
                          placeholder="Masukkan Nama Kandidat..." value="{{old('nama')}}" required>
                          @error('nama')
                            <div class="text-danger ml-1">{{$message}}</div>
                          @enderror
                  </div>
                  <div class="form-group mb-3">
                      <label for="nokandidat" class="form-label">Nomor Kandidat</label>
                      <input id="nokandidat" type="number" class="form-control @error('nokandidat') is-invalid @enderror" name="nokandidat"
                          placeholder="Masukkan Nomor Kandidat..." value="{{old('nokandidat')}}" required>
                          @error('nokandidat')
                            <div class="text-danger ml-1">{{$message}}</div>
                          @enderror
                  </div>
                  <div class="form mb-3">
                      <label for="visi" class="form-label">Visi</label>
                      <input type="text" class="form-control @error('visi') is-invalid @enderror" id="visi" name="visi"
                          placeholder="Masukkan Visi Kandidat..." value="{{old('visi')}}" required>
                          @error('visi')
                            <div class="text-danger ml-1">{{$message}}</div>
                          @enderror
                  </div>
                  <div class="form mb-3">
                    <label for="editor" class="form-label">Misi</label>
                    <textarea class="form-control @error('misi') is-invalid @enderror" id="editor" name="misi"
                        placeholder="Masukkan Misi Kandidat..." required>{!! old('misi') !!}</textarea>
                        @error('misi')
                            <div class="text-danger ml-1">{{$message}}</div>
                        @enderror
                </div>
                <div class="form mb-3">
                  <label for="foto" class="form-label">Foto</label>
                  <input id="foto" type="file" class="form-control @error('foto') is-invalid @enderror" name="foto"
                      placeholder="Masukkan foto Kandidat..." value="{{ old('foto') }}" required></textarea>
                      @error('foto')
                        <div class="text-danger ml-1">{{$message}}</div>
                     @enderror
              </div>
            </div>
            <div class="modal-footer bg-whitesmoke br">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-primary" id="simpan">Simpan</button>
          </div>
        </form>
      </div>
  </div>
</div>