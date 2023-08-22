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
        .header-app{
            display: flex;
            align-items: center;
            position: absolute;
            top: 0;
            left: 0;
            width: 100vw;
            background: #0284c7;
            z-index: 999;
            padding:  34px 24px 12px 24px;
            height: 57px;
        }
        .page-title{
            color: white !important;
            display: block;
            padding: 0;
            margin: 0;
        }
    </style>
</head>
<body>
	<div class="wrapper">
        
        
			


        <div class="content">
            <div class="container-fluid">
                <div class="header-app">
                    <h4 class="page-title">SIPLA</h4>
                </div>
            
                <div class="row">
                    <div class="col-md-12">
                        <div class="card" style="padding: 0 !important">
                            <div class="map" id="map" style="width: 100%;height:100vh"></div>
                        </div>
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
    <?php
        $contentString = '<div><p style="width: 300px !important;display:block">' . $item->lokasi . '</p><a href="' . url('pengguna/detaillahan', $item->id) . '" class="btn btn-primary">Lihat lokasi</a></div>';
    ?>
    var contentString{{$item->id}} = '<?php echo addslashes($contentString); ?>';
    var lt{{$item->id}} = <?php echo $item->lat; ?>;
    var lg{{$item->id}} = <?php echo $item->lng; ?>;
    var myLtlG{{$item->id}} = { lat: parseFloat(lt{{$item->id}}), lng: parseFloat(lg{{$item->id}}) };

    var infowindow{{$item->id}} = new google.maps.InfoWindow({
        content: contentString{{$item->id}},
    });

    var marker{{$item->id}} = new google.maps.Marker({
        position: myLtlG{{$item->id}}, 
        map: map, 
        draggable: false,
        animation: google.maps.Animation.DROP,
    });

    marker{{$item->id}}.addListener("click", () => {
        infowindow{{$item->id}}.open(map, marker{{$item->id}});
    });
@endforeach

                       
                    }
                    
                </script>
        </div>
	</div>
	
</body>
<script src="{{ url('public') }}/assets/js/core/jquery.3.2.1.min.js"></script>
<script src="{{ url('public') }}/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="{{ url('public') }}/assets/js/core/popper.min.js"></script>
<script src="{{ url('public') }}/assets/js/core/bootstrap.min.js"></script>

<script src="{{ url('public') }}/assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>

<script src="{{ url('public') }}/assets/js/plugin/chart-circle/circles.min.js"></script>
<script src="{{ url('public') }}/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
<script src="{{ url('public') }}/assets/js/ready.min.js"></script>
@include('layout.notif')
</html>