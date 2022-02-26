<?php

namespace App\Http\Controllers;

use App\Models\JenisStandar;
use Illuminate\Http\Request;

class JenisStandarController extends Controller
{

    public function index()
    {
        $data = JenisStandar::all();
        return view('admin.jenis_standar.index', compact('data'));
    }

    public function create()
    {
        return view('admin.jenis_standar.create');
    }

    public function store(Request $request)
    {
        request()->validate([
            'jenis_standar' => 'required',
            'tahun' => 'required'
        ]);

        JenisStandar::create([
            'jenis_standar' => $request->jenis_standar,
            'tahun' => $request->tahun
        ]);

        return redirect('/admin/jenis_standar')->with('sukses', 'data berhasil di tambahkan');
    }

    public function edit($id)
    {
        $data = JenisStandar::findorfail($id);
        return view('admin.jenis_standar.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        request()->validate([
            'jenis_standar' => 'required',
            'tahun' => 'required'
        ]);

        $data = JenisStandar::findorfail($id);

        $data->jenis_standar = $request->jenis_standar;
        $data->tahun = $request->tahun;
        $data->save();

        return redirect('/admin/jenis_standar')->with('sukses', 'data berhasil di tambahkan');
    }

    public function destroy($id)
    {
        $data = JenisStandar::findorfail($id);
        $data->delete();

        return redirect('/admin/jenis_standar')->with('sukses', 'data berhasil di hapus');
    }
}
