<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\siswa;
use Illuminate\Support\Facades\DB;

class siswaController extends Controller
{
    public function index()
    {
        $data=siswa::all();
        return view('siswa/index',['data'=>$data]);
    }

    public function add()
    {
        return view('siswa/add');
    }

    public function postSiswa(Request $request)
    {
        // echo "<pre>";
        // print_r($request->input());
        // echo "</pre>";
        siswa::create($request->all());
        return redirect('siswa');
    }
    public function delete($id)
    {
        $data=DB::table('siswa')
        ->where('idSiswa',$id)
        ->delete();
        return redirect('siswa');
    }
    public function edit($id)
    {
        $data=DB::table('siswa')
        ->where('idSiswa',$id)
        ->first();
        return view('siswa/edit',['data'=>$data]);
    }
    public function update(Request $request,$id)
    {
        DB::table('siswa')
            ->where('idSiswa', $id)
            ->update([
                'namaSiswa'=>$request->namaSiswa,
                'alamatSiswa'=>$request->alamatSiswa,
                'tanggalLahirSiswa'=>$request->tanggalLahirSiswa,
                'noTelpSiswa'=>$request->noTelpSiswa
            ]);

        return redirect('siswa');
    }
}
