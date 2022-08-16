@extends('layouts.app')

@section('title', 'Kandidat')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="section-header-back">
                    <a href="/kandidat" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                </div>
                <h1>Data Kandidat</h1>
            </div>
            <div class="section-body">
                <div class="row mt-sm-4">
                    <div class="col-12 col-md-12 col-lg-5">
                        <div class="card profile-widget">
                            <div class="profile-widget-header">
                                <img alt="image" src="{{ url('img/' . $kandidat->foto) }}"
                                    class="rounded-circle profile-widget-picture img-kandidat"
                                    style="height: 100px; object-fit: cover; margin: "
                                    >
                            </div>
                            <div class="profile-widget-description">
                                <div class="profile-widget-name ">{{ $kandidat->nama }} <div
                                        class="text-muted d-inline font-weight-normal">
                                        <div class="slash"></div> {{ $kandidat->nokandidat }}
                                    </div>
                                </div>
                                <hr>
                                <div class="profile-widget-content">
                                    <h6 class="mt-4">Visi</h6>
                                    <p class="ml-4"> {{ $kandidat->visi }}</p>
                                    <h6 class="mt-4">Misi</h6>
                                    <div class="misi-kandidat">{!! $kandidat->misi !!}</div>
                                </div>
                            </div>
                            <div class="card-footer text-center">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-7 mt-1">
                        <div class="card">
                            <form action="/kandidat/{{ $kandidat->id }}/update" novalidate="" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-header">
                                    <h4>Edit Data Kandidat</h4>
                                </div>
                                <div class="card-body">

                                    <input type="hidden" name="user_id" value="{{ $kandidat->id }}">

                                    <div class="form-group mb-3">
                                        <label for="nama" class="form-label">Nama</label>
                                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama"
                                            placeholder="Masukkan Nama Kandidat..." value="{{ $kandidat->nama }}"
                                            required>
                                            @error('nama')
                                             <div class="text-danger ml-1">{{$message}}</div>
                                            @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="nokandidat" class="form-label">Nomor Kandidat</label>
                                        <input id="nokandidat" type="number" class="form-control @error('nokandidat') is-invalid @enderror" name="nokandidat"
                                            placeholder="Masukkan Nomor Kandidat..." value="{{ $kandidat->nokandidat }}"
                                            readonly>
                                            @error('nokandidat')
                                                <div class="text-danger ml-1">{{$message}}</div>
                                            @enderror
                                    </div>
                                    <div class="form mb-3">
                                        <label for="visi" class="form-label">Visi</label>
                                        <input type="text" class="form-control @error('visi') is-invalid @enderror" id="visi" name="visi"
                                            placeholder="Masukkan Visi Kandidat..." value="{{ $kandidat->visi }}"
                                            required>
                                            @error('visi')
                                                <div class="text-danger ml-1">{{$message}}</div>
                                            @enderror
                                    </div>
                                    <div class="form mb-3">
                                        <label for="editor" class="form-label">Misi</label>
                                        <textarea class="form-control @error('misi') is-invalid @enderror" id="editor" name="misi"
                                            placeholder="Masukkan Misi Kandidat..."
                                            required>{!! $data = str_replace('&', '&amp;', $kandidat->misi) !!}</textarea>
                                            @error('misi')
                                            <div class="text-danger ml-1">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="form mb-3">
                                        <label for="foto" class="form-label">Foto</label>
                                        <input id="foto" type="file" class="form-control @error('foto') is-invalid @enderror" name="foto"
                                            placeholder="Masukkan foto Kandidat..."></textarea>
                                            @error('foto')
                                                <div class="text-danger ml-1">{{$message}}</div>
                                            @enderror
                                    </div>
                                </div>
                                <div class="modal-footer bg-whitesmoke br">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#update{{ $kandidat->id }}">Simpan</button>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>
    @include('kandidat.modal_edit')
@stop

@section('footer')
    @include('layouts.includes._logout')

    <script src="https://cdn.ckeditor.com/ckeditor5/29.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
