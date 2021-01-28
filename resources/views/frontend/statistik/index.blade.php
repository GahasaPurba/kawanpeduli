@extends('frontend.template.master')

@section('title', 'Statistik')

@section('content')

<section class="breadcrumb blog_bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb_iner">
                    <div class="breadcrumb_iner_item">
                        <h2>Statistik COVID-19</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="whole-wrap">
    <div class="section-top-border">
        <h1 class="text-center"><b>COVID-19</b> Di Indonesia</h1>
        <br><br>
        <div class="container">
            <div class="row">
                @foreach($dataindonesia as $dataindo)
                <div class="col-md-4 col-xl-4">
                    <div class="card bg-c-blue order-card">
                        <div class="card-block">
                            <h2 class="m-b-20 text-center">Positif</h2>
                            <h2 class="text-center">
                                <img alt="Positif" width="80" src="{{ asset('frontend/img/virus.svg') }}">
                                <span class="counter">{{ $dataindo['positif'] }}</span>
                            </h2>
                            <p class="m-b-0 text-center">Kasus</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-xl-4">
                    <div class="card bg-c-green order-card">
                        <div class="card-block">
                            <h2 class="m-b-20 text-center">Sembuh</h2>
                            <h2 class="text-center">
                                <img alt="Sembuh" width="80" src="{{ asset('frontend/img/health.svg') }}">
                                <span class="counter">{{ $dataindo['sembuh'] }}</span>
                            </h2>
                            <p class="m-b-0 text-center">Kasus</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-xl-4">
                    <div class="card bg-c-pink order-card">
                        <div class="card-block">
                            <h2 class="m-b-20 text-center">Meninggal</h2>
                            <h2 class="text-center">
                                <img alt="Meninggal" width="80" src="{{ asset('frontend/img/death.svg') }}">
                                <span class="counter">{{ $dataindo['meninggal'] }}</span>
                            </h2>
                            <p class="m-b-0 text-center">Kasus</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="section-top-border">
        <h1 class="text-center"><b>COVID-19</b> Di Dunia</h1>
        <br><br>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-xl-4">
                    <div class="card bg-c-blue order-card">
                        <div class="card-block">
                            <h2 class="m-b-20 text-center">Positif</h2>
                            <h2 class="text-center">
                                <img alt="Positif" width="80" src="{{ asset('frontend/img/virus.svg') }}">
                                <span class="counter">{{ $dataglobalpositif['value'] }}</span>
                            </h2>
                            <p class="m-b-0 text-center">Kasus</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-xl-4">
                    <div class="card bg-c-green order-card">
                        <div class="card-block">
                            <h2 class="m-b-20 text-center">Sembuh</h2>
                            <h2 class="text-center">
                                <img alt="Sembuh" width="80" src="{{ asset('frontend/img/health.svg') }}">
                                <span class="counter">{{ $dataglobalsembuh['value'] }}</span>
                            </h2>
                            <p class="m-b-0 text-center">Kasus</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-xl-4">
                    <div class="card bg-c-pink order-card">
                        <div class="card-block">
                            <h2 class="m-b-20 text-center">Meninggal</h2>
                            <h2 class="text-center">
                                <img alt="Meninggal" width="80" src="{{ asset('frontend/img/death.svg') }}">
                                <span class="counter">{{ $dataglobalmeninggal['value'] }}</span>
                            </h2>
                            <p class="m-b-0 text-center">Kasus</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section-top-border">
        <h1 class="text-center"><b>COVID-19</b> Di Indonesia (Berdasarkan Provinsi)</h1>
        <br><br>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-xl-12">
                    <table class="table table-hover" id="myTable1">
                        <thead class="thead-dark">
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Provinsi</th>
                                <th class="text-center">Positif</th>
                                <th class="text-center">Sembuh</th>
                                <th class="text-center">Meninggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dataindonesiaprovinsi as $dip)
                            <tr>
                                <th class="text-center">{{ $loop->iteration }}</th>
                                <td>{{ $dip['attributes']['Provinsi'] }}</td>
                                <td class="text-center">{{ $dip['attributes']['Kasus_Posi'] }}</td>
                                <td class="text-center">{{ $dip['attributes']['Kasus_Semb'] }}</td>
                                <td class="text-center">{{ $dip['attributes']['Kasus_Meni'] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="section-top-border">
        <h1 class="text-center"><b>COVID-19</b> Di Dunia (Berdasarkan Negara)</h1>
        <br><br>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-xl-12">
                    <table class="table table-hover" id="myTable2">
                        <thead class="thead-dark">
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Negara</th>
                                <th class="text-center">Positif</th>
                                <th class="text-center">Dirawat</th>
                                <th class="text-center">Sembuh</th>
                                <th class="text-center">Meninggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dataglobalnegara as $dgn)
                            <tr>
                                <th class="text-center">{{ $loop->iteration }}</th>
                                <td>{{ $dgn['attributes']['Country_Region'] }}</td>
                                <td class="text-center">{{ $dgn['attributes']['Confirmed'] }}</td>
                                <td class="text-center">{{ $dgn['attributes']['Active'] }}</td>
                                <td class="text-center">{{ $dgn['attributes']['Recovered'] }}</td>
                                <td class="text-center">{{ $dgn['attributes']['Deaths'] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')

<script>
    $(document).ready(function() {
        $('#myTable1').DataTable();
    });

    $(document).ready(function() {
        $('#myTable2').DataTable();
    });

</script>

@endsection
