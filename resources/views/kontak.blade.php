@extends('layouts.template')

@section('title', 'Kontak')

@section('content')
    <div class="container">
        <div class="card-header bg-transparent contact-title pl-0 my-5">
            <h3>Kontak Kami</h3>
        </div>
        <div class="contact row pb-5">
            <div class="col-md-6 pb-5">
                <div class="contact-content pr-3">
                    <div class="contact-list">
                        <h4 class="mt-0">Alamat</h4>
                        <p>Jl. Ciliwung No.4 RT.02 RW.03, Kel Cihapit Kec Bandung Wetan, Bandung</p>
                    </div>
                    <div class="contact-list">
                        <h4>Telepon / Fax</h4>
                        <p>(022) 7234285 / 4231857</p>
                    </div>
                    <div class="contact-list">
                        <h4>Email</h4>
                        <a href="mailto:humas@smkn2bandung.sch.id">
                            humas@smkn2bandung.sch.id
                        </a>  
                    </div>
                    <div class="contact-list">
                        <h4>Social Media</h4>
                        <a href="https://www.instagram.com/smkn2bandung/" target="_blank">
                            <span class="fab fa-instagram mr-2"></span>
                            Instagram
                        </a>
                        <a href="https://www.youtube.com/channel/UCfckSk4yztD3xMiVU0xpwEw" target="_blank">
                            <span class="fab fa-youtube mr-2"></span>
                            Youtube
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="contact-maps">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.873883572588!2d107.62081101504081!3d-6.9056811695028895!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e7b56d06cd4f%3A0xb95ab7cac238eb8b!2sSMKN%202%20Kota%20Bandung!5e0!3m2!1sid!2sid!4v1628164192192!5m2!1sid!2sid" width="100%" height="450" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
        <div class="contact-desc"></div>
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