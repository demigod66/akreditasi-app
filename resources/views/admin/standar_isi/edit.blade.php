@extends('template')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="float-right">
                    <a href="{{ url('admin/standar_isi') }}" class="btn btn-warning btn-sm">Kembali</a>
                </div>
            </div>
            <div class="card-body">

                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <form action="{{ url('admin/standar_isi/update', $standar_isi->id) }}" method="POST"
                            class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Jenis Standar Isi</label>
                                <input type="text" class="form-control" name="nama_si" value="{{ $standar_isi->nama_si }}">
                                @error('nama_si')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tahun Ajaran</label>
                                <input type="text" class="form-control" name="tahun" value="{{ $standar_isi->tahun }}">
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
