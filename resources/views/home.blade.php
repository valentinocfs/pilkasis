@extends('layouts.template')

@section('title', 'Voting')

@section('content')
    <!-- Section -->
    <div class="container">
        <div class="text-center my-5">
            <h1>Kandidat Ketua OSIS</h1>
        </div>
        <!-- Cards -->
        <section class="cards">
            @if ($data_kandidat)
                @foreach ($data_kandidat as $kandidat)
                    <div class="card card-kandidat border-0 p-3 position-relative">
                        <img src="{{ asset('img/' . $kandidat->foto) }}" class="card-img-top" alt="Kandidat Ketua OSIS" />
                        <div class="card-body mt-2">
                            <h5 class="card-title text-center">{{ $kandidat->nama }}</h5>
                        </div>
                        <div class="mb-4">
                            <button type="button" class="btn btn-out-gray w-100 mb-3" data-toggle="modal" 
                                data-target="#exampleModalCenter{{ $kandidat->nokandidat }}">
                                Visi dan Misi
                            </button>
                            <button class="vote-button btn btn-green w-100" id="voteButton{{ $kandidat->nokandidat }}"
                                nomor-kandidat="{{ $kandidat->nokandidat ?? 'ini' }}"
                                voting-token="{{ $data_siswa->voting_token ?? '0' }}">
                                Vote
                            </button>
                        </div>
                    </div>
                @endforeach
            @endif
        </section>
        <div class="" style="{{ $kandidat ?? "margin-top: 500px;" }}">
            <p class="" style="padding-bottom: 160px;">Kesempatan memilih : <span class="ml-1" style="opacity: 1;">{{ $data_siswa->voting_token ?? '0' }}</span></p>
        </div>
    </div>

    <!-- Modal -->
    @foreach ($data_kandidat as $kandidat)
        <div class="modal fade" id="exampleModalCenter{{ $kandidat->nokandidat }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content px-3 py-2">
                    <div class="modal-header border-0">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <img src="{{ asset('img/' . $kandidat->foto) }}" alt="" class="modal-img-kandidat w-100">
                        <table class="table mt-4 table-kandidat">
                            <tr>
                                <td class="">Nama </td>
                                <td class="p-3">:</td>
                                <td>{{ $kandidat->nama }}</td>
                            </tr>
                            <tr>
                                <td class="">Nomor </td>
                                <td class="p-3">:</td>
                                <td>{{ $kandidat->nokandidat }}</td>
                            </tr>
                            <tr>
                                <td class="">Visi </td>
                                <td class="p-3">:</td>
                                <td>{{ $kandidat->visi }}</td>
                            </tr>
                            <tr>
                                <td class="">Misi </td>
                                <td class="p-3">:</td>
                                <td>{!! $kandidat->misi !!}</td>
                            </tr>
                        </table>
                        <div>
                        </div>
                    </div>
                    <div class="modal-footer border-0">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    @include("layouts.includes.footer")

    <script>
        document.querySelectorAll(".vote-button").forEach((element) => {
            element.addEventListener('click', function(e){
                let no_kandidat = this.getAttribute("nomor-kandidat");
                let voting_token = parseInt(this.getAttribute("voting-token"));

                swal({
                        title: "Apakah kamu yakin memilih kandidat nomor " + no_kandidat + "?",
                        text: "Kesempatan memilih hanya berlaku satu kali",
                        icon: "info",
                        buttons: true,
                    })
                    .then((willDelete) => {
                        if (voting_token >= 1) {
                            if (willDelete) {
                                window.location = "/add_vote/" + no_kandidat;
                            }
                        } else {
                            swal("Kesempatan memilih telah habis!", {
                                icon: "warning",
                            });
                        }
                    });
            })
        })

        document.querySelector("#logoutButton").addEventListener('click', function(e) {
            let user_nama = this.getAttribute('user-nama');

            swal({
                    title: "",
                    text: "Apakah anda ingin keluar dari akun " + user_nama + "?",
                    dangerMode: true,
                    buttons: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location = '/logout';
                    }
                });
        })
    </script>
@endsection
