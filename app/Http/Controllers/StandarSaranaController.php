<?php

namespace App\Http\Controllers;

use App\Models\StandarSarana;
use Illuminate\Http\Request;

class StandarSaranaController extends Controller
{
    public function index()
    {
        $standar_sarana = StandarSarana::all();
        return view('admin.standar_sarana.index', compact('standar_sarana'));
    }


    public function edit($id)
    {
        $standar_sarana = StandarSarana::findorfail($id);
        return view('admin.standar_sarana.edit', compact('standar_sarana'));
    }

    public function update(Request $request, $id)
    {
        request()->validate([
            'nama_stsarana' => 'required',
            'file' => 'required',
        ]);

        $standar_sarana = StandarSarana::findorfail($id);

        if ($request->has('file')) {
            $file = $request->file;
            $new_file = time() . $file->getClientOriginalName();
            $file->move('uploads/standar_sarana', $new_file);

            if ($standar_sarana->file != '') {
                unlink(public_path('uploads/standar_sarana/' . $standar_sarana->file));
            }
        }

        $standar_sarana->nama_stsarana = $request->nama_stsarana;
        $standar_sarana->file = $request->file != '' ? $new_file : $standar_sarana->file;
        $standar_sarana->save();

        return redirect('admin/standar_sarana')->with('sukses', 'data berhasil di ubah');
    }

    public function view()
    {
        $standar_sarana = StandarSarana::where('id', 1)->first();
        return view('admin.standar_sarana.view', compact('standar_sarana'));
    }
}
