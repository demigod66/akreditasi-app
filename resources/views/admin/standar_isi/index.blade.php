@extends('template');
@section('content')


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="float-right">
                </div>
            </div>

            @if(session('sukses'))
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="alert alert-success alert-sm alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h5><i class="icon fas fa-check"></i> {{ session('sukses') }}!</h5>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width="10%">No</th>
                            <th>Standar Isi</th>
                            <th>File</th>
                            <th width="10%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $standar_isi as $si )
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $si->nama_si }}</td>
                            <td><a href="{{ url('/admin/standar_isi/view') }}" class="btn btn-warning btn-sm"><i
                                        class="fas fa-file"></i></a>
                            </td>
                            <td>
                                <a href="{{ url('admin/standar_isi/edit', $si->id) }}" class="btn btn-primary btn-sm"><i
                                        class="fas fa-edit"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection
