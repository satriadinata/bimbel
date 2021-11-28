<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\guru;
use Illuminate\Support\Facades\DB;

class guruController extends Controller
{
    public function index()
    {
        $data=guru::all();
        return view('guru/index',['data'=>$data]);
    }

    public function add()
    {
        return view('guru/add');
    }

    public function postGuru(Request $request)
    {
        // echo "<pre>";
        // print_r($request->input());
        // echo "</pre>";
        guru::create($request->all());
        return redirect('guru');
    }
    public function delete($id)
    {
        $data=DB::table('guru')
        ->where('idGuru',$id)
        ->delete();
        return redirect('guru');
    }
    public function edit($id)
    {
        $data=DB::table('guru')
        ->where('idGuru',$id)
        ->first();
        return view('guru/edit',['data'=>$data]);
    }
    public function update(Request $request,$id)
    {
        DB::table('guru')
            ->where('idGuru', $id)
            ->update([
                'namaGuru'=>$request->namaGuru,
                'alamatGuru'=>$request->alamatGuru,
                'tanggalLahirGuru'=>$request->tanggalLahirGuru,
                'noTelpGuru'=>$request->noTelpGuru
            ]);

        return redirect('guru');
    }
}
