<?php

namespace App\Http\Controllers;

use App\Models\JenisStandar;
use App\Models\StandarBiaya;
use Illuminate\Http\Request;

class StandarBiayaController extends Controller
{

    public function __construct()
    {
        $this->middleware(['role:PIC_3|super-admin', 'permission:tambah content standar penilaian dan standar sarana']);
        $this->middleware(['role:PIC_3|super-admin', 'permission:edit content standar penilaian dan standar sarana']);
        $this->middleware(['role:PIC_3|super-admin', 'permission:hapus content standar penilaian dan standar sarana']);
        $this->data = new StandarBiaya();
    }


    public function index()
    {
        $standar_biaya = $this->data->getJenisStandar();
        return view('admin.standar_biaya.index', compact('standar_biaya'));
    }

    public function create()
    {
        $data = JenisStandar::all();
        return view('admin.standar_biaya.create', compact('data'));
    }

    public function store(Request $request)
    {
        request()->validate([
            'nama_stbiaya' => 'required',
            'tahun' => 'required',
            'file' => 'required',
        ]);

        $file = $request->file;
        $new_file = time() . $file->getClientOriginalName();
        $file->move('uploads/standar_biaya/', $new_file);

        StandarBiaya::create([
            'nama_stbiaya' => $request->nama_stbiaya,
            'tahun' => $request->tahun,
            'file' => 'uploads/standar_biaya/' . $new_file
        ]);
        return redirect('/admin/standar_biaya')->with('sukses', 'data berhasil di tambahkan');
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

    public function view($id)
    {
        $standar_biaya = StandarBiaya::findorfail($id);
        return view('admin.standar_biaya.view', compact('standar_biaya'));
    }

    public function destroy($id)
    {
        $standar_biaya = StandarBiaya::findorfail($id);
        $standar_biaya->delete();

        return redirect('admin/standar_biaya')->with('sukses', 'data berhasil di hapus');
    }
}
