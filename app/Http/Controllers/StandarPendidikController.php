<?php

namespace App\Http\Controllers;

use App\Models\StandarPendidik;
use Illuminate\Http\Request;

class StandarPendidikController extends Controller
{
    public function index()
    {
        $standar_pendidik = StandarPendidik::all();
        return view('admin.standar_pendidik.index', compact('standar_pendidik'));
    }


    public function edit($id)
    {
        $standar_pendidik = StandarPendidik::findorfail($id);
        return view('admin.standar_pendidik.edit', compact('standar_pendidik'));
    }

    public function update(Request $request, $id)
    {
        request()->validate([
            'nama_stpendidik' => 'required',
            'file' => 'required',
        ]);

        $standar_pendidik = StandarPendidik::findorfail($id);

        if ($request->has('file')) {
            $file = $request->file;
            $new_file = time() . $file->getClientOriginalName();
            $file->move('uploads/standar_pendidik', $new_file);

            if ($standar_pendidik->file != '') {
                unlink(public_path('uploads/standar_pendidik/' . $standar_pendidik->file));
            }
        }

        $standar_pendidik->nama_stpendidik = $request->nama_stpendidik;
        $standar_pendidik->file = $request->file != '' ? $new_file : $standar_pendidik->file;
        $standar_pendidik->save();

        return redirect('admin/standar_pendidik')->with('sukses', 'data berhasil di ubah');
    }

    public function view()
    {
        $standar_pendidik = StandarPendidik::where('id', 1)->first();
        return view('admin.standar_pendidik.view', compact('standar_pendidik'));
    }
}
