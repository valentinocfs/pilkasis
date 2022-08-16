@extends('layouts.template')

@section('title', 'Profile')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 mt-5">
                <div class="card-profile">
                    <div class="card-header pt-3" style="background: none;">
                        <h3>Informasi Akun</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 p-0 pt-1 my-2">
                                <div class="tab-content no-padding" id="myTab2Content">
                                    <div class="tab-pane fade show active pl-3" id="home4" role="tabpanel" aria-labelledby="home-tab4">
                                        <div class="profile-tab">
                                            <div class="profile-tab-account">
                                                <p>Nama</p>
                                                <p>{{ $data_siswa->nama }}</p>
                                            </div>
                                            <div class="profile-tab-account">
                                                <p>NIS</p>
                                                <p>{{ $data_siswa->nis }}</p>
                                            </div>
                                            <div class="profile-tab-account">
                                                <p>Kata sandi</p>
                                                <p>
                                                @for ($i = 0; $i < strlen($data_siswa->nis); $i++)    
                                                    *
                                                @endfor
                                                </p>
                                            </div>
                                            <div class="profile-tab-account">
                                                <p>Kelas</p>
                                                <p>{{ $data_siswa->kelas }}</p>
                                            </div>
                                            <div class="profile-tab-account">
                                                <p>Jenis kelamin</p>
                                                <p>{{ $data_siswa->jenis_kelamin }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="card-profile-password" style="margin-bottom: 8rem">
                <div class="card-header pt-3" style="background: none;">
                    <h4>Ubah Kata Sandi</h4>
                </div>
                <div class="card-body">
                    <form action="/profile/changePassword/" novalidate="" method="POST">
                        @csrf
                        <div class="form-group row mt-3">
                            <label for="passwordOld" class="col-sm-3 col-form-label">Kata sandi saat ini</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control @error('password_old') is-invalid @enderror"" id="passwordOld" name="password_old" value="{{ old("password_old") }}">
                                @error('password_old')
                                    <div class="text-danger ml-1">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-sm-3 col-form-label">Kata sandi baru</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control @error('password') is-invalid @enderror"" id="password" name="password">
                                @error('password')
                                    <div class="text-danger ml-1">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="passwordConfirm" class="col-sm-3 col-form-label">Konfirmasi kata sandi</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control @error('password_confirm') is-invalid @enderror"" id="passwordConfirm" name="password_confirm">
                                @error('password_confirm')
                                    <div class="text-danger ml-1">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mt-4">
                            <div class="col-sm-12 text-right">
                                <button type="submit" class="btn btn-green">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.includes.footer')
@endsection

@section('footer')
    <script>
         document.querySelector("#logoutButton").addEventListener('click', function(e){
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