<?php

namespace App\Http\Controllers;

use App\Models\JenisStandar;
use App\Models\StandarPenilaian;
use Illuminate\Http\Request;


class StandarPenilaianController extends Controller
{

    public function __construct()
    {
        $this->data = new StandarPenilaian();
    }

    public function index()
    {
        $standar_penilaian = $this->data->getJenisStandar();
        return view('admin.standar_penilaian.index', compact('standar_penilaian'));
    }

    public function create()
    {
        $data = JenisStandar::all();
        return view('admin.standar_penilaian.create', compact('data'));
    }

    public function store(Request $request)
    {
        request()->validate([
            'nama_penilaian' => 'required',
            'tahun' => 'required',
            'file' => 'required',
        ]);

        $file = $request->file;
        $new_file = time() . $file->getClientOriginalName();
        $file->move('uploads/standar_penilaian/', $new_file);

        StandarPenilaian::create([
            'nama_penilaian' => $request->nama_penilaian,
            'tahun' => $request->tahun,
            'file' => 'uploads/standar_penilaian/' . $new_file
        ]);
        return redirect('/admin/standar_penilaian')->with('sukses', 'data berhasil di tambahkan');
    }


    public function edit($id)
    {
        $standar_penilaian = StandarPenilaian::findorfail($id);
        $data = JenisStandar::all();
        return view('admin.standar_penilaian.edit', compact('standar_penilaian', 'data'));
    }

    public function update(Request $request, $id)
    {
        request()->validate([
            'nama_penilaian' => 'required',
            'tahun' => 'required'
        ]);

        $standar_penilaian = StandarPenilaian::findorfail($id);

        if ($request->has('file')) {
            $file = $request->file;
            $new_file = time() . $file->getClientOriginalName();
            $file->move('uploads/standar_penilaian', $new_file);

            // if ($standar_penilaian->file != '') {
            //     unlink(public_path('uploads/standar_penilaian/' . $standar_penilaian->file));
            // }
        }

        $standar_penilaian->nama_penilaian = $request->nama_penilaian;
        $standar_penilaian->file = $request->file != '' ? $new_file : $standar_penilaian->file;
        $standar_penilaian->save();

        return redirect('admin/standar_penilaian')->with('sukses', 'data berhasil di ubah');
    }

    public function view($id)
    {
        $standar_penilaian = StandarPenilaian::findorfail($id);
        return view('admin.standar_penilaian.view', compact('standar_penilaian'));
    }

    public function destroy($id)
    {
        $standar_penilaian = StandarPenilaian::findorfail($id);
        $standar_penilaian->delete();

        return redirect('admin/standar_penilaian')->with('sukses', 'data berhasil di ubah');
    }
}
