<?php

namespace App\Http\Controllers;

use App\Models\JenisStandar;
use App\Models\StandarSarana;
use Illuminate\Http\Request;

class StandarSaranaController extends Controller
{

    public function __construct()
    {
        $this->data = new StandarSarana();
    }

    public function index()
    {
        $standar_sarana = $this->data->getJenisStandar();
        return view('admin.standar_sarana.index', compact('standar_sarana'));
    }

    public function create()
    {
        $data = JenisStandar::all();
        return view('admin.standar_sarana.create', compact('data'));
    }

    public function store(Request $request)
    {
        request()->validate([
            'nama_stsarana' => 'required',
            'tahun' => 'required',
            'file' => 'required',
        ]);

        $file = $request->file;
        $new_file = time() . $file->getClientOriginalName();
        $file->move('uploads/standar_sarana/', $new_file);

        StandarSarana::create([
            'nama_stsarana' => $request->nama_stsarana,
            'tahun' => $request->tahun,
            'file' => 'uploads/standar_sarana/' . $new_file
        ]);
        return redirect('/admin/standar_sarana')->with('sukses', 'data berhasil di tambahkan');
    }


    public function edit($id)
    {
        $standar_sarana = StandarSarana::findorfail($id);
        $data = JenisStandar::all();
        return view('admin.standar_sarana.edit', compact('standar_sarana', 'data'));
    }

    public function update(Request $request, $id)
    {
        request()->validate([
            'nama_stsarana' => 'required',
            'tahun' => 'required'
        ]);

        $standar_sarana = StandarSarana::findorfail($id);

        if ($request->has('file')) {
            $file = $request->file;
            $new_file = time() . $file->getClientOriginalName();
            $file->move('uploads/standar_sarana', $new_file);

            // if ($standar_sarana->file != '') {
            //     unlink(public_path('uploads/standar_sarana/' . $standar_sarana->file));
            // }
        }

        $standar_sarana->nama_stsarana = $request->nama_stsarana;
        $standar_sarana->file = $request->file != '' ? $new_file : $standar_sarana->file;
        $standar_sarana->save();

        return redirect('admin/standar_sarana')->with('sukses', 'data berhasil di ubah');
    }

    public function view($id)
    {
        $standar_sarana = StandarSarana::findorfail($id);
        return view('admin.standar_sarana.view', compact('standar_sarana'));
    }

    public function destroy($id)
    {
        $standar_sarana = StandarSarana::findorfail($id);
        $standar_sarana->delete();

        return redirect('admin/standar_sarana')->with('sukses', 'data berhasil di ubah');
    }
}
