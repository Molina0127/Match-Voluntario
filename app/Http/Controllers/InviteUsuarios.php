<?php

namespace App\Http\Controllers;

use App\Models\AdicionaUsuario;
use App\Models\ConvidaOng;
use App\Models\ConvidaUsuario;
use App\Models\Ong;
use Illuminate\Support\Facades\DB;
Use Illuminate\Support\Facades\Auth;

class InviteUsuarios extends Controller
{
public function send($id){
        $ong_id = Auth::guard('ong')->user()->id;
        $usuario_id = $id;
        $addUsuario = new AdicionaUsuario();
        $addUsuario->ong_id = $ong_id;
        $addUsuario->usuario_id = $usuario_id;
        $addUsuario->save();
        return back()->with('send_to_user', 'Pedido enviado');
    }
    /*public function delentidadeVol($id){
        $del = DB::table('convida_usuarios')->where('vol_acceptor', $id)->delete();
        return back()->with('delVol', 'Você nao enviou nenhum pedido');
    }*/
    public function showRequests(){
        $usuario = Auth::user();
        $idUsuario = Auth::user()->id;
        
        $showVolRequests = DB::table('adiciona_usuarios')
        ->join("ongs", "ongs.id", "adiciona_usuarios.ong_id")
        ->where("adiciona_usuarios.status", "=", null)
        ->where("adiciona_usuarios.usuario_id", "=", $idUsuario)
        ->get();

        return view('site.usuarios.showOngsRequests', compact('usuario'))->with('showVol', $showVolRequests);


    }
    public function acceptInvitation($id){
        $idUsuario = Auth::user()->id;
        
        $update = DB::table('adiciona_usuarios')
        ->where('ong_id',$id)
        ->where('adiciona_usuarios.usuario_id', $idUsuario)
        ->update(array('status'=> 1));

        $usuario = Auth::user();

        $usuario->ongs()->attach($id);

        $ong = Ong:: findOrFail($id);

        return back();
    }
    public function deleteInvitation($id){
        $idUsuario = Auth::user()->id;

        $delete = DB::table('adiciona_usuarios')
        ->where('ong_id',$id)
        ->where('adiciona_usuarios.usuario_id', $idUsuario)
        ->delete();
        return back()->with('delVolRequest', 'Pedido removido');
    }
}