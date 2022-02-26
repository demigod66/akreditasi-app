<?php

namespace App\Http\Controllers;

use App\Models\JenisStandar;
use App\Models\StandarLulusan;
use Illuminate\Http\Request;

class StandarLulusanController extends Controller
{

    public function __construct()
    {
        $this->data = new StandarLulusan();
    }

    public function index()
    {
        $standar_lulusan = $this->data->getJenisStandar();
        return view('admin.standar_lulusan.index', compact('standar_lulusan'));
    }

    public function create()
    {
        $data = JenisStandar::all();
        return view('admin.standar_lulusan.create', compact('data'));
    }

    public function store(Request $request)
    {
        request()->validate([
            'nama_stlulusan' => 'required',
            'tahun' => 'required',
            'file' => 'required',
        ]);

        $file = $request->file;
        $new_file = time() . $file->getClientOriginalName();
        $file->move('uploads/standar_lulusan/', $new_file);

        StandarLulusan::create([
            'nama_stlulusan' => $request->nama_stlulusan,
            'tahun' => $request->tahun,
            'file' => 'uploads/standar_lulusan/' . $new_file
        ]);
        return redirect('/admin/standar_lulusan')->with('sukses', 'data berhasil di tambahkan');
    }


    public function edit($id)
    {
        $standar_lulusan = StandarLulusan::findorfail($id);
        $data = JenisStandar::all();
        return view('admin.standar_lulusan.edit', compact('standar_lulusan', 'data'));
    }

    public function update(Request $request, $id)
    {
        request()->validate([
            'nama_stlulusan' => 'required',
            'tahun' => 'required'
        ]);

        $standar_lulusan = StandarLulusan::findorfail($id);

        if ($request->has('file')) {
            $file = $request->file;
            $new_file = time() . $file->getClientOriginalName();
            $file->move('uploads/standar_lulusan', $new_file);

            if ($standar_lulusan->file != '') {
                unlink(public_path($standar_lulusan->file));
            }
        }

        $standar_lulusan->nama_stlulusan = $request->nama_stlulusan;
        $standar_lulusan->file = $request->file != '' ? $new_file : $standar_lulusan->file;
        $standar_lulusan->save();

        return redirect('admin/standar_lulusan')->with('sukses', 'data berhasil di ubah');
    }

    public function view($id)
    {
        $standar_lulusan = StandarLulusan::findorfail($id);
        return view('admin.standar_lulusan.view', compact('standar_lulusan'));
    }

    public function destroy($id)
    {
        $standar_lulusan = StandarLulusan::findorfail($id);
        $standar_lulusan->delete();


        return redirect('admin/standar_lulusan')->with('sukses', 'data berhasil di hapus');
    }
}
