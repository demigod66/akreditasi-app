@extends('template')
@section('content')


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="float-right">
                    <a href="{{ url('admin/standar_pengelolaan') }}" class="btn btn-warning btn-sm">Kembali</a>
                </div>
            </div>
            <div class="card-body">

                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <form action="{{ url('admin/standar_pengelolaan/update', $standar_pengelolaan->id) }}"
                            method="POST" class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Standar Pengelolaan</label>
                                <input type="text" class="form-control" name="nama_stpengelolaan"
                                    value="{{ $standar_pengelolaan->nama_stpengelolaan }}">
                                @error('nama_stpengelolaan')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>File</label>
                                <input type="file" class="form-control" name="file" accept=".pdf,.docx">
                                @error('file')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-info">Simpan</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


@endsection
