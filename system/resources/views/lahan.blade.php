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
    <style>
        .mapPeta{
            width: 100vw !important;
            height: 100vh !important;
        }
        .box-persentase{
            position: fixed;
            display: flex;
            flex-direction: row !important;
            align-items: center;
            justify-content: space-between;
            position: fixed;
            bottom: 20px;
            width: 100vw;
            z-index: 9999;
            padding: 12px;
            width: 100%;
        }
        .isi-persentase{
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            width: 175px;
            background: #FFFFFF;
            padding: 24px;
            border-radius: 10px
            
        }
        .isi-persentase span{
            display: block;
            padding: 0;
            margin: 0;
            font-size: 18px !important;
        }
        .isi-persentase b{
            display: block;
            padding: 0;
            margin: 0;
            font-size: 30px !important;
        }
    </style>
</head>
<body>

	<div class="row">
        <div class="col-md-12">
            <div class="card" style="padding: 0 !important">
                <div id="map" class="mapPeta"></div>
            </div>
        </div>
        
    </div>
   
    <div class="box-persentase">
        <div class="isi-persentase">
            <span>PERTANIAN</span>
            <b>{{ $persentasePertanian }} %</b>
        </div>
        <div class="isi-persentase">
            <span>PERKEBUNAN</span>
            <b>{{ $persentasePerkebunan }} %</b>
        </div>
    </div>
</div>
<script src="{{ url('public') }}/assets/js/core/jquery.3.2.1.min.js"></script>
    {{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA1MgLuZuyqR_OGY3ob3M52N46TDBRI_9k&libraries=places&callback=initMap" defer></script> --}}
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA1MgLuZuyqR_OGY3ob3M52N46TDBRI_9k&libraries=places&callback=initMap"  async defer></script>
    <script>
        var map;
        function initMap() {
            var latitude = -2.0383774;
			var longitude = 110.8653718;
			var myLatLng = {lat: latitude, lng: longitude};

			map = new google.maps.Map(document.getElementById('map'), {
			  center: myLatLng,
			  zoom: 8.75,
              mapTypeControl: false,
			});

            @foreach ($lahan as $item)


            var contentString = `
                <div style="width: 300px">
                    <img src="{{ url('public') }}/{{ $item->gambar }}" style="width: 200px;height:150px;border-radius: 10px"/>
                    <div style="margin-top: 12px;width: 200px">
                        <p style="color: #475569 !important">{{$item->lokasi}}</p>
                        <a href="{{ url('pengguna/lahan/detail', $item->id) }}" class="btn btn-block btn-primary">Lihat lokasi</a>
                    </div>
                </div>
            `;
            var lt = {{ $item->lat }};
			var lg = {{ $item->lng }};
			var myLtlG = {lat: lt, lng: lg};

            var infowindow = new google.maps.InfoWindow({
                content: contentString,
            });
                var marker = new google.maps.Marker({
                    position: myLtlG, 
                    map: map, 
                    draggable:false,
                    animation: google.maps.Animation.DROP,
                });

                marker.addListener("click", () => {
                    infowindow.open({
                    anchor: marker,
                    map,
                    });
                });
            @endforeach
           
        }
        
    </script>
</body>

</html>