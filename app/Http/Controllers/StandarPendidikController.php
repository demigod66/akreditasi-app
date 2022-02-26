<?php

namespace App\Http\Controllers;

use App\Models\JenisStandar;
use App\Models\StandarPendidik;
use Illuminate\Http\Request;

class StandarPendidikController extends Controller
{


    public function __construct()
    {
        $this->data = new StandarPendidik();
    }

    public function index()
    {
        $standar_pendidik = $this->data->getJenisStandar();
        return view('admin.standar_pendidik.index', compact('standar_pendidik'));
    }

    public function store(Request $request)
    {
        request()->validate([
            'nama_stpendidik' => 'required',
            'tahun' => 'required',
            'file' => 'required',
        ]);

        $file = $request->file;
        $new_file = time() . $file->getClientOriginalName();
        $file->move('uploads/standar_pendidik/', $new_file);

        StandarPendidik::create([
            'nama_stpendidik' => $request->nama_stpendidik,
            'tahun' => $request->tahun,
            'file' => 'uploads/standar_pendidik/' . $new_file
        ]);
        return redirect('/admin/standar_pendidik')->with('sukses', 'data berhasil di tambahkan');
    }

    public function create()
    {
        $data = JenisStandar::all();
        return view('admin.standar_pendidik.create', compact('data'));
    }


    public function edit($id)
    {
        $standar_pendidik = StandarPendidik::findorfail($id);
        $data = JenisStandar::all();
        return view('admin.standar_pendidik.edit', compact('standar_pendidik', 'data'));
    }

    public function update(Request $request, $id)
    {
        request()->validate([
            'nama_stpendidik' => 'required',
            'tahun' => 'required'
        ]);

        $standar_pendidik = StandarPendidik::findorfail($id);

        if ($request->has('file')) {
            $file = $request->file;
            $new_file = time() . $file->getClientOriginalName();
            $file->move('uploads/standar_pendidik', $new_file);

            if ($standar_pendidik->file != '') {
                unlink(public_path($standar_pendidik->file));
            }
        }

        $standar_pendidik->nama_stpendidik = $request->nama_stpendidik;
        $standar_pendidik->file = $request->file != '' ? $new_file : $standar_pendidik->file;
        $standar_pendidik->save();

        return redirect('admin/standar_pendidik')->with('sukses', 'data berhasil di ubah');
    }

    public function view($id)
    {
        $standar_pendidik = StandarPendidik::findorfail($id);
        return view('admin.standar_pendidik.view', compact('standar_pendidik'));
    }

    public function destroy($id)
    {
        $standar_pendidik = StandarPendidik::findorfail($id);
        $standar_pendidik->delete();


        return redirect('admin/standar_pendidik')->with('sukses', 'data berhasil di hapus');
    }
}
