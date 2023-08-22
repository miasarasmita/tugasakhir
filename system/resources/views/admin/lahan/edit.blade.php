@extends('layout.app')
@section('content')
@foreach ($lahan as $d) @endforeach
<div class="container-fluid">

    <div class="row row-card-no-pd">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">EDIT DATA LAHAN</h2>
                </div>
                <div class="card-body ">
                    <form action="{{ url('admin/lahan/editAction', $d->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Pemilik</label>
                                    <select name="id_pemilik" class="form-control">
                                        <option value="">--- Pilih ----</option>
                                        @foreach ($pemilik as $item)
                                            <option value="{{ $item->id }}" @if ($d->pemilik->id == $item->id)
                                                selected
                                            @endif>{{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Kategori Lahan</label>
                                    <select name="kategori_lahan" class="form-control">
                                        <option value="">--- Pilih ----</option>
                                        <option value="Pertanian" @if ($d->kategori_lahan == "Pertanian") selected @endif>Pertanian</option>
                                        <option value="Perkebunan" @if ($d->kategori_lahan == "Perkebunan") selected @endif>Perkebunan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Luas Lahan</label>
                                    <div class="form-group-doubleselect d-flex">
                                        <input type="number" name="luas" value="{{ $d->luas }}" class="form-control" placeholder="Luas ..." required autocomplete="off">
                                        <select name="satuan_luas" id="" class="form-control">
                                            <option value="Meter" @if ($d->satuan_luas == "Meter") selected @endif>Meter</option>
                                            <option value="Kilo Meter" @if ($d->satuan_luas == "Kilo Meter") selected @endif>Kilo Meter</option>
                                            <option value="Hektare" @if ($d->satuan_luas == "Hektare") selected @endif>Hektare</option>
                                        </select>
                                    </div>
                                </div>
                               
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Gambar lahan</label>
                                    <input type="file" name="gambar" class="form-control" placeholder="Gambar ..." autocomplete="off">
                                </div>
                               
                            </div>
                            <div class="col-md-3">
                                <div class="form-group" data-toggle="modal" data-target="#modalOpenMaps">
                                    <label>Lokasi</label>
                                    <input type="text" name="lokasi" id="alamat" value="{{ $d->lokasi }}"  class="form-control" placeholder="Lokasi ..." required autocomplete="off" readonly>
                                    <input type="hidden" name="lat" id="latdata" value="{{ $d->lat }}" class="form-control" placeholder="Lokasi ...">
                                    <input type="hidden" name="lng" id="lngdata" value="{{ $d->lng }}" class="form-control" placeholder="Lokasi ...">
                                    <input type="hidden" name="kategori" id="kategori" value="{{ $d->kategori }}" class="form-control" placeholder="Kategori ...">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Banyak pengairan</label>
                                    <input type="text" name="banyak_pengairan" value="{{ $d->pengairan[0]->banyak_pengairan }}" class="form-control" placeholder="Banyak pengairan ..." required autocomplete="off">
                                </div>
                            </div>
                            
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Tekstur Tanah</label>
                                    <input type="text" name="tekstur" value="{{ $d->tanah[0]->tekstur }}" class="form-control" placeholder="Teksur tanah ..." required autocomplete="off">
                                </div>
                            </div>
                           
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Ph Tanah</label>
                                    <input type="text" name="ph_tanah" value="{{ $d->tanah[0]->ph_tanah }}" class="form-control" placeholder="Ph Tanah ..." required autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="d-flex items-center justify-content-center mt-5">
                                    <a href="{{ url('admin/lahan') }}"  class="btn btn-secondary">BATAL</a>
					                <button type="submit" class="btn btn-primary mx-2">EDIT</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
               
            </div>
        </div>
    </div>
</div>



    <!-- Modal -->
	<div class="modal fade " id="modalOpenMaps" tabindex="-1" role="dialog" aria-labelledby="modalUpdatePro" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
            <form action="{{ url('admin/lahan/add') }}" method="post">
                @csrf
			<div class="modal-content">
				<div class="modal-header">
                    <div class="row">
                        <div class="col-md-12">
                            <h6 class="modal-title mb-3">TITIK LOKASI LAHAN</h6>
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control" readonly id="latmap" placeholder="Latitude ...">
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control" readonly id="lngmap" placeholder="Longitude ...">
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" readonly id="lokasimap" placeholder="Lokasi ...">
                        </div>
                    </div>
				</div>
				<div class="modal-body">									
                    <div class="row">
                        <div class="col-md-12">
                            <div class="map" id="maps" style="width: 100%;height:300px"></div>
                        </div>
                    </div>
				</div>
				<div class="modal-footer text-center">
					<button type="button" class="btn btn-primary" data-dismiss="modal">KONFIRMASI LOKASI</button>
				</div>
			</div>
            </form>
		</div>
	</div>
    <script src="{{ url('public') }}/assets/js/core/jquery.3.2.1.min.js"></script>
    {{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA1MgLuZuyqR_OGY3ob3M52N46TDBRI_9k&libraries=places&callback=initMap" defer></script> --}}
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA1MgLuZuyqR_OGY3ob3M52N46TDBRI_9k&libraries=places&callback=initMap"  async defer></script>
    <script>
        var map;
function initMap() {
            var latitude = -1.4407091;
			var longitude = 112.6655293;
			var myLatLng = {lat: latitude, lng: longitude};

			map = new google.maps.Map(document.getElementById('maps'), {
			  center: myLatLng,
			  zoom: 5.75,
              mapTypeControl: false,
			});

           

            var count = 0;
            
			google.maps.event.addListener(map,'click',function(event) {

                if(count++ <= 0){
                    var marker = new google.maps.Marker({
                        position: event.latLng, 
                        map: map, 
                        title: event.latLng.lat()+', '+event.latLng.lng(),
                        draggable:true,
                        animation: google.maps.Animation.DROP,
                    });

                    document.getElementById("latdata").value = event.latLng.lat();
                    document.getElementById("lngdata").value = event.latLng.lng();
                    document.getElementById("latmap").value = event.latLng.lat();
                    document.getElementById("lngmap").value = event.latLng.lng();

                    var url = 'https://maps.googleapis.com/maps/api/geocode/json?address=' + event.latLng.lat() + ',' + event.latLng.lng() + '&key=AIzaSyA1MgLuZuyqR_OGY3ob3M52N46TDBRI_9k';
                    $.get(url, function(data){
                        var newAlamat = data.results[0].address_components[2].short_name;
                        document.getElementById("kategori").value = newAlamat;
                        document.getElementById("alamat").value = data.results[0].formatted_address;
                        document.getElementById("lokasimap").value = data.results[0].formatted_address;
                    })

                    google.maps.event.addListener(marker, 'dragend', function (event) {
                        
                        document.getElementById("latdata").value = event.latLng.lat();
                    document.getElementById("lngdata").value = event.latLng.lng();
                    document.getElementById("latmap").value = event.latLng.lat();
                    document.getElementById("lngmap").value = event.latLng.lng();
                        var url = 'https://maps.googleapis.com/maps/api/geocode/json?address=' + event.latLng.lat() + ',' + event.latLng.lng() + '&key=AIzaSyA1MgLuZuyqR_OGY3ob3M52N46TDBRI_9k';
                        $.get(url, function(data){
                            var newAlamat = data.results[0].address_components[2].short_name;
                      
                            document.getElementById("kategori").value = newAlamat;
                            document.getElementById("alamat").value = data.results[0].formatted_address;
                            document.getElementById("lokasimap").value = data.results[0].formatted_address;
                            
                        })

                    });
                }
                
                         
            });
        }
        
    </script>
@endsection