<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\jadwal;


class jadwalController extends Controller
{
    public function index()
    {
        $data=DB::table('jadwal')
        ->join('kelasmapel','kelasmapel.idKelasMapel','=','jadwal.idKelasMapel')
        ->join('guru','guru.idGuru','=','kelasmapel.idGuru')
        ->join('mapel','mapel.kodeMapel','=','kelasmapel.kodeMapel')
        ->get();
        return view('jadwal/index',['data'=>$data]);
    }

    public function add()
    {
        $data=DB::table('kelasmapel')
        ->join('guru','guru.idGuru','=','kelasmapel.idGuru')
        ->join('mapel','mapel.kodeMapel','=','kelasmapel.kodeMapel')
        ->get();
        return view('jadwal/add',['data'=>$data]);
    }

    public function postJadwal(Request $request)
    {
        // echo "<pre>";
        // print_r($request->input());
        // echo "</pre>";
        jadwal::create($request->all());
        return redirect('jadwal');
    }
    public function delete($id)
    {
        $data=DB::table('jadwal')
        ->where('idjadwal',$id)
        ->delete();
        return redirect('jadwal');
    }
    public function edit($id)
    {
        $kelas=DB::table('kelasmapel')
        ->join('guru','guru.idGuru','=','kelasmapel.idGuru')
        ->join('mapel','mapel.kodeMapel','=','kelasmapel.kodeMapel')
        ->get();
        $data=DB::table('jadwal')
        ->where('idJadwal',$id)
        ->first();
        return view('jadwal/edit',['data'=>$data, 'kelas'=>$kelas]);
    }
    public function update(Request $request,$id)
    {
        DB::table('jadwal')
            ->where('idjadwal', $id)
            ->update([
                'hari'=>$request->hari,
                'sesi'=>$request->sesi,
                'idKelasMapel'=>$request->idKelasMapel
            ]);

        return redirect('jadwal');
    }
}
