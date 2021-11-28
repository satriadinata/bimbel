<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mapel;
use Illuminate\Support\Facades\DB;

class mapelController extends Controller
{
    public function index()
    {
        $data=mapel::all();
        return view('mapel/index',['data'=>$data]);
    }

    public function add()
    {
        return view('mapel/add');
    }

    public function postMapel(Request $request)
    {
        // echo "<pre>";
        // print_r($request->input());
        // echo "</pre>";
        mapel::create($request->all());
        return redirect('mapel');
    }
    public function delete($id)
    {
        $data=DB::table('mapel')
        ->where('kodeMapel',$id)
        ->delete();
        return redirect('mapel');
    }
    public function edit($id)
    {
        $data=DB::table('mapel')
        ->where('kodeMapel',$id)
        ->first();
        return view('mapel/edit',['data'=>$data]);
    }
    public function update(Request $request,$id)
    {
        DB::table('mapel')
            ->where('kodeMapel', $id)
            ->update([
                'kodeMapel'=>$request->kodeMapel,
                'namaMapel'=>$request->namaMapel
            ]);

        return redirect('mapel');
    }
}
