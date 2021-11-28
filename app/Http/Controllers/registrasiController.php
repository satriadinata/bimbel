<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Regristasi;
class registrasiController extends Controller
{
    public function index()
    {
        $data=DB::table('kelasmapel')
        ->join('jadwal','jadwal.idKelasMapel','=','kelasmapel.idKelasMapel')
        ->join('guru','guru.idGuru','=','kelasmapel.idGuru')
        ->join('mapel','mapel.kodeMapel','=','kelasmapel.kodeMapel')
        ->get();
        return view('regristasi/index',['data'=>$data]);
    }

    public function add(Request $request, $id)
    {
        Regristasi::create([
            'idSiswa'=>$request->idSiswa,
            'idKelasMapel'=>$id
        ]);
        return redirect()->route('detailKelas',['id'=>$id]);
    }

    public function postJadwal(Request $request)
    {
        // echo "<pre>";
        // print_r($request->input());
        // echo "</pre>";
        jadwal::create($request->all());
        return redirect('jadwal');
    }
    public function del($ids,$idk)
    {
        $data=DB::table('registrasikelas')
        ->where('idSiswa',$ids)
        ->where('idKelasMapel',$idk)
        ->delete();
        return redirect()->route('detailKelas',['id'=>$idk]);
    }

    public function edit($ids,$idk)
    {
        $data=DB::table('registrasikelas')
        ->where('idSiswa',$ids)
        ->where('idKelasMapel',$idk)
        ->first();
        return view('regristasi/edit',['data'=>$data]);
    }
    public function detail($id)
    {
        $kelas=DB::table('kelasmapel')
        ->join('jadwal','jadwal.idKelasMapel','=','kelasmapel.idKelasMapel')
        ->join('guru','guru.idGuru','=','kelasmapel.idGuru')
        ->join('mapel','mapel.kodeMapel','=','kelasmapel.kodeMapel')
        ->where('kelasmapel.idKelasMapel','=',$id)
        ->first();

        $data=DB::table('registrasikelas')
        ->join('siswa','siswa.idSiswa','=','registrasikelas.idSiswa')
        ->where('registrasikelas.idKelasMapel','=',$id)
        ->get();

        $siswa=DB::table('siswa')
        ->get();

        return view('regristasi/detail',['data'=>$data, 'kelas'=>$kelas, 'siswa'=>$siswa]);
    }
    public function update(Request $request)
    {
        if ($request->nilaiAkhir<45){
            $pre='E';
        }else if($request->nilaiAkhir<55){
            $pre='D';
        }else if($request->nilaiAkhir<60){
            $pre='C';
        }else if($request->nilaiAkhir<65){
            $pre='C+';
        }else if($request->nilaiAkhir<70){
            $pre='B-';
        }else if($request->nilaiAkhir<75){
            $pre='B';
        }else if($request->nilaiAkhir<80){
            $pre='B+';
        }else if($request->nilaiAkhir<85){
            $pre='A-';
        }else{
            $pre='A';
        }
        DB::table('registrasikelas')
            ->where('idSiswa', $request->ids)
            ->where('idKelasMapel', $request->idk)
            ->update([
                'nilaiAkhir'=>$request->nilaiAkhir,
                'predikat'=>$pre,
            ]);

        return redirect()->route('detailKelas',['id'=>$request->idk]);
    }
}
