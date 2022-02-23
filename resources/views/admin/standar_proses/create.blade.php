@extends('template')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="float-right">
                    <a href="{{ url('admin/standar_proses') }}" class="btn btn-warning btn-sm">Kembali</a>
                </div>
            </div>
            <div class="card-body">

                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <form action="{{ url('/admin/standar_proses/store') }}" method="POST"
                            class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Jenis Standar Proses</label>
                                <input type="text" class="form-control" name="nama_sp">
                                @error('nama_sp')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tahun Ajaran</label>
                                <input type="text" class="form-control" name="tahun" >
                                @error('tahun')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>File</label>
                                <input type="file" class="form-control" name="file" accept=".pdf">
                                @error('file')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            </div>
                        </div>
                            <button type="submit" class="btn btn-info btn-block btn-sm">Simpan</button>
                        </form>

                </div>

            </div>
        </div>
    </div>
</div>

@endsection
