<?php

namespace App\Http\Controllers;

use App\Models\JenisStandar;
use App\Models\StandarProses;
use Illuminate\Http\Request;

class StandarProsesController extends Controller
{


    public function __construct()
    {
        $this->data = new StandarProses();
    }


    public function index()
    {
        $standar_proses = $this->data->getJenisStandar();
        return view('admin.standar_proses.index', compact('standar_proses'));
    }


    public function create()
    {
        $data = JenisStandar::all();
        return view('admin.standar_proses.create', compact('data'));
    }

    public function store(Request $request)
    {
        request()->validate([
            'nama_sp' => 'required',
            'tahun' => 'required|numeric',
            'file' => 'required',
        ]);
        $file = $request->file;
        $new_file = time() . $file->getClientOriginalName();
        $file->move('uploads/standar_proses/', $new_file);

        StandarProses::create([
            'nama_sp' => $request->nama_sp,
            'tahun' => $request->tahun,
            'file' => 'uploads/standar_proses/' . $new_file
        ]);



        return redirect('admin/standar_proses')->with('sukses', 'data berhasil di tambahkan');
    }

    public function edit($id)
    {
        $standar_proses = StandarProses::findorfail($id);
        $data = JenisStandar::all();
        return view('admin.standar_proses.edit', compact('standar_proses', 'data'));
    }

    public function update(Request $request, $id)
    {
        request()->validate([
            'nama_sp' => 'required',
            'file' => 'required',
        ]);

        $standar_proses = StandarProses::findorfail($id);

        if ($request->has('file')) {
            $file = $request->file;
            $new_file = time() . $file->getClientOriginalName();
            $file->move('uploads/standar_proses', $new_file);

            // if ($standar_proses->file != '') {
            //     unlink(public_path('uploads/standar_proses/' . $standar_proses->file));
            // }
        }

        $standar_proses->nama_sp = $request->nama_sp;
        $standar_proses->file = $request->file != '' ? $new_file : $standar_proses->file;
        $standar_proses->save();

        return redirect('admin/standar_proses')->with('sukses', 'data berhasil di ubah');
    }

    public function view($id)
    {
        $standar_proses = StandarProses::where('id', $id)->first();
        return view('admin.standar_proses.view', compact('standar_proses'));
    }
}
