<?php

namespace App\Http\Controllers;

use App\Models\StandarIsi;
use Illuminate\Http\Request;

class StandarIsiController extends Controller
{
    public function index()
    {
        $standar_isi = StandarIsi::all();
        return view('admin.standar_isi.index', compact('standar_isi'));
    }

    public function edit($id)
    {
        $standar_isi = StandarIsi::findorfail($id);
        return view('admin.standar_isi.edit', compact('standar_isi'));
    }


    public function update(Request $request, $id)
    {
        request()->validate([
            'nama_si' => 'required',
            'file' => 'required',
        ]);

        $standar_isi = StandarIsi::findorfail($id);

        if ($request->has('file')) {
            $file = $request->file;
            $new_file = time() . $file->getClientOriginalName();
            $file->move('uploads/standar_isi', $new_file);

            if ($standar_isi->file != '') {
                unlink(public_path('uploads/standar_isi/' . $standar_isi->file));
            }
        }

        $standar_isi->nama_si = $request->nama_si;
        $standar_isi->file = $request->file != '' ? $new_file : $standar_isi->file;
        $standar_isi->save();

        return redirect('/admin/standar_isi')->with('sukses', 'data berhasil di ubah');
    }


    public function view()
    {
        $standar_isi = StandarIsi::where('id', 1)->first();
        return view('admin.standar_isi.view', compact('standar_isi'));
    }
}
