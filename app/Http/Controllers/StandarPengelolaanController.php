<?php

namespace App\Http\Controllers;

use App\Models\JenisStandar;
use App\Models\StandarPengelolaan;
use Illuminate\Http\Request;
use PhpParser\PrettyPrinter\Standard;

class StandarPengelolaanController extends Controller
{



    public function __construct()
    {
        $this->data = new StandarPengelolaan();
    }

    public function index()
    {
        $standar_pengelolaan = $this->data->getJenisStandar();
        return view('admin.standar_pengelolaan.index', compact('standar_pengelolaan'));
    }

    public function create()
    {
        $data = JenisStandar::all();
        return view('admin.standar_pengelolaan.create', compact('data'));
    }

    public function store(Request $request)
    {
        request()->validate([
            'nama_stpengelolaan' => 'required',
            'tahun' => 'required',
            'file' => 'required',
        ]);

        $file = $request->file;
        $new_file = time() . $file->getClientOriginalName();
        $file->move('uploads/standar_pengelolaan/', $new_file);

        StandarPengelolaan::create([
            'nama_stpengelolaan' => $request->nama_stpengelolaan,
            'tahun' => $request->tahun,
            'file' => 'uploads/standar_pengelolaan/' . $new_file
        ]);
        return redirect('/admin/standar_pengelolaan')->with('sukses', 'data berhasil di tambahkan');
    }

    public function edit($id)
    {
        $standar_pengelolaan = StandarPengelolaan::findorfail($id);
        $data = JenisStandar::all();
        return view('admin.standar_pengelolaan.edit', compact('standar_pengelolaan', 'data'));
    }


    public function update(Request $request, $id)
    {
        request()->validate([
            'nama_stpengelolaan' => 'required',
            'file' => 'required',
            'tahun' => 'required'
        ]);

        $standar_pengelolaan = StandarPengelolaan::findorfail($id);

        if ($request->has('file')) {
            $file = $request->file;
            $new_file = time() . $file->getClientOriginalName();
            $file->move('uploads/standar_pengelolaan', $new_file);

            if ($standar_pengelolaan->file != '') {
                unlink(public_path($standar_pengelolaan->file));
            }
        }

        $standar_pengelolaan->nama_stpengelolaan = $request->nama_stpengelolaan;
        $standar_pengelolaan->file = $request->file != '' ? $new_file : $standar_pengelolaan->file;
        $standar_pengelolaan->save();

        return redirect('/admin/standar_pengelolaan')->with('sukses', 'data berhasil di ubah');
    }


    public function view($id)
    {
        $standar_pengelolaan = StandarPengelolaan::find($id);
        return view('admin.standar_pengelolaan.view', compact('standar_pengelolaan'));
    }

    public function destroy($id)
    {
        $standar_pengelolaan = StandarPengelolaan::findorfail($id);
        $standar_pengelolaan->delete();

        return view('admin.standar_pengelolaan.view', compact('standar_pengelolaan'));
    }
}
