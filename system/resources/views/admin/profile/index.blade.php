@extends('layout.app')
@section('content')
<div class="container-fluid">
    <h4 class="page-title">PROFILE</h4>
    
    <div class="row row-card-no-pd">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body ">
                    <img src="{{ url('public') }}/{{ Auth::guard('admin')->user()->foto }}" alt="user" style="width: 100%;height:400px">
                </div>
               
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body ">
                    <ul>
                        <li>
                            <span class="list-name">Nama</span>
                            <span class="list-dots">:</span>
                            <span class="list-subname">{{ Auth::guard('admin')->user()->nama }}</span>
                        </li>
                        <li>
                            <span class="list-name">Email</span>
                            <span class="list-dots">:</span>
                            <span class="list-subname">{{ Auth::guard('admin')->user()->email }}</span>
                        </li>
                        <li>
                            <span class="list-name">Password</span>
                            <span class="list-dots">:</span>
                            <span class="list-subname">{{ Auth::guard('admin')->user()->password }}</span>
                        </li>
                        
                    </ul>
                </div>
                <div class="card-body ">
                    <a href="#update" class="btn btn-primary" data-toggle="modal">UPDATE</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="modalUpdatePro" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ url('admin/profile/update', Auth::guard('admin')->user()->id) }}" method="post" enctype="multipart/form-data">
            @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">UPDATE PROFILE</h6>
            </div>
            <div class="modal-body">									
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama" value="{{ Auth::guard('admin')->user()->nama }}" class="form-control" placeholder="Nama ..." required autocomplete="off">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" value="{{ Auth::guard('admin')->user()->email }}" class="form-control" placeholder="Telepon ..." required autocomplete="off">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Password</label>
                            <input type="text" name="password" class="form-control" placeholder="Password ..." autocomplete="off">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Foto</label>
                            <input type="file" name="foto" class="form-control" placeholder="Foto ..." autocomplete="off">
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

@endsection