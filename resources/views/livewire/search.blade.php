<div>
    <div class="card">
        <div class="card-header">
            <h4>Data Siswa</h4>
            <div class="card-header-form mr-1">
                <form method="GET" action="/siswa">
                    <input type="text" class="form-control" wire:model="searchTerm" placeholder="Cari...">
                </form>
            </div>
            <div class="card-header-form mr-1">
                <button type="button" class="btn btn-primary float-end btn-sm" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                    <i class="fas fa-plus"></i>
                </button>
                <button type="button" class="btn btn-success float-end btn-sm mr-1" data-bs-toggle="modal"
                    data-bs-target="#importSiswa">
                    IMPORT EXCEL
                </button>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover ">
                    <tr>
                        <th>NO</th>
                        <th>NAMA</th>
                        <th>NIS</th>
                        <th>KELAS</th>
                        <th>JENIS KELAMIN</th>
                        <th>STATUS</th>
                        <th>AKSI</th>
                    </tr>
                    @foreach ($data_siswa as $datasiswa => $siswa)
                        <tr>
                            <input type="hidden" value="{{ $siswa->user_id }}">
                            <td>{{ $datasiswa + $data_siswa->firstItem() }}</td>
                            <td>{{ $siswa->nama }}</td>
                            <td>{{ $siswa->nis }}</td>
                            <td>{{ $siswa->kelas }}</td>
                            <td>{{ $siswa->jenis_kelamin }}</td>
                            <td>
                                @if ($siswa->voting_token === 0)
                                    <button class="btn btn-success btn-sm rounded-pill">Sudah Memilih</button>
                                @elseif ($siswa->voting_token !== 0)
                                    <button class="btn btn-danger btn-sm rounded-pill">Belum Memilih</button>
                                @endif
                            </td>
                            <td>
                                <a href="/siswa/{{ $siswa->id }}/edit" class="btn btn-outline-warning btn-sm"><i
                                        class="fas fa-pen"></i></a>
                                {{-- <a href="#" class="btn btn-danger btn-sm delete" siswa-id="{{ $siswa->id }}"
                                    siswa-nama="{{ $siswa->nama }}"><i class="fas fa-trash"></i></a> --}}
                                <button type="button"
                                    wire:click="deleteConfirm({{ $siswa->id }}, '{{ $siswa->nama }}')"
                                    class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <div class="card-footer text-right">
            <nav class="d-inline-block">
                {{ $data_siswa->links('vendor.pagination.livewire-pagination') }}
            </nav>
        </div>
    </div>
</div>
