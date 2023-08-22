@extends('layout.app')
@section('content')
<div class="container-fluid">
    <h4 class="page-title">LAHAN</h4>
    
    <div class="row ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-right">
                    <a href="{{ url('admin/lahan/add') }}" class="btn btn-success">
                        <i class="la la-plus"></i>
                    </a>
                </div>
                <div class="card-body ">
                    <div class="table-full-width">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th><center>No.</center></th>
                                    <th><center>Pemilik</center></th>
                                    <th><center>Luas</center></th>
                                    <th><center>Lokasi</center></th>
                                    <th><center>Klasifikasi</center></th>
                                    <th><center>Aksi</center></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list as $lahan)
                                <tr>
                                    
                                    <td><center>{{ $loop->iteration }}</center></td>
                                    <td><center>{{ $lahan->pemilik->nama }}</center></td>
                                    <td><center>{{ $lahan->luas.' '. $lahan->satuan_luas }}</center></td>
                                    <td><center>{{ Str::limit($lahan->lokasi, 50) }}</center></td>
                                    <td><center>{{ $lahan->kategori }}</center></td>
                                    <td class="text-center">
                                        <div class="form-button-action">
                                            <a href="{{ url('admin/lahan/detail', $lahan->id) }}" class="btn btn-warning">
                                                <i class="la la-eye"></i>
                                            </a>
                                            <a href="{{ url('admin/lahan/edit', $lahan->id) }}" class="btn btn-primary">
                                                <i class="la la-edit"></i>
                                            </a>
                                            <a href="#hapus{{ $lahan->id }}" class="btn btn-danger" data-toggle="modal">
                                                <i class="la la-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                 <!-- Modal Edit -->
                                <div class="modal fade" id="hapus{{ $lahan->id }}" tabindex="-1" role="dialog" aria-labelledby="modalUpdatePro" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <form action="{{ url('admin/lahan/hapus', $lahan->id) }}" method="post">
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

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
               
            </div>
        </div>
    </div>
</div>


@endsection