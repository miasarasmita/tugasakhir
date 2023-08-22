@extends('layout.app')
@section('content')
<div class="container-fluid">
    <h4 class="page-title">PERSENTASE LAHAN</h4>
    
    <div class="row ">
        <div class="col-md-12">
            <div class="card">
               
                <div class="card-body ">
                    <div class="table-full-width">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th><center>No.</center></th>
                                    <th><center>LAHAN</center></th>
                                    <th><center>PERSENTASE</center></th>
                                </tr>
                            </thead>
                            <tbody>

                                
                                <tr>
                                    <td><center>1.</center></td>
                                    <td><center>PERTANIAN</center></td>
                                    <td><center>{{ $persentasePertanian }} %</center></td>
                                    
                                </tr>
                                <tr>
                                    <td><center>2.</center></td>
                                    <td><center>PERKEBUNAN</center></td>
                                    <td><center>{{ $persentasePerkebunan }} %</center></td>
                                    
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
               
            </div>
        </div>
    </div>
</div>


@endsection