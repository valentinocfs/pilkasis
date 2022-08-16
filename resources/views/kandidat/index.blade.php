@extends('layouts.app')

@section('title', 'Kandidat')

@section('content')

    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Kandidat</h1>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Data Kandidat</h4>
                                <div class="card-header-form mr-1">
                                    <form method="GET" action="/kandidat">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="cari" placeholder="Cari...">
                                            <div class="input-group-btn">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-header-form mr-1">
                                    <button type="button" class="btn btn-primary float-end btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#insert">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <tr>
                                            <th>NO KANDIDAT</th>
                                            <th>NAMA</th>
                                            <th>PEROLEHAN SUARA</th>
                                            <th>AKSI</th>
                                        </tr>
                                        @foreach ($data_kandidat as $data)
                                            <tr>
                                                <input type="hidden" value="{{ $data->id }}">
                                                <td>{{ $data->nokandidat }}</td>
                                                <td>{{ $data->nama }}</td>
                                                <td>{{ $data->suara }}</td>
                                                <td>
                                                    <a href="/kandidat/{{ $data->id }}/edit"
                                                        class="btn btn-outline-warning btn-sm"><i
                                                            class="fas fa-pen"></i></a>
                                                    <a href="#" class="btn btn-danger btn-sm delete"
                                                        kandidat-id="{{ $data->id }}"
                                                        kandidat-nama="{{ $data->nama }}"><i class="fas fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <nav class="d-inline-block">
                                    {{ $data_kandidat->links('pagination::bootstrap-4') }}
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    @include('kandidat.modal_add')

@stop

@section('footer')

    <script src="https://cdn.ckeditor.com/ckeditor5/29.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
    <script>
        $('.delete').click(function() {
            var kandidat_id = $(this).attr('kandidat-id');
            var kandidat_nama = $(this).attr('kandidat-nama');
            swal({
                    title: "Yakin ?",
                    text: "Hapus Data " + kandidat_nama + " ??",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location = "/kandidat/" + kandidat_id + "/delete";
                    } else {
                        swal("Data Tidak jadi di Hapus.");
                    }
                });
        });
    </script>

    @include('layouts.includes._logout')

@endsection
