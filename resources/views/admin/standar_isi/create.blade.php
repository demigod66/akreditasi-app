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
                        <form action="{{ url('admin/standar_isi/store') }}" method="POST"
                            class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Jenis Standar Isi</label>
                                <select name="nama_si" id="nama_si" class="form-control">
                                    <option value="Program tahunan/program semester.">Program tahunan/program semester.</option>
                                    <option value="Silabus">Silabus</option>
                                    <option value="RPP">RPP</option>
                                    <option value="Buku Siswa & Guru">Buku Siswa & Guru</option>
                                    <option value="Lembar tugas terstruktur dan kegiatan mandiri untuk siswa">Lembar tugas terstruktur dan kegiatan mandiri untuk siswa</option>
                                    <option value="Handout">Handout</option>
                                    <option value="Alat evaluasi dan buku nilai">Alat evaluasi dan buku nilai</option>
                                </select>
                                @error('nama_si')
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
