<?php

namespace App\Http\Controllers;

use App\Models\StandarLulusan;
use Illuminate\Http\Request;

class StandarLulusanController extends Controller
{
    public function index()
    {
        $standar_lulusan = StandarLulusan::all();
        return view('admin.standar_lulusan.index', compact('standar_lulusan'));
    }


    public function edit($id)
    {
        $standar_lulusan = StandarLulusan::findorfail($id);
        return view('admin.standar_lulusan.edit', compact('standar_lulusan'));
    }

    public function update(Request $request, $id)
    {
        request()->validate([
            'nama_stlulusan' => 'required',
            'file' => 'required',
        ]);

        $standar_lulusan = StandarLulusan::findorfail($id);

        if ($request->has('file')) {
            $file = $request->file;
            $new_file = time() . $file->getClientOriginalName();
            $file->move('uploads/standar_lulusan', $new_file);

            if ($standar_lulusan->file != '') {
                unlink(public_path('uploads/standar_lulusan/' . $standar_lulusan->file));
            }
        }

        $standar_lulusan->nama_stlulusan = $request->nama_stlulusan;
        $standar_lulusan->file = $request->file != '' ? $new_file : $standar_lulusan->file;
        $standar_lulusan->save();

        return redirect('admin/standar_lulusan')->with('sukses', 'data berhasil di ubah');
    }

    public function view()
    {
        $standar_lulusan = StandarLulusan::where('id', 1)->first();
        return view('admin.standar_lulusan.view', compact('standar_lulusan'));
    }
}
