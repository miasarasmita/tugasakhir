@extends('layout.app')
@section('content')
<div class="container-fluid">
    <h4 class="page-title">PEMILIK LAHAN</h4>
    
    <div class="row row-card-no-pd">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-right">
                    <a href="#tambah" class="btn btn-success" data-toggle="modal">
                        <i class="la la-plus"></i>
                    </a>
                </div>
                <div class="card-body ">
                    <div class="table-full-width">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th><center>No</center></th>
                                    <th><center>Nama</center></th>
                                    <th><center>Telepon</center></th>
                                    <th><center>Alamat</center></th>
                                    <th><center>Aksi</center></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list as $pemilik)
                                <tr>
                                    
                                    <td><center>{{ $loop->iteration }}</center></td>
                                    <td><center>{{ $pemilik->nama }}</center></td>
                                    <td><center>{{ $pemilik->tlp }}</center></td>
                                    <td><center>{{ $pemilik->alamat }}</center></td>
                                    <td class="td-actions text-center">
                                        <div class="form-button-action">
                                            <a href="#edit{{ $pemilik->id }}" class="btn btn-link btn-simple-primary" data-toggle="modal">
                                                <i class="la la-edit"></i>
                                            </a>
                                            <a href="#hapus{{ $pemilik->id }}" class="btn btn-link btn-simple-danger" data-toggle="modal">
                                                <i class="la la-trash"></i>
                                            </a>
                                           
                                        </div>
                                    </td>
                                </tr>

                                 <!-- Modal Edit -->
                                 <div class="modal fade" id="hapus{{ $pemilik->id }}" tabindex="-1" role="dialog" aria-labelledby="modalUpdatePro" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <form action="{{ url('admin/pemilik/hapus', $pemilik->id) }}" method="post">
                                            @csrf
                                        <div class="modal-content modal-centered text-center">
                                            <div class="modal-body">	
                                                <i class="la la-bell text-danger" style="font-size: 50px;"></i>	
                                                <h5 class="text-danger">Yakin ingin menghapus data ini ?!</h5>							
                                                <p class="mb-5">Data yang telah anda hapus tidak bisa dikembalikan lagi</p>

                                                <button type="button" class="btn btn-success" data-dismiss="modal">BATAL</button>
                                                <button type="submit" class="btn btn-danger">HAPUS</button>
                                            </div>

                                        </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- Modal Edit -->
                                <div class="modal fade" id="edit{{ $pemilik->id }}" tabindex="-1" role="dialog" aria-labelledby="modalUpdatePro" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <form action="{{ url('admin/pemilik/edit', $pemilik->id) }}" method="post">
                                            @csrf
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title">EDIT DATA PEMILIK LAHAN</h6>
                                            </div>
                                            <div class="modal-body">									
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Nama</label>
                                                            <input type="text" name="nama" value="{{ $pemilik->nama }}" class="form-control" placeholder="Nama ..." required autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>No.Telepon</label>
                                                            <input type="text" name="tlp" value="{{ $pemilik->tlp }}" class="form-control" placeholder="Telepon ..." required autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Alamat</label>
                                                            <input type="text" name="alamat" value="{{ $pemilik->alamat }}" class="form-control" placeholder="Alamat ..." required autocomplete="off">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer text-center">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">BATAL</button>
                                                <button type="submit" class="btn btn-primary">UPDATE</button>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
               
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
	<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="modalUpdatePro" aria-hidden="true">
		<div class="modal-dialog" role="document">
            <form action="{{ url('admin/pemilik/add') }}" method="post">
                @csrf
			<div class="modal-content">
				<div class="modal-header">
					<h6 class="modal-title">TAMBAH DATA PEMILIK LAHAN</h6>
				</div>
				<div class="modal-body">									
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="nama" class="form-control" placeholder="Nama ..." required autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>No.Telepon</label>
                                <input type="text" name="tlp" class="form-control" placeholder="Telepon ..." required autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" name="alamat" class="form-control" placeholder="Alamat ..." required autocomplete="off">
                            </div>
                        </div>
                    </div>
				</div>
				<div class="modal-footer text-center">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">BATAL</button>
					<button type="submit" class="btn btn-primary">SIMPAN</button>
				</div>
			</div>
            </form>
		</div>
	</div>
@endsection