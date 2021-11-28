<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\kelasmapel;
use App\mapel;
use App\guru;
use Illuminate\Support\Facades\DB;

class kelasmapelController extends Controller
{
    public function index()
    {
        $data=DB::table('kelasmapel')
        ->join('guru','guru.idGuru','=','kelasmapel.idGuru')
        ->join('mapel','mapel.kodeMapel','=','kelasmapel.kodeMapel')
        ->get();
        return view('kelasmapel/index',['data'=>$data]);
    }

    public function add()
    {
        $guru=guru::all();
        $mapel=mapel::all();
        return view('kelasmapel/add',['guru'=>$guru,'mapel'=>$mapel]);
    }

    public function postKelas(Request $request)
    {
        // echo "<pre>";
        // print_r($request->input());
        // echo "</pre>";
        kelasmapel::create($request->all());
        return redirect('kelas');
    }
    public function delete($id)
    {
        $data=DB::table('kelasmapel')
        ->where('idKelasMapel',$id)
        ->delete();
        return redirect('kelas');
    }
    public function edit($id)
    {
        $guru=guru::all();
        $mapel=mapel::all();
        $data=DB::table('kelasmapel')
        ->where('idKelasMapel',$id)
        ->first();
        return view('kelasmapel/edit',['data'=>$data, 'guru'=>$guru, 'mapel'=>$mapel]);
    }
    public function update(Request $request,$id)
    {
        DB::table('kelasmapel')
            ->where('idKelasMapel', $id)
            ->update([
                'kodeMapel'=>$request->kodeMapel,
                'kelas'=>$request->kelas,
                'idGuru'=>$request->idGuru
            ]);

        return redirect('kelas');
    }
}
