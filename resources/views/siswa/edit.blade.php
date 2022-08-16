@extends('layouts.app')

@section('title', 'Edit Data Siswa')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="section-header-back">
                    <a href="/siswa" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                </div>
                <h1>Edit Data Siswa</h1>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="/siswa/{{ $siswa->id }}/update" novalidate="" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form mb-3">
                                        <input type="hidden" name="user_id" value="{{ $siswa->user_id }}">
                                        <label for="nama" class="form-label">Nama</label>
                                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama"
                                            placeholder="Masukkan Nama Anda..." value="{{ $siswa->nama }}" required>
                                        @error('nama')
                                            <div class="text-danger ml-1">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="form mb-3">
                                        <label for="nis" class="form-label">NIS</label>
                                        <input type="text" class="form-control @error('nis') is-invalid @enderror" id="nis" name="nis"
                                            placeholder="Masukkan nis Anda..." value="{{ $siswa->nis }}" readonly>
                                        @error('nis')
                                            <div class="text-danger ml-1">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="form mb-3">
                                        <label for="kelas" class="form-label">Kelas</label>
                                        <input type="text" class="form-control @error('kelas') is-invalid @enderror" id="kelas" name="kelas"
                                            placeholder="Masukkan kelas Anda..." value="{{ $siswa->kelas }}" required>
                                        @error('kelas')
                                            <div class="text-danger ml-1">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" @error('jenis_kelamin') is-invalid @enderror>Jenis Kelamin</label>
                                        <select class="form-control selectric" name="jenis_kelamin" required>
                                            <option value="Laki-Laki" @if ($siswa->jenis_kelamin == 'Laki-Laki') selected @endif>Laki-Laki</option>
                                            <option value="Perempuan" @if ($siswa->jenis_kelamin == 'Perempuan') selected @endif>Perempuan</option>
                                        </select>
                                        @error('jenis_kelamin')
                                            <div class="text-danger ml-1">{{$message}}</div>
                                         @enderror
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-primary" type="submit" id="simpan">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@stop
