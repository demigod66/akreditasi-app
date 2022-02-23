@extends('template')
@section('content')


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="float-right">
                    <a href="{{ url('admin/standar_penilaian') }}" class="btn btn-warning btn-sm">Kembali</a>
                </div>
            </div>
            <div class="card-body">

                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <form action="{{ url('admin/standar_penilaian/store') }}" method="POST"
                            class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Standar Penilaian</label>
                                <input type="text" class="form-control" name="nama_penilaian">
                                @error('nama_penilaian')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Tahun</label>
                                <input type="text" class="form-control" name="tahun">
                                @error('tahun')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                            <div class="form-group">
                                <label>File</label>
                                <input type="file" class="form-control" name="file" accept=".pdf">
                                @error('file')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-info btn-sm btn-block">Simpan</button>
                        </form>

                </div>

            </div>
        </div>
    </div>
</div>


@endsection
