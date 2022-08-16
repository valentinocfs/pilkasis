@extends('layouts.app')

@section('title', 'Siswa')

@section('header')
@livewireStyles()
@endsection

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Siswa</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    @livewire('search')
                </div>
            </div>
        </div>
    </section>
</div>
@include('layouts.includes._modal')
@include('siswa._modal')
@stop

@section('footer')
<script>
    window.addEventListener('swal:confirm', event => {
        swal({
                title: event.detail.title,
                text: event.detail.text,
                icon: event.detail.type,
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.livewire.emit('delete', event.detail.id);
                    swal('Data Berhasil dihapus!', '', 'success')
                }
            });
    });
</script>
@livewireScripts()
@include('layouts.includes._logout')
@endsection
