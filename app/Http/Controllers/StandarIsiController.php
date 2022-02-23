<?php

namespace App\Http\Controllers;

use App\Models\StandarIsi;
use Illuminate\Http\Request;

class StandarIsiController extends Controller
{


    public function __construct()
    {
        $this->middleware(['role:PIC_1|super-admin', 'permission:tambah content standar isi dan standar proses']);
        $this->middleware(['role:PIC_1|super-admin', 'permission:edit content standar isi dan standar proses']);
        $this->middleware(['role:PIC_1|super-admin', 'permission:hapus content standar isi dan standar proses']);
    }

    public function index()
    {
        $standar_isi = StandarIsi::all();
        return view('admin.standar_isi.index', compact('standar_isi'));
    }

    public function create()
    {
        return view('admin.standar_isi.create');
    }

    public function store(Request $request)
    {
        request()->validate([
            'nama_si' => 'required',
            'tahun' => 'required|numeric',
            'file' => 'required',
        ]);

        $file = $request->file;
        $new_file = time() . $file->getClientOriginalName();
        $file->move('uploads/standar_isi/', $new_file);

        StandarIsi::create([
            'nama_si' => $request->nama_si,
            'tahun' => $request->tahun,
            'file' => 'uploads/standar_isi/' . $new_file
        ]);
        return redirect('/admin/standar_isi')->with('sukses', 'data berhasil di tambahkan');
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
            'tahun' => 'required|numeric'
        ]);

        $standar_isi = StandarIsi::findorfail($id);

        if ($request->has('file')) {
            $file = $request->file;
            $new_file = time() . $file->getClientOriginalName();
            $file->move('uploads/standar_isi', $new_file);

            // if ($standar_isi->file != '') {
            //     unlink(public_path($standar_isi->file));
            // }
        }

        $standar_isi->nama_si = $request->nama_si;
        $standar_isi->tahun = $request->tahun;
        $standar_isi->file = $request->file != '' ? $new_file : $standar_isi->file;
        $standar_isi->save();

        return redirect('/admin/standar_isi')->with('sukses', 'data berhasil di ubah');
    }


    public function view($id)
    {
        $standar_isi = StandarIsi::where('id', $id)->first();
        return view('admin.standar_isi.view', compact('standar_isi'));
    }

    public function destroy($id)
    {
        $standar_isi = StandarIsi::find($id);
        $standar_isi->delete();

        return redirect('/admin/standar_isi')->with('sukses', 'data berhasil di hapus');
    }
}
