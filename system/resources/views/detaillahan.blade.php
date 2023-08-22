<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>SIPLA</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
	<link rel="stylesheet" href="{{ url('public') }}/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
	<link rel="stylesheet" href="{{ url('public') }}/assets/css/ready.css">
	<link rel="stylesheet" href="{{ url('public') }}/assets/css/demo.css">
</head>
<body>
<style>
    .list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .list li .list-header {
        display: block;
        padding: 0;
        margin: 24px 0 !important;
        font-size: 18px;
        font-weight: 500;
        text-transform: uppercase
    }

    .list .list-items {
        display: flex;
        align-items: center;
        font-size: 16px;
        font-weight: 500;
        padding: 12px 0;
        border-bottom: 1.6px solid #dedede;
    }

    .list .list-items .name {
        display: block;
        width: 100px
    }

    .list .list-items .dots {
        display: flex;
        width: 50px;
        align-items: center;
        justify-content: center
    }
</style>
@foreach ($lahan as $l)
@endforeach
<div class="row row-card-no-pd">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header ">
                <div class="row">
                    <div class="col-md-12">
                        <div id="maps" style="width: 100%;height: 400px"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <ul class="list">
                            <li>
                                <span class="list-header">
                                    <img src="{{ url('public') }}/{{ $l->gambar }}" alt="" style="width: 100%;height:250px">
                                </span>
                            </li>
                            <li>
                                <span class="list-header">Pemilik</span>
                            </li>
                            <li class="list-items">
                                <span class="name">Nama</span>
                                <span class="dots">:</span>
                                <span class="subname">{{ $l->pemilik->nama }}</span>
                            </li>
                            <li class="list-items">
                                <span class="name">Telepon</span>
                                <span class="dots">:</span>
                                <span class="subname">{{ $l->pemilik->tlp }}</span>
                            </li>
                            <li class="list-items">
                                <span class="name">Alamat</span>
                                <span class="dots">:</span>
                                <span class="subname">{{ $l->pemilik->alamat }}</span>
                            </li>
                            <li>
                                <span class="list-header">Lahan</span>
                            </li>
                            <li class="list-items">
                                <span class="name">Jenis Lahan</span>
                                <span class="dots">:</span>
                                <span class="subname">{{ $l->kategori_lahan}}</span>
                            </li>
                            <li class="list-items">
                                <span class="name">Luas</span>
                                <span class="dots">:</span>
                                <span class="subname">{{ $l->luas.' '.$l->satuan_luas }}</span>
                            </li>
                            <li class="list-items">
                                <span class="name">Lokasi</span>
                                <span class="dots">:</span>
                                <span class="subname">{{ $l->lokasi }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <ul class="list">
                            @if (count($l->tanah) > 0)
                                <li>
                                    <span class="list-header">TANAH</span>
                                </li>
                                <li class="list-items">
                                    <span class="name">Tekstur</span>
                                    <span class="dots">:</span>
                                    <span class="subname">{{ $l->tanah[0]->tekstur }}</span>
                                </li>
                                <li class="list-items">
                                    <span class="name">Kedalaman</span>
                                    <span class="dots">:</span>
                                    <span class="subname">{{ $l->tanah[0]->kedalaman }} Meter</span>
                                </li>
                                <li class="list-items">
                                    <span class="name">Ph Tanah</span>
                                    <span class="dots">:</span>
                                    <span class="subname">{{ $l->tanah[0]->ph_tanah }} H+</span>
                                </li>
                            @endif
                        </ul>
                        

                    </div>
                    <div class="col-md-6">
                        <ul class="list">
                            @if (count($l->pengairan) > 0)
                                <li>
                                    <span class="list-header">PENGAIRAN</span>
                                </li>
                                <li class="list-items">
                                    <span class="name">Banyak Pengairan</span>
                                    <span class="dots">:</span>
                                    <span class="subname">{{ $l->pengairan[0]->banyak_pengairan }}</span>
                                </li>
                               
                            @endif
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<script src="{{ url('public') }}/assets/js/core/jquery.3.2.1.min.js"></script>
    {{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA1MgLuZuyqR_OGY3ob3M52N46TDBRI_9k&libraries=places&callback=initMap" defer></script> --}}
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA1MgLuZuyqR_OGY3ob3M52N46TDBRI_9k&libraries=places&callback=initMap"
        async defer></script>
    <script>
        var map;

        function initMap() {
            var latitude = {{ $l->lat }};
            var longitude = {{ $l->lng }};
            var myLatLng = {
                lat: latitude,
                lng: longitude
            };

            map = new google.maps.Map(document.getElementById('maps'), {
                center: myLatLng,
                zoom: 13,
                mapTypeControl: false,
            });

            var marker = new google.maps.Marker({
                position: myLatLng,
                map: map,
                title: `{{ $l->lokasi }}`,
                draggable: true,
                animation: google.maps.Animation.DROP,
            });
        }
    </script>