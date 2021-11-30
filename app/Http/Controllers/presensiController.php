<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\siswa;


class presensiController extends Controller
{
    public function index()
    {
        $data=DB::table('kelasmapel')
        ->join('jadwal','jadwal.idKelasMapel','=','kelasmapel.idKelasMapel')
        ->join('guru','guru.idGuru','=','kelasmapel.idGuru')
        ->join('mapel','mapel.kodeMapel','=','kelasmapel.kodeMapel')
        ->get();
        return view('presensi/index',['data'=>$data]);
    }

    public function add(Request $request, $id)
    {
        Regristasi::create([
            'idSiswa'=>$request->idSiswa,
            'idKelasMapel'=>$id
        ]);
        return redirect()->route('detailKelas',['id'=>$id]);
    }

    public function post(Request $request)
    {
        $siswa=DB::table('registrasikelas')
        ->select('idSiswa')
        ->where('idKelasMapel','=',$request->idKelasMapel)
        ->get();
        $idGuru=DB::table('kelasmapel')
        ->select('idGuru')
        ->where('idKelasMapel','=',$request->idKelasMapel)
        ->first();
        // echo '<pre>';
        // echo $idGuru->idGuru;
        // echo '</pre>';
        foreach ($siswa as $key=>$value){
            // echo $value->idSiswa;
            DB::table('presensi')
            ->insert([
                'idKelasMapel'=>$request->idKelasMapel,
                'pertemuanKe'=>$request->pertemuanKe,
                'idSiswa'=>$value->idSiswa,
                'tanggalPertemuan'=>$request->tanggalPertemuan,
                'idGuru'=>$idGuru->idGuru,
                'ket'=>'A'
            ]);
        };
        // die();
        return redirect()->route('detailPresensiKelas',['id'=>$request->idKelasMapel]);
    }
    public function del($ids,$idk)
    {
        $data=DB::table('registrasikelas')
        ->where('idSiswa',$ids)
        ->where('idKelasMapel',$idk)
        ->delete();
        return redirect()->route('detailKelas',['id'=>$idk]);
    }
    public function detailPresensi($idk,$pk)
    {
        $kelas=DB::table('kelasmapel')
        ->join('jadwal','jadwal.idKelasMapel','=','kelasmapel.idKelasMapel')
        ->join('guru','guru.idGuru','=','kelasmapel.idGuru')
        ->join('mapel','mapel.kodeMapel','=','kelasmapel.kodeMapel')
        ->where('kelasmapel.idKelasMapel','=',$idk)
        ->first();

        $data=DB::table('presensi')        
        ->join('kelasmapel','kelasmapel.idKelasMapel','=','presensi.idKelasMapel')
        ->join('siswa','siswa.idSiswa','=','presensi.idSiswa')
        ->where('presensi.idKelasMapel','=',$idk)
        ->where('presensi.pertemuanKe','=',$pk)
        ->get();

        return view('presensi/detailPresensi',['data'=>$data,'kelas'=>$kelas]);
    }
    public function present($id)
    {
        DB::table('presensi')
            ->where('idPresensi', $id)
            ->update([
                'ket'=>'H'
            ]);
        $kelas=DB::table('presensi')
            ->where('idPresensi', $id)
            ->first();
        return redirect()->route('detailPresensi',['idk'=>$kelas->idKelasMapel,'pk'=>$kelas->pertemuanKe]);
    }
    public function cancel($id)
    {
        DB::table('presensi')
            ->where('idPresensi', $id)
            ->update([
                'ket'=>'A'
            ]);
        $kelas=DB::table('presensi')
            ->where('idPresensi', $id)
            ->first();
        return redirect()->route('detailPresensi',['idk'=>$kelas->idKelasMapel,'pk'=>$kelas->pertemuanKe]);
    }
    public function edit($ids,$idk)
    {
        $data=DB::table('registrasikelas')
        ->where('idSiswa',$ids)
        ->where('idKelasMapel',$idk)
        ->first();
        return view('regristasi/edit',['data'=>$data]);
    }
    public function tambahPertemuan($id)
    {
        return view('presensi/tambah',['id'=>$id]);
    }
    public function detailPresensiKelas($id)
    {
        $kelas=DB::table('kelasmapel')
        ->join('jadwal','jadwal.idKelasMapel','=','kelasmapel.idKelasMapel')
        ->join('guru','guru.idGuru','=','kelasmapel.idGuru')
        ->join('mapel','mapel.kodeMapel','=','kelasmapel.kodeMapel')
        ->where('kelasmapel.idKelasMapel','=',$id)
        ->first();

        $data=DB::table('presensi')
        // ->select('pertemuanKe','tanggalPertemuan')
        ->where('presensi.idKelasMapel','=',$id)
        ->join('kelasmapel','kelasmapel.idKelasMapel','=','presensi.idKelasMapel')
        ->join('siswa','siswa.idSiswa','=','presensi.idSiswa')
        ->join('guru','guru.idGuru','=','kelasmapel.idGuru')
        ->join('mapel','mapel.kodeMapel','=','kelasmapel.kodeMapel')
        ->groupBy('pertemuanKe')
        ->get();

        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        // die();

        return view('presensi/detailPresensiKelas',['data'=>$data, 'kelas'=>$kelas]);
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
