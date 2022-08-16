<div class="modal fade" id="importSiswa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" action="/siswa/import" enctype="multipart/form-data" novalidate="">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Import Data Siswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modal-body">
                    @csrf
                    <label for="file">Pilih file Excel</label>
                    <div class="form-group">
                        <input type="file" name="file" id="file"
                            class="form-control @if($errors->any()) is-invalid @endif " required>
                        @error('*.1')
                            <div class="text-danger ml-1">{{$message}}</div>
                        @enderror
                        @error('*.2')
                            <div class="text-danger ml-1">{{$message}}</div>
                        @enderror
                        @error('*.3')
                            <div class="text-danger ml-1">{{$message}}</div>
                        @enderror
                        @error('*.4')
                            <div class="text-danger ml-1">{{$message}}</div>
                        @enderror
                        @error('file')
                            <div class="text-danger ml-1">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="{{ url('template/format.xlsx') }}" class="btn btn-success" download>Download Format</a>
                    <input type="submit" class="btn btn-primary" value="Import">
                </div>
            </div>
        </form>
    </div>
</div>
