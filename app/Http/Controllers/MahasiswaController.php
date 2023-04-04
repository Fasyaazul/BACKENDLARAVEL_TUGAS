<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function getmahasiswa()
    {
        $dt_mahasiswa=mahasiswa::get();
        return response()->json($dt_mahasiswa);
    }
    public function getid($id)
    {
        $dt_mahasiswa=mahasiswa::where('id','=',$id)->get();
        return response()->json($dt_mahasiswa);
    }


    public function createmahasiswa(Request $req){
        $validate = Validator:: make($req->all(),[
            'nama'=>'required',
            'jenis_kelamin'=>'required',
            'alamat'=>'required'
        
        ]);
        if($validate->fails()){
            return response() ->json($validate->errors()->toJson());
        }
        $create = Mahasiswa :: create([
            'nama'=>$req->nama,
            'jenis_kelamin'=>$req->jenis_kelamin,
            'alamat'=>$req->alamat
        ]);
        if($create){
            return response()->json(['status'=>true,'message'=>'sukses menambah data mahasiswa.']);
        }else{
            return response()->json(['status'=>false, 'message'=>'gagal menambah data mahasiswa']);
        }
    }
        public function updatemahasiswa(request $req, $id){
            $validate = validator::make($req->all(),[
                'nama'=>'required',
                'alamat'=>'required',
                'jenis_kelamin'=>"required"
            ]);
            if($validate->fails()){
                return response()->json($validate->error()->toJson());
            }
            $update = mahasiswa :: where('id',$id)->update([
                'nama'=>$req->get('nama'),
                'alamat'=>$req->get('alamat'),
                'jenis_kelamin'=>$req->get('jenis_kelamnin')
            ]);
            if($update){
                 return response() ->json(['status'=>true, 'message'=>'Berhasil Mengaupdate data mahasiswa']);
            }else{
                return response()->json(['status'=>true, 'message'=>'gagal update data mahasiswa']); 
            }
        }
        public function deletemahasiswa($id){
            $delete = mahasiswa::where('id',$id)->delete();
            if($delete){
                return response()->json(['status'=>true, 'message'=>'Sukses Menghapus Data Mahasiswa']);
            }else{
                return response()->json(['status'=>false,'message'=>'Gagal Menghapus Data Mahasiswa']);
            }
        }
    }
