@extends('template')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-right">
                        <a href="{{ url('admin/standar_penilaian/create') }}" class="btn btn-primary btn-sm">Tambah
                            Data</a>
                    </div>
                </div>

                @if (session('sukses'))
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="alert alert-success alert-sm alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-hidden="true">&times;</button>
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
                                <th>Standar Penilaian</th>
                                <th>File</th>
                                <th>Ditambahkan</th>
                                <th width="10%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($standar_penilaian as $sp)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $sp->jenis_standar }}</td>
                                    <td>{{ $sp->tahun }}</td>
                                    <td>{{ $sp->created_at }}</td>
                                    <td><a href="{{ url('/admin/standar_penilaian/view', $sp->id) }}"
                                            class="btn btn-warning btn-sm"><i class="fas fa-file"></i></a>
                                    </td>
                                    <td>
                                        <a href="{{ url('admin/standar_penilaian/edit', $sp->id) }}"
                                            class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                        <a href="{{ url('admin/standar_penilaian/destroy', $sp->id) }}"
                                                class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
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
