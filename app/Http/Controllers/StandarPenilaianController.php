<?php

namespace App\Http\Controllers;

use App\Models\StandarPenilaian;
use Illuminate\Http\Request;

class StandarPenilaianController extends Controller
{
    public function index()
    {
        $standar_penilaian = StandarPenilaian::all();
        return view('admin.standar_penilaian.index', compact('standar_penilaian'));
    }


    public function edit($id)
    {
        $standar_penilaian = StandarPenilaian::findorfail($id);
        return view('admin.standar_penilaian.edit', compact('standar_penilaian'));
    }

    public function update(Request $request, $id)
    {
        request()->validate([
            'nama_penilaian' => 'required',
            'file' => 'required',
        ]);

        $standar_penilaian = StandarPenilaian::findorfail($id);

        if ($request->has('file')) {
            $file = $request->file;
            $new_file = time() . $file->getClientOriginalName();
            $file->move('uploads/standar_penilaian', $new_file);

            if ($standar_penilaian->file != '') {
                unlink(public_path('uploads/standar_penilaian/' . $standar_penilaian->file));
            }
        }

        $standar_penilaian->nama_penilaian = $request->nama_penilaian;
        $standar_penilaian->file = $request->file != '' ? $new_file : $standar_penilaian->file;
        $standar_penilaian->save();

        return redirect('admin/standar_penilaian')->with('sukses', 'data berhasil di ubah');
    }

    public function view()
    {
        $standar_penilaian = StandarPenilaian::where('id', 1)->first();
        return view('admin.standar_penilaian.view', compact('standar_penilaian'));
    }
}