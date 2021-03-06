@extends('template')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-right">
                        <a href="{{ url('admin/standar_sarana') }}" class="btn btn-warning btn-sm">Kembali</a>
                    </div>
                </div>
                <div class="card-body">

                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <form action="{{ url('admin/standar_sarana/update', $standar_sarana->id) }}"
                                method="POST" class="form-horizontal" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Jenis Standar</label>
                                    <select name="nama_stsarana" id="nama_stsarana" class="form-control">
                                        @foreach ($data as $js)
                                            <option value="{{ $js->id }}"
                                                {{ $js->id == $standar_sarana->nama_stsarana }}>
                                                {{ $js->jenis_standar }}</option>
                                        @endforeach
                                    </select>
                                    @error('nama_stsarana')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tahun Ajaran</label>
                                <select name="tahun" id="tahun" class="form-control">
                                    @foreach ($data as $js)
                                        <option value="{{ $js->id }}" {{ $js->id == $standar_sarana->tahun }}>
                                            {{ $js->tahun }}</option>
                                    @endforeach
                                </select>
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
                        <button type="submit" class="btn btn-info btn-sm btn-block">Simpan</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
@endsection
