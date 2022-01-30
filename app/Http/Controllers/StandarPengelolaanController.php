<?php

namespace App\Http\Controllers;

use App\Models\StandarPengelolaan;
use Illuminate\Http\Request;

class StandarPengelolaanController extends Controller
{
    public function index()
    {
        $standar_pengelolaan = StandarPengelolaan::all();
        return view('admin.standar_pengelolaan.index', compact('standar_pengelolaan'));
    }

    public function edit($id)
    {
        $standar_pengelolaan = StandarPengelolaan::findorfail($id);
        return view('admin.standar_pengelolaan.edit', compact('standar_pengelolaan'));
    }


    public function update(Request $request, $id)
    {
        request()->validate([
            'nama_stpengelolaan' => 'required',
            'file' => 'required',
        ]);

        $standar_pengelolaan = StandarPengelolaan::findorfail($id);

        if ($request->has('file')) {
            $file = $request->file;
            $new_file = time() . $file->getClientOriginalName();
            $file->move('uploads/standar_pengelolaan', $new_file);

            if ($standar_pengelolaan->file != '') {
                unlink(public_path('uploads/standar_pengelolaan/' . $standar_pengelolaan->file));
            }
        }

        $standar_pengelolaan->nama_stpengelolaan = $request->nama_stpengelolaan;
        $standar_pengelolaan->file = $request->file != '' ? $new_file : $standar_pengelolaan->file;
        $standar_pengelolaan->save();

        return redirect('/admin/standar_pengelolaan')->with('sukses', 'data berhasil di ubah');
    }


    public function view()
    {
        $standar_pengelolaan = StandarPengelolaan::where('id', 1)->first();
        return view('admin.standar_pengelolaan.view', compact('standar_pengelolaan'));
    }
}
