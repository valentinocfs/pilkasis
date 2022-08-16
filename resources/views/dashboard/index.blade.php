@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Dashboard</h1>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-primary">
                                <i class="far fa-user"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Total Siswa</h4>
                                </div>
                                <div class="card-body">
                                    {{$siswa}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-success">
                                <i class="far fa-user"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Total Kandidat</h4>
                                </div>
                                <div class="card-body">
                                    {{$kandidat}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-danger">
                                <i class="far fa-user"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Total Admin</h4>
                                </div>
                                <div class="card-body">
                                    {{$admin}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-warning">
                                <i class="far fa-user"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Total Voting</h4>
                                </div>
                                <div class="card-body">
                                    {{$voting}} / {{$siswa}}   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <div style="width: 900px; margin: 0px auto;" id="chartSuara"></div>
                </div>

            </div>
        </section>
    </div>

    <script src="{{ asset('admin/assets/js/page/index-0.js') }}"></script>
@endsection

@section('footer')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script>
            Highcharts.chart('chartSuara', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Laporan Voting Suara Kandidat'
            },
            xAxis: {
                categories: {!!json_encode($categories)!!},
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: ''
                }
            },
            tooltip: {
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Suara',
                data: {!!json_encode($dataSuara)!!}

            }]
        });
    </script>

    @include('layouts.includes._logout')    
    
@endsection
