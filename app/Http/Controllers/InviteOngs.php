<?php

namespace App\Http\Controllers;

use App\Models\ConvidaOng;
use App\Models\AdicionaOng;
use App\Models\Usuario;
use Illuminate\Support\Facades\DB;
Use Illuminate\Support\Facades\Auth;

class InviteOngs extends Controller
{
    public function send($id){
        $usuario_id = Auth::user()->id;
        $ong_id = $id; 
        $addOng = new AdicionaOng();
        $addOng->usuario_id = $usuario_id;
        $addOng->ong_id = $ong_id;
        $addOng->save();
        return back()->with('send_to_Ong', 'Pedido enviado');
    }
    /*public function delentidade($id){
        $dele = DB::table('entidades')->where('acceptor', $id)->delete();
        return back()->with('delent', 'Você não enviou nenhum pedido');
    }*/
    public function showRequests(){
        $ong = Auth::guard('ong')->user();
        $idOng = Auth::guard('ong')->user()->id;
        $ong_logada = Auth::guard('ong')->user();
        
        if(!$ong_logada){
            return view('site.ongs.login');
        }else{
                $showRequests = DB::table('adiciona_ongs')
            ->join("usuarios", "usuarios.id", "adiciona_ongs.usuario_id")
            ->where("adiciona_ongs.status", "=", null)
            ->where("adiciona_ongs.ong_id", "=", $idOng)
            ->get();

                return view('site.ongs.showUsuariosRequests', compact('ong'))->with('show', $showRequests);
        }
        
    }
    public function acceptInvitation($id){
        $idOng = Auth::guard('ong')->user()->id;

        $update = DB::table('adiciona_ongs')
        ->where('usuario_id',$id)
        ->where('adiciona_ongs.ong_id', $idOng)
        ->update(array('status'=> 1));

        $ong = Auth::guard('ong')->user();

        $ong->usuarios()->attach($id);
 
        $usuario = Usuario::findOrFail($id);

        return back();
        
    }
    public function deleteInvitation($id){
        $idOng = Auth::guard('ong')->user()->id;

        $del = DB::table('adiciona_ongs')
        ->where('usuario_id',$id)
        ->where('adiciona_ongs.ong_id', $idOng)
        ->delete();
        return back()->with('delRequest', 'Pedido removido');
    }
}