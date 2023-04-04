<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function getbuku()
    {
        $dt_buku=buku::get();
        return response()->json($dt_buku);
    }
    public function getid($id)
    {
        $dt_buku=buku::where('id','=',$id)->get();
        return response()->json($dt_buku);
    }


    public function createbuku(Request $req){
        $validate = Validator:: make($req->all(),[
            'judul_buku'=>'required',
            'jenis_buku'=>'required',
            'pengarang'=>'required'
        
        ]);
        if($validate->fails()){
            return response() ->json($validate->errors()->toJson());
        }
        $create = buku :: create([
            'judul_buku'=>$req->judul_buku,
            'jenis_buku'=>$req->jenis_buku,
            'pengarang'=>$req->pengarang
        ]);
        if($create){
            return response()->json(['status'=>true,'message'=>'sukses menambah data buku.']);
        }else{
            return response()->json(['status'=>false, 'message'=>'gagal menambah data buku']);
        }
    }
        public function updatebuku(request $req, $id){
            $validate = validator::make($req->all(),[
                'judul_buku'=>'required',
                'jenis_buku'=>'required',
                'pengarang'=>'required'
            ]);
            if($validate->fails()){
                return response()->json($validate->error()->toJson());
            }
            $update = buku :: where('id',$id)->update([
                'judul_buku'=>$req->judul_buku,
                'jenis_buku'=>$req->jenis_buku,
                'pengarang'=>$req->pengarang

            ]);
            if($update){
                 return response() ->json(['status'=>true, 'message'=>'Berhasil Mengupdate data Buku']);
            }else{
                return response()->json(['status'=>true, 'message'=>'gagal update data Buku']); 
            }
        }
        public function deletebuku($id){
            $delete = buku::where('id',$id)->delete();
            if($delete){
                return response()->json(['status'=>true, 'message'=>'Sukses Menghapus Data Buku']);
            }else{
                return response()->json(['status'=>false,'message'=>'Gagal Menghapus Data Buku']);
            }
        }
    }
