<?php

namespace App\Http\Controllers;

use App\Models\StandarBiaya;
use Illuminate\Http\Request;

class StandarBiayaController extends Controller
{
    public function index()
    {
        $standar_biaya = StandarBiaya::all();
        return view('admin.standar_biaya.index', compact('standar_biaya'));
    }


    public function edit($id)
    {
        $standar_biaya = StandarBiaya::findorfail($id);
        return view('admin.standar_biaya.edit', compact('standar_biaya'));
    }

    public function update(Request $request, $id)
    {
        request()->validate([
            'nama_stbiaya' => 'required',
            'file' => 'required',
        ]);

        $standar_biaya = StandarBiaya::findorfail($id);

        if ($request->has('file')) {
            $file = $request->file;
            $new_file = time() . $file->getClientOriginalName();
            $file->move('uploads/standar_biaya', $new_file);

            if ($standar_biaya->file != '') {
                unlink(public_path('uploads/standar_biaya/' . $standar_biaya->file));
            }
        }

        $standar_biaya->nama_stbiaya = $request->nama_stbiaya;
        $standar_biaya->file = $request->file != '' ? $new_file : $standar_biaya->file;
        $standar_biaya->save();

        return redirect('admin/standar_biaya')->with('sukses', 'data berhasil di ubah');
    }

    public function view()
    {
        $standar_biaya = StandarBiaya::where('id', 1)->first();
        return view('admin.standar_biaya.view', compact('standar_biaya'));
    }
}
