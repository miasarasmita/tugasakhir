@extends('layout.app')
@section('content')
<div class="container-fluid">
    <h4 class="page-title">Dashboard</h4>

    <div class="row">
        <div class="col-md-12">
            <div class="card" style="padding: 0 !important">
                <div class="map" id="map" style="width: 100%;height: 500px"></div>
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

            

            var contentString = `
                <div style="width: 300px">
                    <img src="{{ url('public') }}/{{ $item->gambar }}" style="width: 300px;height:150px;border-radius: 10px"/>
                    <div style="margin-top: 12px">
                        <p style="color: #475569 !important">{{$item->lokasi}}</p>
                        <a href="{{ url('admin/lahan/detail', $item->id) }}" class="btn btn-block btn-primary">Lihat lokasi</a>
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
@endsection